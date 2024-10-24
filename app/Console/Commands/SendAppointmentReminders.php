<?php

namespace App\Console\Commands;

use App\Jobs\AppointmentRemindersJob;
use Carbon\Carbon;
use App\Models\BookingSlots;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Mail;
use App\Mail\AppointmentRemindersMail;

class SendAppointmentReminders extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'send-appointment-reminders';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        // Get current time and today's date
        $now = Carbon::now();

        $afterFourHoursFromNow = $now->copy()->addHours(4);

        // Get all confirmed appointments within the next 4 hours where the email has not been sent yet
        $appointments = BookingSlots::where('booking_date', $now->toDateString())
            ->where('status', 'confirmed')
            ->where('mail_sent', false) // Only select bookings where mail has not been sent
            ->whereBetween('slot_start_time', [$now->format('H:i'), $afterFourHoursFromNow->format('H:i')])
            ->get();
        
        foreach ($appointments as $appointment) {
            // Dispatch the email job
            AppointmentRemindersJob::dispatch($appointment);
        
            // Update the booking record to mark that the email has been sent
            $appointment->update(['mail_sent' => true]);
        }

        $this->info('Appointment reminders sent successfully!');
    }
}
