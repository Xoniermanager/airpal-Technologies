@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>My Patients</h3>
        <ul class="header-list-btns">
            <li>
                <div class="input-block dash-search-input">
                    <input type="text" class="form-control" placeholder="Search" id="searchKey">
                    <span class="search-icon"><i class="fa-solid fa-magnifying-glass"></i></span>
                </div>
            </li>
        </ul>
    </div>
    <div class="appointment-tab-head">
        <div class="appointment-tabs">
            <p style="display:none" id="doctor-id">{{ $doctorDetails->id }}</p>
            <p style="display:none" id="selected-filter">regular</p>
            <ul class="nav nav-pills inner-tab " id="pills-tab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="regular" type="button" onclick="appointment_filter(this)">All
                        patient<span>{{ count($patients) }}</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="regular" type="button" onclick="appointment_filter(this)">Regular
                        patient<span>{{ $regularPatients }}</span></button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link " id="new" type="button" onclick="appointment_filter(this)">New
                        patient<span> {{ $newPatients ?? 0 }}</span></button>
                </li>

            </ul>
        </div>
    </div>

    @include('doctor.my-patient.list')
@endsection

@section('javascript')
<script>
    $("#searchKey").keyup(function() {
        filter();
    });

    // $('input[type=date]').change(function() {
    //     filter();
    // });

    function appointment_filter(element) {
        document.querySelectorAll('.nav-link').forEach(function(navLink) {
            navLink.classList.remove('active');
        });
        element.classList.add('active');
        jQuery('#selected-filter').text(jQuery(element).attr('id'));
        filter();
    }

    function filter() {
        let key = jQuery('#selected-filter').text();
        let userId = jQuery('#doctor-id').text();
        let searchKey = jQuery('#searchKey').val();
        let dateSearch = jQuery('#dateSearch').val();
        $.ajax({
            url: "<?= route('doctor.filter.on.my-patient') ?>",
            type: 'get',
            data: {
                key: key,
                doctorId: userId,
                searchKey: searchKey,
                dateSearch: dateSearch,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {

                jQuery('#my-patient-list').replaceWith(response.data);
                jQuery('#my-patient-list').hide().delay(200).fadeIn();
            },
            error: function(xhr, status, error) {
                // Handle any errors
                console.error(error);
            }
        });
    }
</script>

@endsection