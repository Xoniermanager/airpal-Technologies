<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAppointment;
use Carbon\Carbon;

class CalendarController extends Controller
{
    // public function showCalendar($month, $year, $slot_div_id, $advertisement_id)
    // {
    //     $bookings = [
    //         '2024-07-01', '2024-07-03', '2024-07-05', '2024-07-10'
    //     ];

    //     $advertisement_id = $advertisement_id ?? null;
    //     return view('calendar', compact('month', 'year', 'bookings', 'slot_div_id', 'advertisement_id'));
    // }
    // public function index()
    // {
    //     return view('calendar');
    // }




    public function showCalendar($data)
    {
        $startDate = date_create($data->start_slots_from_date);
        $endDate = clone $startDate;
        date_modify($endDate, '+'.$data->slots_in_advance.' days');

        $formattedStartDate = date_create(date_format($startDate, 'Y-m-d'));
        $formattedEndDate   = date_create(date_format($endDate, 'Y-m-d'));
        $interval = new DateInterval('P1D');

        //Step 2 :Getting exception days name and making an array so that we will pass in_array function and if exist
        if (isset($data->exception_days) && !empty($data->exception_days->toArray())) {
            foreach ($data->exception_days as $exception_day) {
                $exception_days_name[] =  DayOfWeek::find($exception_day->exception_days_id)->name;

            }
        }

    }
}