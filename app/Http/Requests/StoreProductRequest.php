<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Auth::check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|min:1|max:50',
            'description'  => 'required|min:1',
            'image' => 'required|mimes:jpeg,jpg,png,gif|max:1048',
            'stock' => 'required',
            'fee' => 'required'
        ];
    }

    public function messages(): array 
    {
        return [
            'name.required'         => 'お前ここ空欄にすんなよ',
            'description.requried'  => 'Please enter the description',
            'image'                 => 'Please choose the image',
            'image.mimes'           => 'The format is wrong',
            'stock.requried'        => 'Please enter the stock',
            'fee'                   => 'Please enter the fee',
        ];
    }
}
