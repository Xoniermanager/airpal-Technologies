<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserAppointment;
use Carbon\Carbon;

class CalendarController extends Controller
{
    public function showCalendar($month, $year, $slot_div_id, $advertisement_id)
    {
        // Static data for bookings (dates as strings for simplicity)
        $bookings = [
            '2024-07-01', '2024-07-03', '2024-07-05', '2024-07-10'
        ];

        // Ensure advertisement_id is defined
        $advertisement_id = $advertisement_id ?? null;

        // Example variables for the calendar view
        // $month, $year, $slot_div_id, $advertisement_id are passed from the route

        return view('calendar', compact('month', 'year', 'bookings', 'slot_div_id', 'advertisement_id'));
    }
}