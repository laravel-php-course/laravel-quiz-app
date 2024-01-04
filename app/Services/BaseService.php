<?php

namespace App\Services;

use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Mail;

class BaseService
{
    public static function sendCode($dest, $type, $code)
    {
        if ($type == 'email')
        {
            Mail::to($dest)->send(new VerificationMail($code));
        }
        else
        {

        }
    }
}
