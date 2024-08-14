@extends('layouts.patient.main')
@section('content')
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
    <div class="row">
        <div class="col-lg-12">
            <div class="dashboard-header">
                <h3> Patient Diary</h3>
                <ul class="header-list-btns">
                    <li class="mr-3" style="margin-right: 10px;">
                        <div class="input-block dash-search-input">
                            <input type="date" class="form-control" value="{{ date('Y-m-d') }}" id="date">
                        </div>
                    </li>
                    <li>
                        <div class="input-block dash-search-input ">
                            <a href="{{route('patient.diary.add')}}" class="btn btn-primary text-white" id="date">Add Diary
                            </a>
                        </div>
                    </li>
                </ul>
            </div>
            @include('patients.diary.view_detail')
        </div>
    </div>
    <script>
        jQuery("#date").on('change', function() {
            search_filter_results();
        });

        function search_filter_results() {
            $.ajax({
                type: 'GET',
                url: "{{ route('patient.diary.filters') }}",
                data: {
                    'date': $('#date').val(),
                },
                success: function(response) {
                    $('#filter_list').replaceWith(response.data);
                }
            });
        }
    </script>
@endsection
