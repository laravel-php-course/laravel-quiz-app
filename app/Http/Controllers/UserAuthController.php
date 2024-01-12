<?php

namespace App\Http\Controllers;

use App\Http\Requests\resendRequest;
use App\Http\Requests\UserAuth\CodeRequest;
use App\Http\Requests\UserAuth\loginRequest;
use App\Http\Requests\UserAuth\RegisterRequest;
use App\Models\User;
use App\Services\VerificationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\SimpleCache\InvalidArgumentException;

class UserAuthController extends Controller
{
    public function ShowRegisterForm()
    {
        return view('register');
    }

    /**
     * @throws Exception|InvalidArgumentException
     */
    public function handleRegister(RegisterRequest $request)
    {
        $field = $request->getField();
        $value = $request->getValue();
        $name = $request->input('name');
        $code = VerificationService::generteCode();

        $cacheValue = json_encode(['code' => $code, 'name' => $name, 'type' => $field]);
        VerificationService::set($value, $cacheValue, 10);
        VerificationService::sendCode($value, $field, $code);

        return view('code', ['destination' => $value, 'action' => route('user.auth.code') , 'resend' => route('user.auth.resendRegister')]);
    }

    /**
     * @throws InvalidArgumentException
     * @throws Exception
     */

    public function ShowLogInForm()
    {
        return view('login');
    }
    public function handleLogin(loginRequest $request)
    {
        $field = $request->getField();
        $value = $request->getValue();
        $code = VerificationService::generteCode();

        $cacheValue = json_encode(['code' => $code, 'name' => 'wasLogin', 'type' => $field]);
        VerificationService::set($value, $cacheValue, 10);
        VerificationService::sendCode($value, $field, $code);

        return view('code', ['destination' => $value, 'action' => route('user.auth.codeLogin') , 'resend' => route('user.auth.resendLogin')]);
    }

    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function handleResend(resendRequest $request)
    {
        $result = VerificationService::get($request->input('destination'));
        $result = json_decode($result, true);
        $value = $request->input('destination') ;
        $code = VerificationService::generteCode();
        VerificationService::sendCode($value, $result['type'], $code);
        VerificationService::delete($request->input('destination'));
        $cacheValue = json_encode(['code' => $code, 'name' => $result['name'], 'type' => $result['type']]);
        VerificationService::set($value, $cacheValue, 2);
        return view('code', ['destination' => $value, 'action' => route('user.auth.code') , 'resend' => route('user.auth.resendRegister')]);
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
        return view('code', ['destination' => $value, 'action' => route('user.auth.codeLogin') , 'resend' => route('user.auth.resendLogin')]);
    }




    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     */
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
                'verified_at' => date('Y-m-d H:i:s')
            ];

            if ($result['type'] == 'email') {

                $data['email'] = $request->input('destination');
            } else {
                $data['mobile'] = $request->input('destination');
            }

            $user = User::create($data);
            Auth::login($user);
            VerificationService::delete($request->input('destination'));
            return redirect()->route('home');
        } else {
            dd($request->input('Code') , $result['code']);
        }
    }

    public function LogOut()
    {
        if (auth()->check()) {
            Auth::logout();
        }
        return redirect()->route('home');
    }

    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws InvalidArgumentException
     */
    public function handleCodeLogin(CodeRequest $request)
    {
        $code = VerificationService::get($request->input('destination'));
        $code = json_decode($code, true);
        if ($request->input('Code') == $code['code']) {
            $type = filter_var($request->input('destination'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
            $user = User::where($type, $request->input('destination'))->first();
            if ($user) {
                Auth::login($user);
                VerificationService::delete($request->input('destination'));
                return redirect()->route('home');
            }

        }else {
            dd($request->input('Code') , $code) ;
        }
    }

}
