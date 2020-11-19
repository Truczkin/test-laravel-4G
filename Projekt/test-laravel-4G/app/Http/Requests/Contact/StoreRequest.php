<?php

namespace App\Http\Requests\Contact;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules(): array
    {
        return [
            'firstname' => ['required', 'min:3', 'max:20'],
            'lastname' => ['required', 'min:3', 'max:50'],
            'email' => ['required', 'min:3', 'max:50'],
            'phone' => ['required', 'min:3', 'max:10'],
            'text' => ['required', 'min:5', 'max:255'],
        ];
    }
}
