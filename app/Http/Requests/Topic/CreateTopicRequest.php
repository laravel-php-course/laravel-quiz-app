<?php

namespace App\Http\Requests\Topic;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class CreateTopicRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'title'     => 'required|max:191|min:5',
            'category'  => 'required|exists:categories,id',
            'body'      => ["required", "min:" . '15']
        ];
    }
}
