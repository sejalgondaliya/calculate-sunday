<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use DateTime;

class YearRule implements Rule
{
    public function passes($attribute, $value)
    {
        $startDate = request()->start_date;
        $endDate = request()->end_date;

        $datetime1 = new DateTime(request()->start_date);
        $datetime2 = new DateTime(request()->end_date);
        $difference = $datetime1->diff($datetime2);

        $years = $difference->y;
        $months = $difference->m;
        $days = $difference->d;

        // Check if the end date greater than start date
        if($endDate > $startDate) {
            // Check if $years < 2
            if($years < 2) {
                return false;
            }

            // Check if $years >= 5
            if($years >= 5) {
                // Check if $months > 0 OR $days > 0
                if($months > 0 || $days > 0) {
                    return false;
                }
            }
        }
        return true;
    }

    public function message()
    {
        return "The dates are least two years apart but no more than five";
    }
}
