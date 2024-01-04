<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAuth\RegisterRequest;
use App\Services\VerificationService;
use Exception;
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

        $code = VerificationService::generteCode();
        VerificationService::set($value, $code, 2);
        VerificationService::sendCode($value, $field, $code);
        dd($request->all());
    }
}
