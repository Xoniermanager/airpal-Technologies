@extends('layouts.patient.main')
@section('content')
    <div class="" style="background:#f8f8f8;padding:20px;">
        <div style="width:800px;margin:auto;textalign:center;background:#fff;">
            @include('prescription_pdf_temp')
        </div>
        <div class="mt-4 text-center">
            <a href="{{ route('patient-appointments.index') }}" class="btn btn-primary">Back</a>
            <a href="{{ route('prescription.pdf.download', Crypt::encrypt($prescriptionDetails->id)) }}"
                class="btn btn-primary"><b><i class="fa fa-print" aria-hidden="true"></i>
                </b></a>
        </div>
    </div>
@endsection
