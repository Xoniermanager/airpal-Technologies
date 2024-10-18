<div class="tab-pane fade" id="service_details_tab">
    <div class="setting-title">
        <h5>Speciality & Services </h5>
    </div>
    <form id="doctorService" method="post" enctype="multipart/form-data">
        @csrf
        <div class="setting-card">
            <div class="add-info membership-infos">
                <div class="row membership-content">
                    <div class="col-lg-6 col-md-6">
                        <div class="form-wrap">
                            <label class="col-form-label">Speciality<span class="text-danger">*</span></label>
                            <input type="hidden" name="specialities" id="hiddenspecialities">
                            <select id="specialities" class="form-control" name="specialities[]"> </select>
                            <p id="doctorspecialitiesID" style="display: none"> {{ $specialitiesIds ?? '' }}</p>

                            <script id="nospecialitiesTemplate" type="text/x-kendo-tmpl">
                                <div>
                                    No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                </div>
                                <br />
                                # var value = instance.input.val(); #
                                # var id = instance.element[0].id; #
                                <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addItemToMultiSelect('#: id #', '#: value #')">Add new item</button>
                            </script>
                            <span class="text-danger" id="specialities_error"></span>
                        </div>

                    </div>
                    <div class="col-lg-6 col-md-6">
                        <div class="d-flex align-items-center">
                            <div class="form-wrap w-100">
                                <label class="col-form-label">Services<span class="text-danger">*</span></label>
                                <input type="hidden" name="services" id="hiddenservices">
                                <select id="Services" class="form-control" name="services[]"> </select>
                                <p id="doctorServicesID" style="display: none"> {{ $servicesIds ?? '' }}</p>
                                <script id="noServicesTemplate" type="text/x-kendo-tmpl">
                                <div>
                                    No data found. Do you want to add new item - '#: instance.filterInput.val() #' ?
                                </div>
                                <br />
                                # var value = instance.input.val(); #
                                # var id = instance.element[0].id; #
                                <button class="k-button k-button-solid-base k-button-solid k-button-md k-rounded-md" onclick="addItemToMultiSelect('#: id #', '#: value #')">Add new item</button>
                            </script>
                                <span class="text-danger" id="services_error"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

        <div class="modal-btn text-end">
            @if (isset($userId))
                <input type="hidden" value="{{ $userId ?? '' }}" name="user_id" id="doctor_user_id">
            @endif
            <a href="#" class="btn btn-gray">Cancel</a>
            <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
        </div>
    </form>
</div>
<script>
    $(document).ready(function() {
        $("#select").kendoMultiSelect();
    });
    jQuery("#doctorService").validate({
        // rules: {
        //     "specialities[]": "required",
        //     "services[]": "required",
        //     "common_health_concern[]": "required",
        // },
        // messages: {
        //     "specialities[]": "Please Select the Specialities",
        //     "services[]": "Please Select the Service",
        //     "common_health_concern[]": "Please Select the Common Concern",
        // },
        submitHandler: function(form) {
            event.preventDefault();

            var formData = new FormData(form);

            $.ajax({
                url: "{{ route('admin.add-doctor-service') }}",
                type: 'post',
                data: formData,
                dataType: 'json',
                processData: false, // Important!
                contentType: false, // Important!
                success: function(response) {
                    if (response.status == true) {
                        swal.fire("Done!", response.message, "success").then(() => {
                            switchTab('#service_details_tab', '#address_tab');
                            // Redirect to another URL after the user closes the alert
                            // window.location.href = response.redirect_url; // replace with your URL
                        });
                    }
                },
                error: function(error_messages) {
                    if (error_messages.responseJSON && error_messages.responseJSON
                        .status === 'error') {
                        Swal.fire("Error!", error_messages.responseJSON.message,
                            "error");

                    } else {
                        var errors = error_messages.responseJSON.errors;

                    }
                    if (errors) {
                        $.each(errors, function(key, value) {
                            var id = key.replace(/\./g, '_');
                            $("#" + id + "_error").html(value[0]);
                        });
                    }
                },
                complete: function() {
                    update_profile_completion_status('{{ $userId }}');
                }
            });
        }
    });
</script>
