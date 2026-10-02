<?php

namespace App\Http\Requests\Website;

use Illuminate\Foundation\Http\FormRequest;

class StoreContactRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name'        => ['required', 'string', 'min:2', 'max:100'],
            'email'       => ['required', 'email', 'max:255'],
            'phone'       => ['required', 'string', 'max:20'],
            'subject'     => ['nullable', 'string', 'max:255'],
            'message'     => ['nullable', 'string'],
            'description' => ['nullable', 'string'], // Support description as message
        ];
    }

    /**
     * Prepare inputs for validation: map description to message if needed.
     */
    protected function prepareForValidation(): void
    {
        if (empty($this->message) && !empty($this->description)) {
            $this->merge(['message' => $this->description]);
        }

        if (empty($this->subject)) {
            $this->merge(['subject' => 'Website Product Requirement Enquiry']);
        }
    }

    public function withValidator($validator)
    {
        $validator->after(function ($validator) {
            $content = $this->message ?: $this->description;
            if (empty($content) || strlen(trim($content)) < 5) {
                $validator->errors()->add('message', 'Please enter at least 5 characters describing your requirement.');
            }
        });
    }
}
