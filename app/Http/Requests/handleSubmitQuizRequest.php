<?php

namespace App\Http\Requests;

use App\Models\QuizAction;
use Illuminate\Foundation\Http\FormRequest;

class handleSubmitQuizRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        $quiz_action = QuizAction::where('code' , $this->input('quiz_code'))->first();
        return $quiz_action->user_id == auth()->id() ;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'answers' => 'array|min:1|required' ,
            'quiz_code' => 'required'
        ];
    }
}
