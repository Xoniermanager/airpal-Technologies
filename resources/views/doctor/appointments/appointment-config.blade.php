@extends('layouts.doctor.main')
@section('content')
    <div class="dashboard-header">
        <h3>Appointment Configuration Details</h3>
    </div>
    <form id="addslotsForm" class="setting-card" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="mb-2">Slot Duration <span style="color: red">* </span>(in
                        minutes)</label>
                    <input type="number" name="slot_duration" class="form-control"
                        value="{{ $doctorAppointmentConfigDetails->slot_duration ?? '' }}">
                    <input type="hidden" name="doctor_id" class="form-control" value="{{ auth()->user()->id }}">
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
                    value="{{ $doctorAppointmentConfigDetails->start_month ?? '' }}">
            </div>
        </div>

        <div class="col-6">
            <div class="mb-3" id="slots-div">
                <label class="mb-2">Upto which date of each month slots will be created </label>
                <input type="number" name="end_month" class="form-control"
                    value="{{ $doctorAppointmentConfigDetails->end_month ?? '' }}">
            </div>
        </div>
        </div>

        <div class="row">
            <div class="col-6">
                <div class="mb-3">
                    <label class="mb-2">Select the days on which you are not avaialble</label>
                    <select id="exceptionDaysAdd" class="form-control" name="exception_day_ids[]"> </select>
                    <p id="exceptionDaysID" style="display: none"> {{ $exceptionIds ?? '' }}</p>
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
                        value="{{ $doctorAppointmentConfigDetails->slots_in_advance ?? '' }}">
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
        <button type="submit" class="btn btn-primary">Save</button>
    </form>

@endsection

@section('javascript')
<script>
    var site_base_url = "{{ env('SITE_BASE_URL') }}";

    $(document).ready(function() {

        jQuery("#addslotsForm").validate({
            rules: {
                doctor_id: "required",
                slot_duration: "required",
                start_month: {
                    digits: true,
                    range: [0, 30]
                },
                end_month: {
                    digits: true,
                    range: [1, 30],

                },
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
                    url: "<?= route('doctor.add.appointment.config') ?>",
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
    text: response.data + "!",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Yes, Create new configuration!",
  }).then(result => {
    swal("Deleted!", "Your file has been deleted.", "success");
    if (result.value) {
      console.log(value);
    } else if (
      // Read more about handling dismissals
      result.dismiss === swal.DismissReason.cancel
    ) {
      swal("Cancelled", "Your imaginary file is safe :)", "error");
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
                url: site_base_url + "doctor/slots/getWeekDays",
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