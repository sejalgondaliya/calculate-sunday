<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;

class SundayRule implements Rule
{
    public function passes($attribute, $value)
    {
        $day = date('l', strtotime($value));
        if($day == 'Sunday') {
            return false;
        }
        return true;
    }

    public function message()
    {
        return "The start date cannot be a Sunday";
    }
}
