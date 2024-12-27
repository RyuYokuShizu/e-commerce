<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class UpdateProductRequest extends FormRequest
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
            'image' => 'mimes:jpeg,jpg,png,gif|max:1048',
            'stock' => 'required',
            'fee' => 'required'
        ];
    }

    public function message(): array 
    {
        return [
            'name.required'          => 'Please enter the name',
            'description.required'   => 'Please enter the description',
            'image.mimes'            => 'The format is wrong',
            'stock.required'         => 'Please enter the stock',
            'fee.required'           => 'Please enter the fee',
        ];
    }
}
