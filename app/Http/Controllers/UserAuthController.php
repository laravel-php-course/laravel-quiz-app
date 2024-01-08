<?php

namespace App\Http\Controllers;

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
        $name  = $request->input('name') ;
        $code  = VerificationService::generteCode();

        $cacheValue = json_encode(['code' => $code, 'name' => $name, 'type' => $field]);
        VerificationService::set($value, $cacheValue, 5);
        VerificationService::sendCode($value, $field, $code);

        return view('code', ['destination' => $value, 'action' => route('user.auth.code')]);
    }

    /**
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function handleLogin(loginRequest $request)
    {
        $field = $request->getField();
        $value = $request->getValue();
        $code  = VerificationService::generteCode();

        VerificationService::set($value, $code, 2);
        VerificationService::sendCode($value, $field, $code);

        return view('code', ['destination' => $value, 'action' => route('user.auth.codeLogin')]);
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
        $result =  VerificationService::get($request->input('destination'));
        if (empty($result))
        {
            dd('erorr');
            //TODO error
            return;
        }

        $result = json_decode($result, true);
        if ($request->input('Code') == $result['code'])
        {
            $data = [
                'name' => $result['name'],
                'verified_at' => date('Y-m-d H:i:s')
            ];

            if ($result['type'] == 'email')
            {
                $data['email'] = $request->input('destination');
            }
            else
            {
                $data['mobile'] = $request->input('destination');
            }

            $user = User::create($data);
            Auth::login($user);
            VerificationService::delete($request->input('destination'));
            return redirect()->route('home');
        }
        else
        {
            //TODO error
        }
    }

    public function LogOut()
    {
        if (auth()->check())
        {
            Auth::logout();
        }
        return redirect()->route('home');
    }

    /**
     * @throws NotFoundExceptionInterface
     * @throws ContainerExceptionInterface
     */
    public function handleCodeLogin(CodeRequest $request)
    {
        $code =  VerificationService::get($request->input('destination'));
        if ( $request->input('Code') == $code )
        {
            $type = filter_var($request->input('destination'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
            $user = User::where($type , $request->input('destination'))->first();
            if ($user){
                Auth::login($user);
                return redirect()->route('home');
            }

        }
    }
}
