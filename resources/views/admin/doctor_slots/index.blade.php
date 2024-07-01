@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">slots</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard </a>
                                </li>
                                <li class="breadcrumb-item active">slots</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#add_slots" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.doctor_slots.slot-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
 
        <!-- Start : pop up form to add new country  -->
        <div class="modal fade" id="add_slots" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Slot</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
    
                    <div class="modal-body">
                        <form id="addslotsForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Doctors<span style="color: red">* </span></label>
                                        <select class="form-control select" name="doctor_id">
                                            <option value="">Select Doctor</option>
                                                @forelse ($doctors as $doctor)
                                                    <option value="{{ $doctor->id }}">{{ $doctor->first_name }} {{ $doctor->last_name }}</option>
                                                @empty
                                                    <option>Not found</option>
                                                @endforelse
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Slot Duration <span style="color: red">* </span>(in
                                            minutes)</label>
                                        <input type="number" name="slot_duration" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">CleanUp Interval(Break between meetings) <span>(in
                                                minutes)</span></label>
                                        <input type="number" name="cleanup_interval" class="form-control" value="0">
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Select the days on which you are not avaialble</label>  
                                        <select id="exceptionDaysAdd" class="form-control" name="exception_day_ids[]" > </select>
                                        {{-- <p id="exceptionDaysID" style="display: none" value = ""></p> --}}
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Starting date of each month for creating slots</label>
                                        <input type="number" name="start_month" class="form-control"
                                           >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3" id="slots-div">
                                        <label class="mb-2">Upto which date of each month slots will be created</label>
                                        <input type="number" name="end_month" class="form-control">
                                    </div>
                                </div>
                            </div>
                            {{-- <div class="row">
    
                            </div> --}}
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Start Slots From Date</label>
                                        <input type="date" name="start_slots_from_date" class="form-control"
                                            >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3" id="slots-div">
                                        <label class="mb-2">Stop slots creation after this date</label>
                                        <input type="date" name="stop_slots_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            
                                <div class="col-6">
                                    <div class="mb-3" id="slots-div">
                                        <label class="mb-2">Create slots in advanced for days</label>
                                        <input type="number" name="slots_in_advance" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to add new speciality  -->


        <!-- Start : pop up form to edit slots  -->
        <div class="modal fade" id="edit_slot" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit slots</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editslotsForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Doctors<span style="color: red">* </span></label>
                                        <select class="form-control select" name="doctor_id" id="doctor_id">
                                            <option value="">Select Doctor</option>
                                            @forelse ($doctors as $doctors)
                                                <option value="{{ $doctors->id }}">{{ $doctors->first_name }} {{ $doctors->last_name }}</option>
                                            @empty
                                                <option>Not found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Slot Duration <span style="color: red">* </span>(in
                                            minutes)</label>
                                        <input type="number" name="slot_duration" id="slot_duration" class="form-control">
                                    </div>
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">CleanUp Interval(Break between meetings) <span>(in
                                                minutes)</span></label>
                                        <input type="number" name="cleanup_interval" id="cleanup_interval" class="form-control" value="0">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Select the days on which you are not avaialble</label>
                                        {{-- <select id="choices-multiple-remove-button" name='exception_day_ids[]' placeholder="Select up to 5 tags" multiple>
                                            @forelse ($weekDays as $weekDay)
                                                <option value="{{ $weekDay->id }}">{{ $weekDay->name }}</option>
                                            @empty
                                                <option>Not found</option>
                                            @endforelse
                                        </select> --}}
                                        <select id="exceptionDays" class="form-control" name="exception_day_ids[]" > </select>
                                        <p id="exceptionDaysID" style="display: none" value = ""></p>
        
                                    </div>
                                </div>

                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Starting date of each month for creating slots</label>
                                        <input type="number" name="start_month" class="form-control" id="start_month" >
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3" id="slots-div">
                                        <label class="mb-2">Upto which date of each month slots will be created</label>
                                        <input type="number" name="end_month" class="form-control" id="end_month" >
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Start Slots From Date</label>
                                        <input type="date" name="start_slots_from_date" class="form-control"
                                            id="start_slots_from_date">
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="mb-3" id="slots-div">
                                        <label class="mb-2">Stop slots creation after this date</label>
                                        <input type="date" name="stop_slots_date" id="stop_slots_date" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                            
                                <div class="col-6">
                                    <div class="mb-3" id="slots-div">
                                        <label class="mb-2">Create slots in advanced for days</label>
                                        <input type="number" name="slots_in_advance" id="slots_in_advance" class="form-control">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to edit speciality  -->

        <!-- Start : pop up form to delete speciality  -->
        <div class="modal fade" id="delete-slot" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="delete-slots-id" name="slots_id">
                            <button type="button" class="btn btn-primary confirm-delete">Delete </button>
                            <button type="button" class="btn btn-danger " data-bs-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to delete speciality  -->



    </div>
