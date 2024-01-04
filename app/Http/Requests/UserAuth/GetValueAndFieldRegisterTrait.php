<?php

namespace App\Http\Requests\UserAuth;

trait GetValueAndFieldRegisterTrait
{
    public function getField(): string
    {
        return $this->input('type') == 'email' ? 'email' : 'mobile';
    }

    public function getValue()
    {
        $field = $this->getField();
        return $this->input($field);
    }
}
