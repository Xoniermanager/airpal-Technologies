<!DOCTYPE html>
<html>
<head>
<style>
table {
  font-family: arial, sans-serif;
  border-collapse: collapse;
  width: 100%;
} 
</style>
</head>
<body style="background-color: #eee;">
    <div style="background-color: #fff;padding: 40px;max-width: 700px;
margin: auto;padding-bottom:70px;"> 
<table style="max-width: 700px;
margin: auto;
padding: 16px; 
font-size: 16px;
line-height: 24px; 
color: #555;">
  <tr style="text-align: left;">
    <th style="width: 40%;"><h3 style="">Airpal Invoice</h3> </th>
    <th style="width: 20%;padding-bottom:20px;"><img src="https://airpal.ie/assets/img/logo.png" style="height: 70px;" alt=""></th>
    <th style="width: 40%;text-align:right;">
        <p style="margin: 0;">Cork, Cork T12DN79, IE +353861544176</p>
        <p style="margin: 0;"> Email: david@airpal.ie</p>
        </th>
  </tr>
  <tr> 
    <td colspan="3">
        <table style="margin-top: 10px;">
            <tr style="text-align: left;">
                <th style="padding:5px;width:50%;border: 1px solid #ccc;"> Bill To: {{ $bookingDetail->patient->fullName ?? '' }}</th>
                <th style="padding:5px;border: 1px solid #ccc;"> Invoice Number:</th>
            </tr>
            <tr style="text-align: left;">
                <th style="padding:5px;width:50%;border: 1px solid #ccc;"> Patient Address: {{ $bookingDetail->patient->patientAddress->address ?? '' }} {{ $bookingDetail->patient->patientAddress->city ?? '' }}</th>
                <th style="padding:5px;border: 1px solid #ccc;"> Doctor Name: {{ $bookingDetail->user->fullName ?? '' }}</th>
            </tr>
            <tr style="text-align: left;">
                <th style="padding:5px;width:50%;border: 1px solid #ccc;"> Phone: {{ $bookingDetail->patient->phone ?? '' }} </th>
                <th style="padding:5px;border: 1px solid #ccc;"> Doctor Degree:
                    @isset($bookingDetail->user)
                    @forelse ($bookingDetail->user->educations as $education)
                    {{$education->course->name}}
                    @if( !$loop->last),@endif
                    @empty
                    <p>N/A</p>
                    @endforelse
                    @endisset
                </th>
            </tr>
            <tr style="text-align: left;">
                <th style="padding:5px;width:50%;border: 1px solid #ccc;"> Email: {{ $bookingDetail->patient->email ?? '' }}  </th>
                <th style="padding:5px;border: 1px solid #ccc;"> Doctor Contact: {{ $bookingDetail->user->phone ?? '' }} </th>
            </tr>
        </table>
    </td>
  </tr> 
  <tr>
    <td colspan="3">
        <table style="margin: 30px 0;">
           <thead>
            <tr style="color:#fff;background-color: #004cd4;border:1px solid #ccc;">
                <th style="padding: 5px;border: 1px solid #ccc;">SERVICE DATE </th>
                <th style="padding: 5px;border: 1px solid #ccc;">SERVICE PERFORMED</th>
                <th style="padding: 5px;border: 1px solid #ccc;">MEDICATION</th>
                <th style="padding: 5px;border: 1px solid #ccc;">FEE</th>
                <th style="padding: 5px;border: 1px solid #ccc;">ADJ</th>
                <th style="padding: 5px;border: 1px solid #ccc;">AMOUNT</th>
            </tr>
           </thead>
           <tr style="border: 1px solid #ccc;text-align: center;">
            <td style="padding: 5px;border:1px solid #ccc;"> {{ \Carbon\Carbon::parse($bookingDetail->booking_date)->format('j F, Y') ?? '' }}  </td>
            <td style="padding: 5px;border:1px solid #ccc;">Online Consultancy </td>
            <td style="padding: 5px;border:1px solid #ccc;">Paracetamol </td>
            <td style="padding: 5px;border:1px solid #ccc;">876 </td>
            <td style="padding: 5px;border:1px solid #ccc;">- </td>
            <td style="padding: 5px;border:1px solid #ccc;">9876543 </td>
           </tr>
           <tr style="text-align: left;">
            <td colspan="4" style="padding: 5px;border: 1px solid #ccc;">Comment Notes :
                {{ $bookingDetail->note ?? '' }} 
                
            </td>
            <td colspan="2">
               <table>
                <tr>
                    <td style="padding: 5px;border: 1px solid #ccc;"> SUBTOTAL</td>
                    <td style="padding: 5px;border: 1px solid #ccc;">-</td> 
                </tr>
                <tr> 
                    <td style="padding: 5px;border: 1px solid #ccc;">SUBTAX</td>
                    <td style="padding: 5px;border: 1px solid #ccc;">-</td>
                </tr>
                <tr> 
                    <th style="padding: 5px;border: 1px solid #ccc;">TOTAL</th>
                    <td style="padding: 5px;border: 1px solid #ccc;">9876543</td>
                </tr>
               </table> 
            </td> 
           </tr>
        </table> 
    </td>
  </tr>

  <tr>
    <td colspan="3">
        <table>
            <tr>
                <td  style="border: 1px solid #ccc;padding: 5px;">
                    -
                </td>
            </tr>
            <tr>
                <td  style="border: 1px solid #ccc;padding: 5px;">
                    -
                </td>
            </tr>
        </table>
    </td>
  </tr>
</table>
</div>
</body>
</html>