@endsection
@section('javascript')
    <script>
        // script for applying custom validation on jquery ui plugin 
        $.validator.addMethod("greaterThan", function(value, element, params) {
            var startMonth = $(params).val();
            if (!/Invalid|NaN/.test(new Date(value))) {
                return new Date(value) > new Date(startMonth);
            }
            return isNaN(value) && isNaN(startMonth) || (Number(value) > Number(startMonth));
        }, 'End month must be greater than start month.');

        $(document).ready(function() {

            jQuery("#addslotsForm").validate({
                rules: {
                    doctor_id : "required",
                    slot_duration: "required",
                    start_month: {
                        digits: true,
                        range: [0, 30]
                    },
                    end_month: {
                        digits: true,
                        range: [1, 30],
    
                    },
                    // exception_day_id: "required",
                    // slots_in_advance: "required",
                    // start_slots_from_date: "required",
                    // stop_slots_date: {
                    //     greaterThan: "#start_slots_from_date"
                    // },
                },
                messages: {
                    doctor_id: "The doctor field is required.",
                    slot_duration: "The slot duration field is required.",
                    // cleanup_interval: "The cleanup interval field is required.",
                    start_month: {
                        required: "The start month field is required.",
                        digits: "Please enter a valid integer.",
                        range: "Please enter a value between 1 and 30."
                    },
                    end_month: {
                        digits: "Please enter a valid integer.",
                        range: "Please enter a value between 1 and 30.",
                        // greaterThan: "End month must be greater than start month."
                    },
                    // exception_day_id: "The exception day field is required.",
                    // slots_in_advance: "The slots in advance field is required.",
                    // start_slots_from_date: "The start slots from date field is required.",
                    stop_slots_date: {
                        // required: "The stop slots date field is required.",
                       // greaterThan: "Stop slots date must be greater than start date."
                    },
                },


                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.add.slots') ?>",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            swal.fire("Done!", response.message, "success");
                            jQuery('#add_slots').modal('hide');
                            $('#addslotsForm')[0].reset();
                            jQuery('#slots_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100) + 1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#add_slots [name=' + error_key + ']')
                                    .after(
                                        '<span id="' + random_id +
                                        '_error" class="text text-danger ' + error_key +
                                        '_error">' + errors[
                                            error_key] + '</span>');
                                remove_error_div(random_id);
                            }
                        }
                    });
                }
            });

            /* Remove server erorr messge div */
            function remove_error_div(error_ele_id) {
                setTimeout(function() {
                    jQuery("#" + error_ele_id + "_error").remove();
                }, 5000);
            }

            jQuery("#editslotsForm").validate({
                rules: {
                    doctor_id : "required",
                    slot_duration: "required",
                    start_month: {
                        digits: true,
                        range: [0, 30]
                    },
                    end_month: {
                        digits: true,
                        range: [1, 30],
    
                    },
                    // exception_day_id: "required",
                    // slots_in_advance: "required",
                    // start_slots_from_date: "required",
                    // stop_slots_date: {
                    //     greaterThan: "#start_slots_from_date"
                    // },
                },
                messages: {
                    doctor_id: "The doctor field is required.",
                    slot_duration: "The slot duration field is required.",
                    // cleanup_interval: "The cleanup interval field is required.",
                    start_month: {
                        required: "The start month field is required.",
                        digits: "Please enter a valid integer.",
                        range: "Please enter a value between 1 and 30."
                    },
                    end_month: {
                        digits: "Please enter a valid integer.",
                        range: "Please enter a value between 1 and 30.",
                        // greaterThan: "End month must be greater than start month."
                    },
                    // exception_day_id: "The exception day field is required.",
                    // slots_in_advance: "The slots in advance field is required.",
                    // start_slots_from_date: "The start slots from date field is required.",
                    stop_slots_date: {
                        // required: "The stop slots date field is required.",
                       // greaterThan: "Stop slots date must be greater than start date."
                    },
                },

                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "{{ route('admin.slots.update') }}",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            jQuery('#edit_slot').modal('hide');
                            swal.fire("Done!", response.message, "success");
                            jQuery('#slots_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100) + 1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                $(document).find('#edit_slots [name=' + error_key + ']')
                                    .after(
                                        '<span id="' + random_id +
                                        '_error" class="text text-danger ' + error_key +
                                        '_error">' + errors[
                                            error_key] + '</span>');
                                remove_error_div(random_id);
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-slot', function() {
                const id = $(this).attr('data-id');
                $("#delete-slots-id").val(id);
            });


            $(document).on('click', '.confirm-delete', function(e) {
                e.preventDefault();
                const id = $("#delete-slots-id").val();
                // alert( id );
                if (id != '') {
                    $.ajax({
                        method: 'post',
                        type: 'delete',
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        url: "{{ route('admin.delete-slot') }}",
                        success: function(response) {
                            swal.fire("Done!", response.message, "success");
                            jQuery('#delete-slot').modal('hide');

                            // swal.fire("Done!", response.message, "success");
                            jQuery('#slots_list').replaceWith(response.data);
                        }
                    });
                }
            });


    $(document).on('click', '.close-form-add', function() {
                $('#addCountryForm')[0].reset();
        });
    });


    var exceptionDaysID;
