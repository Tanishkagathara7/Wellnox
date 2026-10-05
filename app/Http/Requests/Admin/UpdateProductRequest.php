<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $productId = $this->route('product') ? $this->route('product')->id : $this->id;

        return [
            'name'              => ['required', 'string', 'max:255'],
            'category_id'       => ['required', 'integer', 'exists:product_categories,id'],
            'subcategory_id'    => ['nullable', 'integer', 'exists:product_subcategories,id'],
            'slug'              => ['nullable', 'string', 'max:255', Rule::unique('products', 'slug')->ignore($productId)],
            'short_description' => ['nullable', 'string', 'max:500'],
            'description'       => ['nullable', 'string'],
            'image'             => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'size'              => ['nullable', 'string', 'max:150'],
            'color'             => ['nullable', 'string', 'max:100'],
            'status'            => ['required', 'boolean'],
            'sort_order'        => ['nullable', 'integer', 'min:0'],
        ];
    }
}
