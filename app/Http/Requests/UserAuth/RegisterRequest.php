<?php

namespace App\Http\Requests\UserAuth;

use App\Rules\MobileRule;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        $rules = [
            'type' => 'required|in:email,mobile',
            'name' => 'required',
        ];

        if ($this->input('type') == 'email') {
            $rules['email'] = ['required','email'];
            session()->put('email' , $this->input('email'));
            session()->put('type' , 'email');
        }
        elseif ($this->input('type') == 'mobile') {
            $rules['mobile'] = ['required', new MobileRule()];
            session()->put('mobile' , $this->input('mobile'));
            session()->put('type' , 'mobile');
        }
        return $rules;
    }

    // public function messages(): array
    // {
    //     return [
    //         'type.in' => 'dksmdkmsdkmdskm'
    //     ];
    // }
}
