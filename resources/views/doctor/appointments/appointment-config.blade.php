@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>Appointment Configuration Details</h3>
    </div>
    <form id="{{ isset(($doctorAppointmentConfigDetails->slot_duration)) ? 'updateslotsForm' : 'addslotsForm' }}" class="setting-card create-update-appointment-config" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="mb-2">Slot Duration <span style="color: red">* </span>(in
                        minutes)</label>
                    <input type="number" name="slot_duration" class="form-control"
                        value="{{ $doctorAppointmentConfigDetails->slot_duration ?? '' }}">
                    <input type="hidden" name="doctor_id" class="form-control" value="{{ auth()->user()->id }}">
                    <input id="appointment-config-id" type="hidden" name="appointment_config_id" value="{{ $doctorAppointmentConfigDetails->id ?? '' }}">
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label class="mb-2">CleanUp Interval(Break between meetings) <span>(in
                            minutes)</span></label>
                    <input type="number" name="cleanup_interval" class="form-control"
                        value="{{ $doctorAppointmentConfigDetails->cleanup_interval ?? '' }}">
                </div>
            </div>
        </div>

        <div class="row">

        <div class="col-6">
            <div class="mb-3">
                <label class="mb-2">Starting date of each month for creating slots</label>
                <input type="number" name="start_month" class="form-control"
                    value="{{ $doctorAppointmentConfigDetails->start_month ?? 1 }}">
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3" id="slots-div">
                <label class="mb-2">Upto which date of each month slots will be created </label>
                <input type="number" name="end_month" class="form-control"
                    value="{{ $doctorAppointmentConfigDetails->end_month ?? 30 }}">
            </div>
        </div>
        </div>
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="mb-2">Select the days on which you are not avaialble</label>
                    <select id="exceptionDaysAdd" class="form-control" name="exception_day_ids[]"> </select>
                    <p id="exceptionDaysID" style="display: none"> {{ $exceptionIds }}</p>
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3">
                    <label class="mb-2">Start Creating Slots From Date</label>
                    <input type="date" name="start_slots_from_date" class="form-control"
                        value="{{ $doctorAppointmentConfigDetails->start_slots_from_date ?? '' }}">
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col-6">
                <div class="mb-3" id="slots-div">
                    <label class="mb-2">Create slots in advanced for days</label>
                    <input type="number" name="slots_in_advance" class="form-control"
                        value="{{ $doctorAppointmentConfigDetails->slots_in_advance ?? 30 }}">
                </div>
            </div>

            <div class="col-6">
                <div class="mb-3" id="slots-div">
                    <label class="mb-2">Stop slots creation after this date </label>
                    <input type="date" name="stop_slots_date" class="form-control"
                        value="{{ $doctorAppointmentConfigDetails->stop_slots_date ?? '' }}">
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-primary">{{ isset(($doctorAppointmentConfigDetails->slot_duration)) ? 'Update Appointment Config' : 'Add Appointment Config' }}</button>
    </form>

@endsection

