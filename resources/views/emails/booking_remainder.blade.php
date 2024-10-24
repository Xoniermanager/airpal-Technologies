<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Appointment Reminder</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 20px;
        }
        .container {
            background-color: #ffffff;
            border-radius: 8px;
            padding: 20px;
            max-width: 600px;
            margin: auto;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            border: 1px solid #e0e0e0;
        }
        .header {
            background-color: #ddf6fa;
            color: #ffffff;
            padding: 20px;
            text-align: center;
            border-radius: 8px 8px 0 0;
        }
        .header img {
            max-width: 150px;
        }
        .content {
            margin: 20px 16px;
            color: #333333;
        }
        .content p {
            font-size: 16px;
            line-height: 1.6;
        }
        .content ul {
            list-style: none;
            padding: 0;
        }
        .content ul li {
            font-size: 16px;
            margin-bottom: 10px;
        }
        .content strong {
            color: #004cd4;
        }
        .footer {
            font-size: 12px;
            text-align: center;
            color: #999999;
            margin-top: 20px;
            padding-top: 10px;
            border-top: 1px solid #e0e0e0;
        }
        .button {
            display: inline-block;
            background-color: #004cd4;
            color: #ffffff;
            padding: 12px 25px;
            text-decoration: none;
            border-radius: 5px;
            margin-top: 20px;
            font-size: 16px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="header">
            <img src="{{ asset('assets/img/logo.png') }}" alt="Your Logo">
            <h2>Appointment Reminder</h2>
            <img src="{{ asset('assets/img/bell2.png') }}" alt="Bell Icon">

        </div>
        <div class="content">
            <p>Dear Puneet,</p>
            <p>This is a friendly reminder for your upcoming appointment:</p>
            <ul>
                <li><strong>Doctor:</strong> {{$BookingDetails->user->fullName ?? ''}}</li>
                <li><strong>Time:</strong> {{ $BookingDetails->slot_start_time ?? '' }} - {{ $BookingDetails->slot_end_time ?? '' }}</li>
                <li><strong>Date:</strong> {{ $BookingDetails->booking_date ?? '' }}</li>
                
            </ul>
            <p>If you have any questions or need to reschedule, please feel free to contact us.</p>
            {!! $BookingDetails->getMeetingButton() !!}
        </div>
        <div class="footer">
            <p>Thank you for choosing our service!</p>
            <p>&copy; {{ date('Y') }} Airpal. All rights reserved.</p>
        </div>
    </div>
</body>
</html>
