<?php

namespace App\Http\Requests\UserAuth;

use App\Rules\MobileRule;
use App\Services\VerificationService;
use Illuminate\Foundation\Http\FormRequest;

class CodeRequest extends FormRequest
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
            return  [
                'Code' => 'required' ,
                     ]   ;

        }

}
