<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreOrderRequest extends FormRequest
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
            'name' => ['required', 'string', 'max:255'],
            'buyer' => ['required', 'string', 'exists:users,id'],
            'items' => ['required', 'json'],
            'payment_screenshot' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'total' => ['required',  'min:0'],
            // 'items.*.name' => ['required', 'string'],
            // 'items.*.q' => ['required', 'integer', 'min:1'],
            // 'items.*.price' => ['required', 'numeric', 'min:0'],
            // 'items.*.note' => ['nullable', 'string'],
            // 'items.*.image' => ['nullable'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Order name is required.',
            'name.string' => 'Order name must be a valid text.',
            'buyer.required' => 'Please select a buyer.',

            'items.required' => 'At least one item must be added to the order.',
            // 'items.array' => 'Items must be sent as a list.',
            // 'items.*.name.required' => 'Each item must have a name.',
            // 'items.*.q.required' => 'Each item must have a quantity.',
            // 'items.*.q.integer' => 'Quantity must be a valid number.',
            // 'items.*.q.min' => 'Quantity must be at least 1.',
            // 'items.*.price.required' => 'Each item must have a price.',
            // 'items.*.price.numeric' => 'Price must be a number.',
            // 'items.*.price.min' => 'Price cannot be negative.',
            // 'items.*.note.string' => 'Note must be valid text.',
            // 'items.*.image.image' => 'The file must be an image.',
            // 'items.*.image.max' => 'The image size must not exceed 2MB.',
        ];
    }
}
