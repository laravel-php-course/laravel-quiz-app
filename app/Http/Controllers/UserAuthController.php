<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuth\CodeRequest;
use App\Http\Requests\UserAuth\loginRequest;
use App\Http\Requests\UserAuth\RegisterRequest;
use App\Models\User;
use App\Services\VerificationService;
use Exception;
use Illuminate\Http\Request;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\SimpleCache\InvalidArgumentException;

class UserAuthController extends Controller
{
    /**
     * @throws Exception|InvalidArgumentException
     */
    public function handleRegister(RegisterRequest $request)
    {
        $field = $request->getField();
        $value = $request->getValue();
        $name1 = $request->input('name') ;
        $code = VerificationService::generteCode();
        VerificationService::set($value, $code, 2);
        VerificationService::sendCode($value, $field, $code);
        session()->put('name' , $value);
        session()->put('realName' , $name1);
        return view('code');
    }

    /**
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function handleLogin(loginRequest $request)
    {
        $field = $request->getField();
        $value = $request->getValue();
        $code = VerificationService::generteCode();
        VerificationService::set($value, $code, 2);
        VerificationService::sendCode($value, $field, $code);
        session()->put('name' , $value);
/*        session()->put('realName' , $name1);*/
        return view('codeLogin');
    }

    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function handleResend(Request $request)
    {
        $field = session()->get('type');
        $value = session()->get('name');
        $code = VerificationService::generteCode();
        VerificationService::set($value, $code, 2);
        VerificationService::sendCode($value, $field, $code);
        session()->put('name' , $value);
        return view('code');
    }
    public function handleResendLogin(Request $request)
    {
        $field = session()->get('type');
        $value = session()->get('name');
        $code = VerificationService::generteCode();
        VerificationService::set($value, $code, 2);
        VerificationService::sendCode($value, $field, $code);
        session()->put('name' , $value);
        return view('codeLogin');
    }



    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     */
    public function handleCode(CodeRequest $request)
    {
        $name =  VerificationService::get('name');
        if ( $request->input('Code') == $name && session()->get('realName')  || session()->get('email') || session()->get('mobile')){
            User::create([
                'name' => session()->get('realName'),
                'email' => session()->get('email'),
                'mobile' => session()->get('mobile'),
                'verified_code' => $request->input('Code')
            ]);
            session()->put('profile' , session()->get('email')) ;
            return redirect()->route('home');
        }
    }

    public function handleCodeLogin(CodeRequest $request)
    {
        $name =  VerificationService::get('name');
        if ( $request->input('Code') == $name ){
            $count = User::where(session()->get('type') , session()->get('name'))->count();
            if ($count == 1){
                session()->put('profile' , session()->get('email')) ;
                return redirect()->route('home');
            }

        }
    }
}
