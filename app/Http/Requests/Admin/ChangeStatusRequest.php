<?php

namespace App\Http\Requests\Admin;

use App\Models\Teacher;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ChangeStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->guard('admin')->check();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id'     => 'required|exists:users,id',
            'action' => 'required|in:'.implode(',',Teacher::STATUS), //TODO ADD Rule For check if status == active just can suspend or status == suspend just can be active
        ];
    }
}
