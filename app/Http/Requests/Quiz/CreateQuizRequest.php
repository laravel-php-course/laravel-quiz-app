<?php

namespace App\Http\Requests\Quiz;

use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Validator;

class CreateQuizRequest extends FormRequest
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
        $rules = [
            'questions' => 'required|array|min:1',
        ];

        foreach ($this->input('questions', []) as $key => $value) {
            $rules["questions.{$key}.title"] = 'required|string|max:255';

            $rules["questions.{$key}.answers"] = 'required|array|min:4|max:4';
            foreach ($value['answers'] as $index => $answer) {
                $rules["questions.{$key}.answers.{$index}"] = 'required|string|max:255';
            }

            $rules["questions.{$key}.true_answer"] = 'required|numeric|in:0,1,2,3';
        }

        return $rules;
    }
}
