@extends('layouts.doctor.main')
@section('content')
    <div class="" style="background:#f8f8f8;padding:20px;">
        <div style="display: flex;
        margin-bottom: 20px;
        justify-content: space-between;">
            <a href="{{ route('prescription.index') }}" class="btn btn-primary btn-sm">Back</a>
            <a href="{{ route('prescription.pdf.download', Crypt::encrypt($prescriptionDetails->id)) }}"
                class="btn btn-primary btn-sm">Download PDF</a>
        </div>

        <div style="width:800px;margin:auto;textalign:center;background:#fff;">

            @include('prescription_pdf_temp')
        </div>
    </div>
@endsection
