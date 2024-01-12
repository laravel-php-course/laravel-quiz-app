<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\RegisterRequest;
use App\Http\Requests\Admin\VerificationCodeRequest;
use App\Models\Admin;
use App\Services\VerificationService;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Psr\Container\ContainerExceptionInterface;
use Psr\Container\NotFoundExceptionInterface;
use Psr\SimpleCache\InvalidArgumentException;

class AdminController extends Controller
{
    public function showLoginForm(Request $request)
    {
        return view('admin.login');
    }

    /**
     * @throws InvalidArgumentException
     * @throws Exception
     */
    public function handleLogin(RegisterRequest $request)
    {
        $field = $request->getField();
        $value = $request->getValue();
        $code = VerificationService::generteCode();

        $admin = Admin::where($field, $value)->first();
        Log::debug("Code: $code");
        $cacheValue = json_encode(['code' => $code, 'name' => $admin->name ?? 'ادمین عزیز', 'type' => $field]);
        VerificationService::set($value, $cacheValue, 10);
        VerificationService::sendCode($value, $field, $code);

        return view('admin.code', ['destination' => $value]);
    }

    /**
     * @throws ContainerExceptionInterface
     * @throws NotFoundExceptionInterface
     * @throws InvalidArgumentException
     */
    public function handleVerificationCode(VerificationCodeRequest $request)
    {
        $code = VerificationService::get($request->input('destination'));
        $code = json_decode($code, true);
        if ($request->input('Code') == $code['code']) {
            $type = filter_var($request->input('destination'), FILTER_VALIDATE_EMAIL) ? 'email' : 'mobile';
            $admin = Admin::where($type, $request->input('destination'))->first();
            if ($admin) {
//                dd($admin);
                Auth::login($admin);
                VerificationService::delete($request->input('destination'));
                return redirect()->route('admin.dashboard');
            }

        } else {
            dd($request->input('Code') , $code) ;
        }
    }

    public function dashboard()
    {
        return view('admin.dashboard');
    }

}
