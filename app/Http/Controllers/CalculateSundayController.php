<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\SundayRequest;
use Exception;
use Carbon\Carbon;

class CalculateSundayController extends Controller
{
    public function calculateSunday(SundayRequest $request) {
        try {
            $dates = [];

            // Start from the start date and keep adding 1 day until the end date is reached
            for($date = Carbon::parse($request->start_date); $date->lte(Carbon::parse($request->end_date)); $date->addDay()) {
                // If the current date is a Sunday, add it to the dates array
                // Excluding any Sunday that falls on or after the 28th of the month.
                if($date->isSunday() && $date->format('d') < 28) {
                    $dates[] = $date->format('Y-m-d');
                }
            }

            return response()->json(['status' => true, 'message' => 'List of Sundays found!', 'data' => $dates], 200);
        } catch (Exception $e) {
            return response()->json(['status' => true, 'message' => $e->getMessage()], 200);
        }
    }
}
