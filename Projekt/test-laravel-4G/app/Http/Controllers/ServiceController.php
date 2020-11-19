<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Validation\ValidationException;
use App\Http\Requests\Service\StoreRequest;
use App\Http\Requests\Service\UpdateRequest;

class ServiceController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index', 'show');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        return view('service.index', ['services' => Service::orderBy('title')->get()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(): View
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   /*
        Service::query()->create($request->all());

        return redirect()->route('service.index');
        */
        $service = Service::create($this->validateRequest());
        $this->storeImage($service);
        return redirect()->route('service.index');
    
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function show(Service $service): View
    {
        return view('service.show', ['service' => $service]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function edit(Service $service): View
    {
        return view('service.edit', ['service' => $service]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Service $service)
    {
        /*
        $service->update($request->all());

        return redirect()->route('service.index');
        */
        $service->update($this->validateRequest());
        $this->storeImage($service);
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Service  $service
     * @return \Illuminate\Http\Response
     */
    public function destroy(Service $service): RedirectResponse
    {
        try {
            $service->delete();
        } catch (\Exception $exception) {
            return redirect()->back()->withErrors(['Při procesu odstranění článku došlo k chybě.']);
        }

        return redirect()->route('service.index');
    }
    
    private function validateRequest()
    {
        $validatedData = request()->validate([
            'title' => 'required|min:3|max:20',
            'url' => 'required|min:3|max:20',
            'description' => 'required|min:3|max:255',
        ]);
        
        if (request()->hasFile('image')) {
            request()->validate([
                'image' => 'file|image|max:5000',
            ]);
        }
        return $validatedData;
    }
    
    private function storeImage($service)
    {
        if (request()->hasFile('image')) {
            $service->update([
                'image' => request()->image->store('uploads', 'public'),
            ]);
        }
    }
}
