<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

// Helpers
use Illuminate\Support\Facades\Auth;

class UpdateProjectRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:2|max:170',
            'url' => 'required|min:40|max:2054',
            'description' => 'required',
            'is_online' => 'required|boolean',
            'type_id' => 'nullable|exists:types,id',
            'technologies' => 'nullable|array',
            'technologies.*' => 'exists:technologies,id'

        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title is required',
            'title.max' => 'The title is too long',
            'url.required' => 'The url is required',
            'description.required' => 'The description is required',
            'is_online.required' => 'The field is required',
            'is_online.boolean' => 'The field accept only 0 or 1',
        ];
    }
}
