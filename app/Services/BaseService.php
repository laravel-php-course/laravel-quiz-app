<?php

namespace App\Services;

use App\Mail\VerificationMail;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Mail;

class BaseService
{
    public static function convertToIranFormat($mobileNumber) {
        $mobileNumber = preg_replace('/\D/', '', $mobileNumber);

        if (substr($mobileNumber, 0, 2) === '09') {
            return '98' . substr($mobileNumber, 1);
        }
        elseif (substr($mobileNumber, 0, 3) === '989') {
            return $mobileNumber;
        }
        elseif (substr($mobileNumber, 0, 4) === '+989') {
            return substr($mobileNumber, 1);
        }
        else {
            return false;
        }
    }

    public static function sendCode($dest, $type, $code)
    {
        if ($type == 'email')
        {
            Mail::to($dest)->send(new VerificationMail($code));
//            ActivationCode::create([
//                'destionation' => $dest,
//                'code' =>
//            ])
        }
        else
        {
            $msg = "کد ورود شما : {$code}"; //TODO ADD config
            $response = Http::withoutVerifying()->withHeaders([
                'Content-Type' => 'application/x-www-form-urlencoded',
            ])->asForm()->post(config('services.sms.url'), [
                'username' => config('services.sms.username'),
                'password' => config('services.sms.password'),
                'Source' => config('services.sms.source'),
                'Message' => $msg,
                'destination' => self::convertToIranFormat($dest)
            ]);

            $msgId = $response->body();
            return $response->body(); //TODO create table with laravel migration save code and mobile and send date
        }
    }
}
