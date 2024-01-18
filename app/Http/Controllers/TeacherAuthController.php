<?php

namespace App\Http\Controllers;

use App\Http\Requests\resendRequest;
use App\Http\Requests\Teacher\registerTeacherRequest;
use App\Http\Requests\UserAuth\CodeRequest;
use App\Http\Requests\UserAuth\loginRequest;
use App\Models\Teacher;
use App\Models\User;
use App\Services\VerificationService;
use Illuminate\Support\Facades\Auth;

class TeacherAuthController extends Controller
{
    public function dashboard ()
    {
        return view('teacher.dashboard ');
    }

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
        VerificationService::delete($value);
        VerificationService::set($value, $cacheValue, 10);
        VerificationService::sendCode($value, $field, $code);

        return view('code', ['destination' => $value, 'action' => route('teacher.auth.code') , 'resend' => '/teacher/resend']);
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
            $message = "اکانت شما با موفقیت ایجاد شد لطفا تا اطلاع رسانی بعدی و تایید حساب خود توسط ادمین منتظر بمانید";
            return view('notification')->with([
                'message' => $message,
                'type'    => 'success',
                'link'    => ['url' => route('teacher.logIn'), 'title' => "ورود به حساب کاربری"]
            ]);
        } else {
            dd($request->input('Code') , $result['code']);
        }
    }

    public function handleLogin(loginRequest $request)
    {
        $field = $request->getField();
        $value = $request->getValue();
        $code = VerificationService::generteCode();

        $cacheValue = json_encode(['code' => $code, 'name' => 'wasLogin', 'type' => $field]);
        VerificationService::delete($value);
        VerificationService::set($value, $cacheValue, 10);
        VerificationService::sendCode($value, $field, $code);

        return view('code', ['destination' => $value, 'action' => route('teacher.auth.codeLogin') , 'resend' => route('teacher.auth.resendLogin')]);
    }

    public function handleCodeLogin(CodeRequest $request)
    {
        $code = VerificationService::get($request->input('destination'));
        $code = json_decode($code, true);
        if ($request->input('Code') == $code['code']) {
            $type = filter_var($request->input('destination'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
            $teacher = Teacher::where($type, $request->input('destination'))->first();
            if ($teacher->status == Teacher::ACTIVE) {
                Auth::guard('teacher')->login($teacher);
                VerificationService::delete($request->input('destination'));
                return redirect()->route('teacher.dashboard');
            }else{
                return redirect()->route('teacher.logIn')->with('LoginMassage' , 'شما در حالت انتظار ایید هستید برای اطلاعات بیشتر با پشتیبانی تماس بگیرید');
            }
            //please check why `with()` is not working

        }else {
            dd($request->input('Code') , $code) ;
        }
    }
    public function handleResendRegister(resendRequest $request)
    {
        $result = VerificationService::get($request->input('destination'));
        $result = json_decode($result, true);
        $value = $request->input('destination') ;
        $code = VerificationService::generteCode();
        VerificationService::sendCode($value, $result['type'], $code);
        $cacheValue = json_encode(['code' => $code, 'name' => $result['name'],'email' => $result['email'],'mobile' => $result['mobile'] ,'nationalCode' => $result['nationalCode'], 'type' => $result['type'] /*, 'ability' => $ability*/]);
        VerificationService::delete($request->input('destination'));
        VerificationService::set($value, $cacheValue, 2);
        return view('code', ['destination' => $value, 'action' => route('teacher.auth.code') , 'resend' => route('tar') ]);
    }

    public function handleResendLogin(resendRequest $request): \Illuminate\Contracts\View\View|\Illuminate\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\Foundation\Application
    {
        $result = VerificationService::get($request->input('destination'));
        $result = json_decode($result, true);
        $value = $request->input('destination') ;
        $code = VerificationService::generteCode();
        VerificationService::sendCode($value, $result['type'], $code);
        VerificationService::delete($request->input('destination'));
        $cacheValue = json_encode(['code' => $code, 'name' => $result['name'], 'type' => $result['type']]);
        VerificationService::set($value, $cacheValue, 2);
        return view('code', ['destination' => $value, 'action' => route('teacher.auth.codeLogin') , 'resend' => route('teacher.auth.resendLogin')]);
    }


}
