@extends('base')

@section('title', $service->title)
@section('description', $service->image)

@section('content')
    <div class="container">
    <h1>{{ $service->title }}</h1>
    @auth        
        <a href="{{ route('service.edit', ['service' => $service]) }}">Editovat</a>
        <a href="#" onclick="event.preventDefault(); $('#service-delete-{{ $service->id }}').submit();">Odstranit</a>

        <form action="{{ route('service.destroy', ['service' => $service]) }}" method="POST" id="service-delete-{{ $service->id }}" class="d-none">
            @csrf
            @method('DELETE')
        </form>
        <br>
    @endauth
    @if($service->image)
        <div class="col-12">
            <img src="{{ asset('storage/'.$service->image) }}" alt="" class="img-thumbnail">
        </div>
    @endif
    {!! $service->description !!}
    </div>                        
@endsection