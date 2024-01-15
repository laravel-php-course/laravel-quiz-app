<?php

namespace App\Http\Controllers;

use App\Http\Requests\Teacher\registerTeacherRequest;
use App\Http\Requests\UserAuth\CodeRequest;
use App\Models\Teacher;
use App\Services\VerificationService;
use Illuminate\Support\Facades\Auth;

class TeacherAuthController extends Controller
{
    public function ShowLogInForm()
    {
        return view('teacher.loginTeacher');
    }
    public function ShowRegisterForm()
    {
        return view('teacher.RegisterTeacher');
    }
    public function handleRegister(registerTeacherRequest $request)
    {
        $field = $request->getField();
        $value = $request->getValue();
        $name = $request->input('name');
        $email = $request->input('email');
        $mobile = $request->input('mobile');
        $nationalCode = $request->input('code');
        $code = VerificationService::generteCode();

        $cacheValue = json_encode(['code' => $code, 'name' => $name,'email' => $email,'mobile' => $mobile ,'nationalCode' => $nationalCode, 'type' => $field /*, 'ability' => $ability*/]);
//        VerificationService::delete($value);
        VerificationService::set($value, $cacheValue, 10);
        VerificationService::sendCode($value, $field, $code);

        return view('code', ['destination' => $value, 'action' => route('teacher.auth.code') , 'resend' => route('teacher.auth.resendRegister')]);
    }

    public function handleCode(CodeRequest $request)
    {
        $result = VerificationService::get($request->input('destination'));
        if (empty($result)) {
            return redirect()->route('home')->with(['codeNotCorrect' => 'کد معتبر نیست']);
        }

        $result = json_decode($result, true);
        if ($request->input('Code') == $result['code']) {

            $data = [
                'name' => $result['name'],
                'verified_at' => date('Y-m-d H:i:s') ,
                'email' => $result['email'] ,
                'mobile' => $result['mobile'] ,
                'national_code' => $result['nationalCode'] ,
                'status' => Teacher::PENDING
       /*         'ability' => $result['ability']*/

            ];


            Teacher::create($data);

            VerificationService::delete($request->input('destination'));
            return redirect()->route('home');
        } else {
            dd($request->input('Code') , $result['code']);
        }
    }

}
