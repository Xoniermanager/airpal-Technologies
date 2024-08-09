@extends('layouts.patient.main')
@section('content')
    <div class="dashboard-header">
        <h3>Dairy</h3>
        <a href="{{ route('patient.diary.add') }}" class="btn btn-primary float-right">Add Diary</a>
    </div>
    @if (session('error'))
        <div class="alert alert-danger alert-dismissible">
            {{ session('error') }}
        </div>
    @endif
    @if (session('success'))
        <div class="alert alert-success alert-dismissible">
            {{ session('success') }}
        </div>
    @endif
    <div class="custom-table">
        <div class="table-responsive">
            <table class="table table-hover table-center mb-0">
                <thead>
                    <tr>
                        <th>Sr. No.</th>
                        <th>Note</th>
                        <th>Pulse Rate</th>
                        <th>B P</th>
                        <th>Avg Body Temp</th>
                        <th>Avg Heart Beat</th>
                        <th>Glucose</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($allDiaryDetails as $key => $diaryDetails)
                        <tr>
                            <td>{{ $key + 1 }}.</td>
                            <td>{{ $diaryDetails->note }}</td>
                            <td>{{ $diaryDetails->pulse_rate }}</td>
                            <td>{{ $diaryDetails->bp }}</td>
                            <td>{{ $diaryDetails->avg_body_temp }}</td>
                            <td>{{ $diaryDetails->avg_heart_beat }}</td>
                            <td>{{ $diaryDetails->glucose }}</td>
                            <td>
                                @if (date('Y-m-d', strtotime($diaryDetails->created_at)) == date('Y-m-d') ||
                                        date('Y-m-d', strtotime($diaryDetails->created_at)) == date('Y-m-d', strtotime('-1 days')))
                                    <a href="{{ route('patient.diary.edit', $diaryDetails->id) }}">
                                        <i class="fa fa-edit btn btn-info text-white btn-sm mr-1"></i>
                                    </a>
                                @endif
                                <a href="{{ route('patient.diary.view', $diaryDetails->id) }}">
                                    <i class="fa fa-eye btn btn-dark btn-sm"></i>
                                </a>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="text-denger">No Diary Found</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
            {{ $allDiaryDetails->links() }}
        </div>
    </div>
@endsection