@section('javascript')
<script>
    var site_base_url = "{{ env('SITE_BASE_URL') }}";

    // Save New Appointment configuration details for doctor
    $(document).ready(function() {
        jQuery("#addslotsForm").validate({
            rules: {
                doctor_id: "required",
                slot_duration: "required",
                start_month: {
                    required: true,
                    digits: true,
                    range: [0, 30]
                },
                end_month: {
                    required: true,
                    digits: true,
                    range: [1, 30],
                },
                slots_in_advance:{
                    required:true,
                    digits:true,
                    min:5
                }
            },
            messages: {
                doctor_id: "The doctor field is required.",
                slot_duration: "The slot duration field is required.",
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
                slots_in_advance: "The slots in advance field is required.",
            },
            submitHandler: function(form) {
                var formData = $(form).serialize();
                $.ajax({
                    url: "<?= route('doctor.add.appointment.config') ?>",
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        if (response.status == true && response.data)
                        {
                            swal.fire("Done!", response.message, "success");
                            setTimeout(function(){
                                // Refresh the page
                                location.reload();
                            },3000);
                        }
                    },
                    error   : function(error_messages) {
                        let errors = JSON.parse(error_messages.responseText).errors;
                        let randon_number = Math.floor((Math.random() * 100) + 1);
                        for (var error_key in errors) {
                            random_id = error_key + '_' + randon_number
                            jQuery('.' + error_key + '_error').remove();
                            jQuery(document).find('#addslotsForm [name=' + error_key + ']')
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


    // Update existing appointment configuration details for doctor
    jQuery("#updateslotsForm").validate({
            rules: {
                appointment_config_id:{
                    required: true,
                    digits: true,
                },
                doctor_id: "required",
                slot_duration: "required",
                start_month: {
                    required: true,
                    digits: true,
                    range: [0, 30]
                },
                end_month: {
                    required: true,
                    digits: true,
                    range: [1, 30],
                },
                slots_in_advance:{
                    required:true,
                    digits:true,
                    min:5
                }
            },
            messages: {
                doctor_id: "The doctor field is required.",
                slot_duration: "The slot duration field is required.",
                appointment_config_id:{
                    "required": "Invalid request to update appointment config data!",
                    "digit": "Invalid request to update appointment config data!"
                },
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
                slots_in_advance: "The slots in advance field is required.",
            },
            submitHandler: function(form) {
                var formData = $(form).serialize();
                let current_appointment_config_id = jQuery('#appointment-config-id').val();
                $.ajax({
                    url: window.site_base_url + "doctor/update-appointment-config/"+current_appointment_config_id,
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        if (response.status == true)
                        {
                            swal.fire("Done!", response.message, "success");
                        }
                        else
                        {
                            swal({
                                title: "Are you sure to remove old configuration and create new appointment configuration ?",
                                text: response.message + "!",
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonColor: "#DD6B55",
                                confirmButtonText: "Yes, Create new configuration!",
                            }).then(result => {
                                // swal("Deleted!", "Your file has been deleted.", "success");
                                if (result.value) {
                                    let appointment_config_end_date = document.getElementById('appointment-config-end-date');

                                    if(appointment_config_end_date != null)
                                    {
                                        jQuery(appointment_config_end_date).val(response.data);
                                    }
                                    else
                                    {
                                        jQuery('#appointment-config-id').after('<input id="appointment-config-end-date" type="hidden" name="appointment_config_end_date" value="'+ response.data +'">');
                                    }
                                    jQuery('#updateslotsForm').submit();
                                } else if (
                                // Read more about handling dismissals
                                result.dismiss === swal.DismissReason.cancel
                                ) {
                                swal("Cancelled", "Your current appointment config will be used! No changes done!", "error");
                                }
                                // swall.closeModal();
                            });
                        }
                    },
                    error: function(error_messages) {
                        let errors = JSON.parse(error_messages.responseText).errors;
                        let randon_number = Math.floor((Math.random() * 100) + 1);
                        for (var error_key in errors) {
                            random_id = error_key + '_' + randon_number
                            jQuery('.' + error_key + '_error').remove();
                            jQuery(document).find('#updateslotsForm [name=' + error_key + ']')
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

    exceptionDaysID = jQuery('p#exceptionDaysID').text();
    console.log(exceptionDaysID);

    if (exceptionDaysID.length > 1) {
        var arrayexceptionDaysID = JSON.parse(exceptionDaysID);
        var exceptionDayValue = "" + arrayexceptionDaysID.join(",") + "";
        exceptionDaysIDArrs = exceptionDayValue.split(',');
    }
    setMultiSelectValue();


    jQuery(document).ready(function() {
        jQuery("#exceptionDaysAdd").kendoMultiSelect({
            filter: "contains",
            dataTextField: "name",
            dataValueField: "id",
            dataSource: exceptionDaysDataSource,
            value: exceptionDaysIDArrs,
            noDataTemplate: jQuery("#noExceptionDaysTemplate").html()
        });
        setMultiSelectValue();
    });

    function setMultiSelectValue() {
        if (exceptionDaysIDArrs && exceptionDaysIDArrs.length > 0) {
            var multiSelect = jQuery("#exceptionDays").data("kendoMultiSelect");
            if (multiSelect) {
                multiSelect.value(exceptionDaysIDArrs);
            }
        }
    }

    var exceptionDaysDataSource = new kendo.data.DataSource({
        batch: true,
        transport: {
            read: {
                url: window.site_base_url + "slots/getWeekDays",
                dataType: "json"
            },
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
