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
    @include('doctor.my-patient.list')
    <script>
    jQuery("#searchKey").keyup(function() {
        searchfilter();
    });

    function searchfilter() {
        $.ajax({
            url: "<?= route('getsearch.filter.data') ?>",
            type: 'get',
            data: {
                search_key: jQuery('#searchKey').val(),
                '_token': '{{ csrf_token() }}'
            },
            success: function(response) {
                jQuery('#patient_list').replaceWith(response.data);
            },
            error: function(xhr, status, error) {
                // Handle any errors
                console.error(error);
            }
        });
    }
</script>
@endsection

