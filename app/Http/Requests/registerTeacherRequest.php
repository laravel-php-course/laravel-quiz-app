<?php

namespace App\Http\Requests;

use App\Rules\MobileRule;
use App\Rules\Nationalcode;
use Illuminate\Foundation\Http\FormRequest;

class registerTeacherRequest extends FormRequest
{
    use GetValueAndFieldRegisterTrait;
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
            'name' => 'required',
            'type' => 'required|in:email,mobile',
            'email' => 'required|email' ,
            'mobile' => 'required|numeric' ,
            'code' => 'required|numeric' ,
            /*'ability' => 'required|'*/
        ];
    }
}
