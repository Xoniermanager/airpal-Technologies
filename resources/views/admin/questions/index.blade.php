@extends('layouts.admin.main')
@section('content')

<div class="dashboard-header">
    <h3>My Patients</h3>
</div>
<div class="main-wrapper">
    <div class="page-wrapper">
        <div>
            <div class="page-header">

                <div class="row">
                    <div class="col-sm-12">
                        <div class="card">
                            <div class="card-header">
                                <div class="row align-items-center">

                                    <div class="col-sm-3 col">
                                        <label value="">Filter by Doctor</label>
                                        <select class="form-control select" name="doctor" id="doctors">
                                            <option value="">All</option>
                                            @forelse ($doctors as  $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->fullName }}</option>
                                            @empty
                                                <option>Not found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col">
                                        <label value="">Filter by Specialty</label>
                                        <select class="form-control" id="specialty">
                                            <option value="">All</option>
                                            @forelse ($specialties as $specialty)
                                                <option value="{{ $specialty->id }}">
                                                    {{ $specialty->name }}</option>
                                            @empty
                                                <option>Not found</option>
                                            @endforelse
                                        </select>
                                        </select>
                                    </div>
                                    <div class="col-sm-3 col">
                                        <label value="">Filter by Answer Type</label>
                                        <select class="form-control" id="answerType">
                                            <option value="">All</option>
                                            <option value="text">Text</option>
                                            <option value="optional">Optional</option>
                                            <option value="multiple">Multiple</option>
                                        </select>
                                    </div>
                                    <div class="col float-end">
                                        <a href="#add_question" data-bs-toggle="modal"
                                            class="btn btn-primary float-end mt-2">Add</a>
                                    </div>
                                </div>
                            </div>
                            @include('doctor.questions.question-list')
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <!-- Start : pop up form to add new country  -->
    <div class="modal fade" id="add_question" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered min-w-600px" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Add question</h5>
                    <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="addQuestionForm" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-6 col-sm-6">
                                <div class="mb-3">
                                    <label class="mb-2">Doctor</label>
                                    <div>
                                        <select class="form-control select" name="doctor">
                                            <option value="">Select Doctor</option>
                                            @forelse ($doctors as  $doctor)
                                                <option value="{{ $doctor->id }}">{{ $doctor->fullName }}</option>
                                            @empty
                                                <option>Not found</option>
                                            @endforelse
                                        </select>
                                    </div>
                                    <span class="text-danger" id="doctor-error"></span>
                                </div>
                            </div>
                            <div class="col-6 col-sm-6">
                                <div class="mb-3">
                                    <label class="mb-2">Specialty</label>
                                    <div>
                                        <select class="form-control select" name="specialty">
                                            <option value="">Select Specialty</option>
                                            @forelse ($specialties as $specialty)
                                                <option value="{{ $specialty->id }}">
                                                    {{ $specialty->name }}</option>
                                            @empty
                                                <option>Not found</option>
                                            @endforelse

                                        </select>
                                    </div>
                                    <span class="text-danger" id="specialty-error"></span>

                                </div>
                            </div>

                            
                            <div class="col-6 col-sm-6">
                                <div class="mb-3" id="answer-type-div">
                                    <label class="mb-2">Answer Type</label>
                                    <select class="form-control select answer_type" name="answer_type">
                                        <option value="">Select Answer Type</option>
                                        <option value="text">text</option>
                                        <option value="optional">optional</option>
                                        <option value="multiple">multiple</option>
                                    </select>
                                    <span class="text-danger" id="anser-type-error"></span>

                                </div>
                            </div>

                            <div class="col-12 col-sm-12">
                                <div class="mb-3" id="question-div">
                                    <label class="mb-2">Question</label>
                                    <textarea type="text" name="question" class="form-control"></textarea>
                                    <span class="text-danger" id="question_error"></span>
                                </div>
                            </div>

                            <span class="text-danger" id="options_error"></span>
                            <div class="col-md-6">
                                <div class="optional box show-add-more-options">
                                    <a class="btn btn-primary btn-sm addMoreBtn" onclick="add_options()"><i
                                            class="fa fa-plus fs-5"></i> Add
                                        Option</a>
                                </div>
                                <div class="multiple box">
                                    <a class="btn btn-primary btn-sm addMoreBtn" onclick="add_options()"><i
                                            class="fa fa-plus fs-5"></i> Add
                                        Option</a>
                                </div>
                            </div>
                            <div class="col-12 col-sm-12">
                                <div class="text box p-0 mt-0">
                                    <div class="col-12 col-sm-12">
                                        <div class="mb-3" id="question-div">
                                            <label class="mb-2 text-dark">Answer</label>
                                            <textarea xtype="text" class="form-control min-h-100px" id="answer"></textarea>
                                            <span class="text-danger" id="answer-error"></span>
                                        </div>
                                    </div>
                                </div>
                            </div>


                            <div>
                                <div class="row addMoreOptions">
                                </div>
                            </div>

                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- End : pop up form to add new speciality  -->


    <!-- Start : pop up form to add new country  -->
    <div class="modal fade" id="edit_question" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
        </div>
    </div>
    <!-- End : pop up form to add new speciality  -->

    <!-- Start : pop up form to delete speciality  -->
    <div class="modal fade" id="delete-question" aria-hidden="true" role="dialog">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="form-content p-2">
                        <h4 class="modal-title">Delete</h4>
                        <p class="mb-4">Are you sure want to delete?</p>
                        <input type="hidden" id="delete-question-id" name="question_id">
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
    // Clear all selected options if question type gets changed
    $(document).ready(function() {
        $("body").on('change', '.answer_type', function() {
            jQuery('.addMoreOptions').html('');
            $('.addMoreBtn').removeClass('disabled');
            let selecteOption = $(this).find("option:selected").text();
            // console.log("selecteOption : " + selecteOption);
            if (selecteOption == 'text') {
                jQuery('.show-add-more-options').hide();
                jQuery('.addMoreOptionsEdit').hide();
            } else {
                jQuery('.show-add-more-options').show();
                jQuery('.addMoreOptionsEdit').show();
            }
        });

        $("#addQuestionForm").validate({
            rules: {
                doctor: "required",
                specialty: "required",
                answer_type: "required",
                question: "required",
            },
            messages: {
                doctor: "Please select a doctor!",
                specialty: "Please select a specialty!",
                answer_type: "Please select an answer type!",
                question: "Please enter a question!",
            },
            submitHandler: function(form) {
                var formData = $(form).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.add.questions') }}",
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        swal.fire("Done!", response.message, "success");
                        $('#add_question').modal('hide');
                        // $('#addQuestionForm')[0].reset();
                        $('#question_list').replaceWith(response.data);
                    },
                    error: function(error_messages) {
                        var errors = error_messages.responseJSON;
                        $.each(errors.errors, function(key, value) {
                            var id = key.replace(/\./g, '_');
                            console.log('#' + id + '_error');
                            $('#' + id + '_error').html(value);
                            remove_error_div(id);
                        });
                    }
                });
            }
        });

        $(document).on('click', '.delete-question', function() {
            var id = $(this).attr('data-id');
            $("#delete-question-id").val(id);
        });

        $(document).on('click', '.confirm-delete', function(e) {
            e.preventDefault();
            var id = $("#delete-question-id").val();
            if (id != '') {
                $.ajax({
                    method: 'post',
                    type: 'delete',
                    data: {
                        '_token': '{{ csrf_token() }}',
                        'id': id
                    },

                    url: "{{ route('admin.delete-questions') }}",
                    success: function(response) {
                        swal.fire("Done!", response.message, "success");
                        $('#delete-question').modal('hide');
                        $('#question_list').replaceWith(response.data);
                    }
                });
            }
        });

        $(document).on('click', '.close-form-add', function() {
            $('#edit_question').hide();
            $('#editQuestionForm')[0].reset();
            $('#addQuestionForm')[0].reset();
        });

        // Function to remove server error message div after 5 seconds
        function remove_error_div(error_ele_id) {
            setTimeout(function() {
                $("#" + error_ele_id + "_error").html('');
            }, 5000);
        }
    });

    function edit_question(question_id) {
        jQuery.ajax({
            type: 'GET',
            url: "{{ route('doctor.get.question.html') }}",
            data: {
                'question_id': question_id,
                '_token': '{{ csrf_token() }}',
            },
            dataType: 'json',
            success: function(response) {
                console.log(response);
                jQuery('#edit_question').html(response.data);
                update_question_options();
            },
            error: function(error_data) {

            }
        });

        $('#edit_question').addClass('show').css('display', 'block').attr('aria-hidden', 'false');
    }

    // Function to handle adding options dynamically
    function add_options(id) {
        if (id) {
            var currentOptions = jQuery('.addMoreOptionsEdit .option-details');
        } else {
            var currentOptions = jQuery('.addMoreOptions .option-details');
        }
        counter = currentOptions.length;
        console.log("counter : " + counter)
        var options_html =
            '<div class="col-md-6  option-details">' +
            '<div class="row panel panel-body">' +
            '<div class="col-md-10 form-group">' +
            '<label for="">Option ' + (counter + 1) + '</label>' +
            '<input class="form-control" type="text" name="options[' + counter + '][value]">' +
            '<span class="text-danger" id="options_' + counter + '_value_error"></span>' +
            '</div>' +
            '<div class="col-md-2 form-group mt-4">' +
            '<a onclick="remove_options(this)" class="btn btn-danger btn-sm float-right">' +
            '<i class="fa fa-minus"></i></a>' +
            '</div>' +
            '</div>' +
            '</div>';

        if (id) {
            $('.addMoreOptionsEdit').append(options_html);
        } else {
            $('.addMoreOptions').append(options_html);
        }

        counter += 1;
        if (counter >= 4) {
            $('.addMoreBtn').addClass('disabled');
        }
    }
    var site_admin_base_url = "{{ env('SITE_ADMIN_BASE_URL') }}";

    function remove_options(this_ele, id) {

        if (id != null) {
            event.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                text: "You won't be able to revert this!",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Yes, delete it!"
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: site_admin_base_url + 'questions-options/delete',
                        type: "post",
                        data: {
                            '_token': '{{ csrf_token() }}',
                            'id': id
                        },
                        success: function(res) {
                            Swal.fire("Done!", "It was successfully deleted!", "success");
                            $(this_ele).closest('.option-details').remove();

                        },
                        error: function(xhr, ajaxOptions, thrownError) {
                            Swal.fire("Error deleting!", "Please try again", "error");
                        }
                    });
                }
            });
        } else {
            $(this_ele).closest('.option-details').remove();
            setTimeout(function() {

                var currentOptions = jQuery('.addMoreOptions .option-details');
                console.log("Testing remove counter" + currentOptions.length);
                if (currentOptions.length < 4) {
                    $('.addMoreBtn').removeClass('disabled');
                }
            }, 1000);
        }
    }

    function update_question_options() {
        $("#editQuestionForm").validate({
            rules: {
                doctor: "required",
                specialty: "required",
                answer_type: "required",
                questions: "required",
            },
            messages: {
                doctor: "Please select a doctor!",
                specialty: "Please select a specialty!",
                answer_type: "Please select an answer type!",
                questions: "Please enter a question!",
            },
            submitHandler: function(form) {
                var formData = $(form).serialize();
                console.log(formData);
                $.ajax({
                    url: "{{ route('admin.questions.update') }}",
                    type: 'post',
                    data: formData,
                    success: function(response) {
                        console.log(response)
                        $('#edit_question').modal().hide();
                        $('#question_list').replaceWith(response.data);
                        swal.fire("Done!", response.message, "success");
                    },
                    error: function(error_messages) {
                        var errors = error_messages.responseJSON;
                        $.each(errors.errors, function(key, value) {
                            var id = key.replace(/\./g, '_');
                            console.log('#' + id + '_error');
                            $('#' + id + '_error').html(value);

                        });

                    }
                });
            }
        });
    }

    $(document).ready(function() {
        $('#specialty, #answerType, #doctors').on('change', function() {
            search_question();
        });
    });

    function search_question() {
        let doctorId = $('#doctors').val();
        let answerType = $('#answerType').val();
        let specialty = $('#specialty').val();
        console.log(doctorId);

        $.ajax({
            url: "{{ route('doctor.question.filter') }}", // Correct way to use route in Blade template
            type: 'GET',
            data: {
                doctorId: doctorId,
                answerType: answerType,
                specialty: specialty,
                _token: '{{ csrf_token() }}'
            },
            success: function(response) {
                jQuery('#question_list').replaceWith(response.data);
                jQuery('#question_list').hide().delay(200).fadeIn();
            },
            error: function(xhr, status, error) {
                console.error(error);
            }
        });
    }

    </script>
@endsection




<style>
    .box {
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
    .text-hide-show {
        display: none;
    }
</style>
