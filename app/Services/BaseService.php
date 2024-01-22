<?php

namespace App\Services;

use App\Mail\VerificationMail;
use App\Models\Admin;
use App\Models\Code;
use App\Models\Teacher;
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
        $cache = json_decode(VerificationService::get($dest) , true) ;
        if ($type == 'email')
        {
            Mail::to($dest)->send(new VerificationMail($code));
//            self::SendMail() //TODO Implement This REMVE ABOVE CODE
            //TODO Delete Duplicate Code LINE 40, 64
            Code::create([
                'dest' => $dest,
                'code' => $code ,
                'username' => $cache['name'] ,
                'type' => $cache['type'] ,
                'date' => now()
            ]);
        }
        else
        {
            //            self::SendSMS() //TODO Implement This
            $template = config('services.sms.template');
            $search = ['NAME' , 'CODE' , 'MOBILE'];
            $replace = [$cache['name'] , $cache['code'] , $dest];
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
            Code::create([
                'dest' => $dest,
                'code' => $code ,
                'username' => $cache['name'] ,
                'type' => $cache['type'] ,
                'date' => now()
            ]);
            $msgId = $response->body();
            return $response->body();
        }
    }

    public static function getCreatorType(): array
    {
        if (auth()->guard('admin')->check())
            return [Admin::class, 'admin'];
        elseif (auth()->guard('teacher')->check())
            return [Teacher::class, 'teacher'];
    }
}
