<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RestaurantRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name'          => 'required|string|max:255',
            'address'       => 'nullable|string|max:255',
            'delivery_fee'  => 'required|numeric|min:0',
            'description'   => 'nullable|string',
            'cuisines_id'   => 'nullable|array',
            'cuisines_id.*' => 'exists:cuisines,id',
            'images.*' => 'image|mimes:jpg,jpeg,png|max:2048',
        ];
    }
}
