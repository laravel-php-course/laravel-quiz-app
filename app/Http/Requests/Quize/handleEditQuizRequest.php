<?php

namespace App\Http\Requests\Quize;

use Illuminate\Foundation\Http\FormRequest;

class handleEditQuizRequest extends FormRequest
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
        $rules = [
            'questions' => 'required|array|min:1',
        ];

        foreach ($this->input('questions', []) as $key => $value) {
            $rules["questions.{$key}.title.{$key}"] = 'required|string|max:255';

            $rules["questions.{$key}.answers"] = 'required|array|min:4|max:4';
            foreach ($value['answers'] as $index => $answer) {
                $rules["questions.{$key}.answers.{$index}"] = 'required|string|max:255';
            }

            $rules["questions.{$key}.true_answer"] = 'required|numeric';
        }

        return $rules;
    }

}
