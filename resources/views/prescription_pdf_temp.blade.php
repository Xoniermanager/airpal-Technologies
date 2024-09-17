<!DOCTYPE html>

<html lang="en" xmlns:o="urn:schemas-microsoft-com:office:office" xmlns:v="urn:schemas-microsoft-com:vml">

<head>
    <title></title>
    <meta content="text/html; charset=utf-8" http-equiv="Content-Type" />
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <style>
        @font-face {
            font-family: 'Mark Pro';
            font-style: normal;
            src: url('../fonts/FF-Mark-Pro-Font-Family/MarkPro.woff') format('woff');
        }
    </style>
</head>
<style>
    td {
        color: #000;
    }

    th {
        color: #000;
        text-align: left
    }
</style>

<body
    style="font-family: 'Mark Pro', Helvetica;margin: 0; padding: 0; -webkit-text-size-adjust: none; text-size-adjust: none;">
    <table border="0" cellpadding="0" cellspacing="0" role="presentation" width="100%">
        <tbody>
            <tr>
                <td>
                    <table align="center" border="0" cellpadding="0" cellspacing="0" role="presentation"
                        style="font-family: 'Mark Pro', Helvetica;width:100%;">
                        <tbody>
                            <tr>
                                <td style="padding:20px;font-weight: 400; text-align: left; vertical-align: top; border-top: 0px; border-right: 0px; border-bottom: 0px; border-left: 0px;"
                                    width="100%">
                                    <table border="0" cellpadding="0" cellspacing="0" role="presentation"
                                        width="100%">
                                        <tr>
                                            <td style="border-bottom: 1px solid #000;width: 35%;padding-bottom:10px;">
                                                <h4 style="margin: 0;color:#000;font-weight:bold;">
                                                    {{ $prescriptionDetails->bookingSlot->user->display_name }}</h4>
                                                <p style="margin: 0;">
                                                    {{ $prescriptionDetails->bookingSlot->user->doctorEducation() }}</p>
                                                {{-- <p style="margin: 0;">Reg. No: MMC 2024</p> --}}
                                            </td>
                                            @if ($webView == true)
                                                <td
                                                    style="border-bottom: 1px solid #000;width: 32%;padding-bottom:10px;">
                                                    <img src="/assets/img/logo.png" style="height:80px;" alt="">
                                                </td>
                                            @else
                                                <td
                                                    style="border-bottom: 1px solid #000;width: 32%;padding-bottom:10px;">
                                                    <img src="{{ public_path('/assets/img/logo.png') }}"
                                                        style="height:80px;" alt="">
                                                </td>
                                            @endif
                                            <td style="border-bottom: 1px solid #000;padding-bottom:10px;">
                                                <p style="margin: 0;">
                                                    {{ formatDoctorAddress($prescriptionDetails->bookingSlot->user) }}
                                                </p>
                                                <p style="margin: 0;"><b>Phone:</b>
                                                    {{ $prescriptionDetails->bookingSlot->user->phone }}</p>
                                                <p style="margin: 0;"><b>Email:</b>
                                                    {{ $prescriptionDetails->bookingSlot->user->email }}</p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style="padding: 5px 0;" colspan="2">
                                                <p style="margin: 0">
                                                    <b>{{ $prescriptionDetails->bookingSlot->patient->first_name }}
                                                        {{ $prescriptionDetails->bookingSlot->patient->last_name }}</b>
                                                </p>
                                                <p style="margin: 0"> <b></b>
                                                    {{ formatDoctorAddress($prescriptionDetails->bookingSlot->patient) }}
                                                </p>
                                                <p style="margin: 0"> <b>Phone :
                                                    </b>{{ $prescriptionDetails->bookingSlot->patient->phone }}</p>
                                                <p style="margin: 0"> <b>Email :
                                                    </b>{{ $prescriptionDetails->bookingSlot->patient->email }}</p>
                                            </td>
                                            <td style="padding: 5px 0;"> <b>Date:</b>
                                                {{ date('d-M-Y', strtotime($prescriptionDetails->bookingSlot->booking_date)) }}
                                                <p style="margin: 0;"><b>Booking Time:</b>
                                                    {{ date('h:i A', strtotime($prescriptionDetails->bookingSlot->slot_start_time)) }}
                                                    -
                                                    {{ date('h:i A', strtotime($prescriptionDetails->bookingSlot->slot_end_time)) }}
                                                </p>
                                        </tr>
                                        <tr>
                                            <td style="padding-bottom: 20px;" colspan="3">
                                                {{-- Weight (Kg): 80, Height (Cm): 200 (B.M.I. = 20.00), BP: 120/80 mmHg --}}
                                            </td>
                                        </tr>
                                        <tr>
                                            <td colspan="3">
                                                <table style="width: 100%;border-collapse: collapse;">
                                                    <tr>
                                                        <th
                                                            style="border-top:1px solid #000;border-bottom:1px solid #000;padding:2px 0;">
                                                            Chief Complaints</th>
                                                        <th
                                                            style="border-top:1px solid #000;border-bottom:1px solid #000;padding:2px 0;">
                                                            Clinical Findings</th>
                                                    </tr>
                                                    <tr>
                                                        <td style="padding-bottom:15px !important;padding:2px 0">*
                                                            {{ $prescriptionDetails->bookingSlot->note }}</td>
                                                        <td style="padding-bottom:15px !important;padding:2px 0">*
                                                            {{ $prescriptionDetails->description }}</td>
                                                    </tr>
                                                    {{-- <tr>
                                                        <td style="padding: 10px 0;border-bottom:1px solid #000;">*
                                                            Headache (2 Days)</td>
                                                        <td style="padding: 10px 0;border-bottom:1px solid #000;">*
                                                            These are test findings for a test patient</td>
                                                    </tr> --}}
                                                    <tr>
                                                        <th colspan="2"
                                                            style="padding-top: 10px;border-top:1px solid #000;">
                                                            Diagnosis: </th>

                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"
                                                            style="padding-bottom:20px !important;padding: 0px 0;border-bottom:1px solid #000;">
                                                            * {{ $prescriptionDetails->diagnosis }}</td>
                                                    </tr>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <table style="width:100%; border-collapse: collapse;">
                                                    <tr>
                                                        <th style="padding: 10px 0;border-bottom:1px solid #000;">
                                                            Medicine Name</th>
                                                        <th style="padding: 10px 0;border-bottom:1px solid #000;">
                                                            Quantity</th>
                                                        <th style="padding: 10px 0;border-bottom:1px solid #000;">
                                                            Frequency</th>
                                                        <th style="padding: 10px 0;border-bottom:1px solid #000;">Meal
                                                        </th>
                                                    </tr>
                                                    @foreach ($prescriptionDetails->prescriptionMedicineDetail as $key => $medicalDetails)
                                                        <tr>
                                                            <td style="padding: 1px 0;"> {{ $key + 1 }}.
                                                                {{ $medicalDetails->medicine_name }}</td>
                                                            <td style="padding: 1px 0;">
                                                                {{ $medicalDetails->quantity }}</td>
                                                            <td style="padding: 1px 0;">
                                                                {{ $medicalDetails->frequency }}</td>
                                                            @if ($medicalDetails->meal_status == 1)
                                                                <td style="padding: 1px 0;">Before</td>
                                                            @else
                                                                <td style="padding: 1px 0;">After</td>
                                                            @endif
                                                        </tr>
                                                    @endforeach
                                                </table>

                                            </th>
                                        </tr>
                                        <tr>
                                            <th colspan="3">
                                                <table style="width:100%; margin:20px 0; border-collapse: collapse;">

                                                    <tr>
                                                        <th rowspan=""
                                                                        style="padding-top: 10px;border-top:1px solid #000;">
                                                                        Prescribe Test: </th>
                                                                        <th style="padding: 10px 0;border-top:1px solid #000;border-bottom:1px solid #000;">
                                                                            Name</th>
                                                                       <th style="padding: 10px 0;border-top:1px solid #000;border-bottom:1px solid #000;">
                                                                           Descriptions</th>

                                                    </tr>

                                                    @foreach ($prescriptionDetails->prescriptionTest as $item)
                                                    <tr>
                                                        <td></td>
                                                        <td style="padding: 1px 0;border-bottom:1px solid #000; font-weight:400 !important;">
                                                            {{ $item->name }}</td>
                                                            <td style="padding: 1px 0;border-bottom:1px solid #000; font-weight:400 !important;">
                                                                {{ $item->description }}</td>
                                                    </tr>
                                                    @endforeach


                                                </table>

                                            </th>
                                        </tr>
                                        <tr>
                                            <th style="padding-top: 15px; padding-bottom: 0px;border-top:1px solid #000;"
                                                colspan="3"> Advice: </th>
                                        </tr>
                                        <tr>
                                            @php
                                                $adviceDetails = explode(',', $prescriptionDetails->advice);
                                            @endphp
                                            <td colspan="3" style="padding-bottom:10px;">
                                                @foreach ($adviceDetails as $value)
                                                    <p style="margin: 0;"> * {{ $value }}</p>
                                                @endforeach
                                            </td>
                                        </tr>
                                        @if (isset($prescriptionDetails->follow_up))
                                            <tr>
                                                <th style="padding: 5px 0;border-top:1px solid #000;" colspan="3">
                                                    Follow Up:
                                                    {{ date('d-M-Y', strtotime($prescriptionDetails->follow_up)) }}
                                                </th>
                                            </tr>
                                        @endif
                                    </table>
                                </td>
                            </tr>
                        </tbody>
                    </table>

                </td>
            </tr>
        </tbody>
    </table><!-- End -->
</body>

</html>
