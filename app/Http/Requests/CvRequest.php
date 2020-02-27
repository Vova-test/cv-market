<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CvRequest extends FormRequest
{
    public function rules()
    {
        return [
            'firstName' => 'bail|required|max:255',
            'lastName' => 'bail|required|max:255',
            'profession' => 'bail|required|max:255',
            'salary' => 'nullable|numeric|max:1000000000',
            'currency' => 'max:255',
            'city' => 'max:255',
            'street' => 'max:255',
            'region' => 'max:255',
            'country' => 'max:255',
            'zip' => 'nullable|numeric|max:999999',
            'phone' => 'max:255',
            'email' => 'bail|required|email:rfc,dns',
            'language' => 'max:255',
            'age' => 'nullable|numeric|max:100',
            'schedule' => 'max:255',
            'imageLink' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',  
        ];
    }
}
