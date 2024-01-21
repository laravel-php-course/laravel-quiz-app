<?php

namespace App\Http\Requests\Quize;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class createQuizeRequest extends FormRequest
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
            'quiz_title' => 'required|',
            'countQuestion'=> ['required' ,Rule::notIn(['0'])],
        ];
            for ($i = 1; $i < $this->input('countQuestion'); $i++) {
                $rules['question_title_'.$i] = ['required'];
                $rules['true_answer_'.$i] = ['required'];
                for ($j = 0; $j < 4; $j++) {
                    $rules['answer_'.$i.'_'.$j.'_title'] = ['required'];
                }
            }

        return $rules ;
    }
}
