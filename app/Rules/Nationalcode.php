<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class Nationalcode implements ValidationRule
{

    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
      if(!preg_match('/^[0-9]{10}$/',$value))
            $fail('1کدملی نامعتبر است');
        for($i=0;$i<10;$i++)
            if(preg_match('/^'.$i.'{10}$/',$value))
                $fail('2کدملی نامعتبر است');
        for($i=0,$sum=0;$i<9;$i++)
            $sum+=((10-$i)*intval(substr($value, $i,1)));
        $ret=$sum%11;
        $parity=intval(substr($value, 9,1));
        if(!($ret<2 && $ret==$parity) AND !($ret>=2 && $ret==11-$parity))
            $fail('کدملی نامعتبر است');
    }
}