var exceptionDaysIDArrs;

function edit_slot(slotDetails, doctor_exception_days) {
    var details = JSON.parse(slotDetails);
    console.log(details.start_month );
    $("p#exceptionDaysID").text(doctor_exception_days);
    $('#doctor_id').val(details.user_id);  
    $('#slot_duration').val(details.slot_duration);  
    $('#cleanup_interval').val(details.cleanup_interval);  
    $('#start_month').val(details.start_month); 
    $('#end_month').val(details.end_month);
    $('#exception_day_ids').val(doctor_exception_days);  
    $('#start_slots_from_date').val(details.start_slots_from_date);  
    $('#stop_slots_date').val(details.stop_slots_date);  
    $('#slots_in_advance').val(details.slots_in_advance);

    exceptionDaysID = jQuery('p#exceptionDaysID').text();
    if (exceptionDaysID.length > 1) {
        var arrayexceptionDaysID = JSON.parse(exceptionDaysID);
        var exceptionDayValue = "" + arrayexceptionDaysID.join(",") + "";
        exceptionDaysIDArrs = exceptionDayValue.split(',');
    }
    setMultiSelectValue();
}

    function setMultiSelectValue() {
        if (exceptionDaysIDArrs && exceptionDaysIDArrs.length > 0) {
            var multiSelect = jQuery("#exceptionDays").data("kendoMultiSelect");
            if (multiSelect) {
                multiSelect.value(exceptionDaysIDArrs);
            }
        }
    }

jQuery(document).ready(function() {
    jQuery("#exceptionDays").kendoMultiSelect({
        filter: "contains",
        dataTextField: "name",
        dataValueField: "id",
        dataSource: exceptionDaysDataSource,
        noDataTemplate: jQuery("#noExceptionDaysTemplate").html()
    });

    setMultiSelectValue();
});


jQuery(document).ready(function() {
    jQuery("#exceptionDaysAdd").kendoMultiSelect({
        filter: "contains",
        dataTextField: "name",
        dataValueField: "id",
        dataSource: exceptionDaysDataSource,
        noDataTemplate: jQuery("#noExceptionDaysTemplate").html()
    });

    setMultiSelectValue();
});


        // $(document).ready(function() {

        //     var multipleCancelButton = new Choices('#choices-multiple-remove-button', {
        //         removeItemButton: true,
        //         maxItemCount: 7,
        //         searchResultLimit: 5,
        //         renderChoiceLimit: 7
        //     });
        // });

    var site_admin_base_url = 'http://127.0.0.1:8000/admin/';
    var exceptionDaysDataSource = new kendo.data.DataSource({
    batch: true,
    transport: {
        read: {
            url: site_admin_base_url + "slots/getWeekDays",
            dataType: "json"
        },
        // create: {
        //     url: site_admin_base_url + "language/ajax-create",
        //     dataType: "json"
        // },
        parameterMap: function(options, operation) {
            if (operation !== "read" && options.models) {
                return {
                    models: kendo.stringify(options.models)
                };
            }
        }
    },
    schema: {
        model: {
            id: "id",
            fields: {
                id: {
                    type: "number"
                },
                name: {
                    type: "string"
                }
            }
        }
    }
});


    </script>

@endsection

