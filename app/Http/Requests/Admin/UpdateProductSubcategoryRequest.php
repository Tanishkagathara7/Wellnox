<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateProductSubcategoryRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $subcategoryId = $this->route('subcategory') ? $this->route('subcategory')->id : $this->id;

        return [
            'name'        => ['required', 'string', 'max:255'],
            'category_id' => ['required', 'integer', 'exists:product_categories,id'],
            'slug'        => ['nullable', 'string', 'max:255', Rule::unique('product_subcategories', 'slug')->ignore($subcategoryId)],
            'description' => ['nullable', 'string'],
            'image'       => ['nullable', 'image', 'mimes:jpg,jpeg,png,webp', 'max:2048'],
            'status'      => ['required', 'boolean'],
            'sort_order'  => ['nullable', 'integer', 'min:0'],
        ];
    }
}
