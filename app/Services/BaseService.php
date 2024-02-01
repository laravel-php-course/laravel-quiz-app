<?php

namespace App\Services;

use App\Mail\sendMail;
use App\Mail\VerificationMail;
use App\Models\Admin;
use App\Models\Code;
use App\Models\Teacher;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;
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
        $cache = json_decode(VerificationService::get($dest) , true) ;
        if ($type == 'email')
        {
//            self::SendMail($dest , $code);
            Log::info($code);
        }
        else
        {
            self::sendSms($dest , $cache['code'] , $cache['name']);
        }
        self::createVerificationCode($dest , $code , $cache['name'] , $cache['type']);
    }

    public static function getCreatorType(): array
    {
        if (auth()->guard('admin')->check())
            return [Admin::class, 'admin'];
        elseif (auth()->guard('teacher')->check())
            return [Teacher::class, 'teacher'];
    }

    public static function sendMail($dest, $mail)
    {
        Mail::to($dest)->send(new sendMail($mail));

    }
    public static function createVerificationCode($dest, $code , $username , $type)
    {
        Code::create([
            'dest' => $dest,
            'code' => $code ,
            'username' => $username ,
            'type' => $type ,
            'date' => now()
        ]);

    }
    public static function sendSms($dest, $code , $name )
{
    $template = config('services.sms.template');
    $search = ['NAME' , 'CODE' , 'MOBILE'];
    $replace = [$name , $code , $dest];
    $msg = str_replace($search , $replace , $template);
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
    return $response->body();

}

}
