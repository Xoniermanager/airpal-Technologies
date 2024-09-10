@extends('layouts.patient.main')
@section('content')
    <div class="dashboard-header">
        <h3>Account</h3>
    </div>
    <div class="tab-content pt-0">
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
        <div class="search-header">
            <div class="search-field">
                <input type="text" class="form-control" placeholder="Search" id="search">
                <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
            </div>
            <div class="mb-3">
                <select id="status" class="form-select">
                    <option value="">Status</option>
                    <option value="Completed">Completed</option>
                    <option value="Pending">Pending</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <div class="input-block dash-search-input mb-3">
                <input type="date" class="form-control" id="date">
            </div>
        </div>
        @include('patients.payment.list')
    </div>
    <script>
        jQuery("#search").on('keyup', function() {
            search_filter_results();
        });
        jQuery("#date").on('change', function() {
            search_filter_results();
        });
        jQuery("#status").on('change', function() {
            search_filter_results();
        });

        function search_filter_results() {
            $.ajax({
                type: 'GET',
                url: "{{ route('patient-accounts.searchFilter') }}",
                data: {
                    'date': $('#date').val(),
                    'search': $('#search').val(),
                    'status': $('#status').val()
                },
                success: function(response) {
                    $('#payment_details_list').replaceWith(response.data);
                }
            });
        }
    </script>
@endsection
