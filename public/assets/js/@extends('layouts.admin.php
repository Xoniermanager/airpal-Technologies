@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">question</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">question</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#add_question" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.questions.question-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start : pop up form to add new country  -->
        <div class="modal fade" id="add_question" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
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
                                                    <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                                @empty
                                                    <option>Not found</option>
                                                @endforelse

                                            </select>
                                        </div>
                                        <span class="text-danger" id="specialty-error"></span>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3" id="question-div">
                                        <label class="mb-2">Question</label>
                                        <textarea type="text" name="questions" class="form-control"></textarea>
                                        <span class="text-danger" id="questions-error"></span>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12">
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

                                <div class="text box">
                                    <div class="col-12 col-sm-12">
                                        <div class="mb-3" id="question-div">
                                            <label class="mb-2">Answer</label>
                                            {{-- <textarea type="text" name="answer" class="form-control" id="answer"></textarea> --}}
                                            <span class="text-danger" id="answer-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="optional box">
                                    <a class="btn btn-primary btn-sm addMoreBtn" onclick="get_options()"><i
                                            class="fa fa-plus fs-5"></i> Make Option (radio)</a>
                                    <div class="addMoreOptionsEdit"></div>
                                    {{-- <div id="addMoreOptions1"></div> --}}
                                </div>
                                <div class="multiple box">
                                    <a class="btn btn-primary btn-sm addMoreMultileBtn" onclick="get_options_multiple()"><i
                                            class="fa fa-plus fs-5"></i> Make Option (checkbox)</a>
                                    <div id="addMoreMultipleOptions">
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

        <!-- Start : pop up form to edit question  -->
        <div class="modal fade" id="edit_question" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit question</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editQuestionForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-6 col-sm-6">
                                    <div class="mb-3">
                                        <label class="mb-2">Doctor</label>
                                        <div>
                                            <select class="form-control select" name="doctor" id="doctor">
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
                                            <select class="form-control select" name="specialty" id="specialty">
                                                <option value="">Select Specialty</option>
                                                @forelse ($specialties as $specialty)
                                                    <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                                @empty
                                                    <option>Not found</option>
                                                @endforelse

                                            </select>
                                        </div>
                                        <span class="text-danger" id="specialty-error"></span>

                                    </div>
                                </div>

                                <div class="col-12 col-sm-12">
                                    <div class="mb-3" id="question-div">
                                        <label class="mb-2">Question</label>
                                        <textarea type="text" name="questions" class="form-control" id="questions"></textarea>
                                        <span class="text-danger" id="questions-error"></span>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12">
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

                                <div class="text box">
                                    <div class="col-12 col-sm-12">
                                        <div class="mb-3" id="question-div">
                                            <label class="mb-2">Answer</label>
                                            {{-- <textarea type="text" name="answer" class="form-control" id="answer"></textarea> --}}
                                            <span class="text-danger" id="questions-error"></span>
                                        </div>
                                    </div>
                                </div>
                                <div class="optional box">
                                    <a class="btn btn-primary btn-sm addMoreBtn" onclick="get_options()"><i
                                            class="fa fa-plus fs-5"></i> Make Option (radio)</a>
                                    <div class="addMoreOptionsEdit"></div>
                                </div>
                                <div class="multiple box">
                                    <a class="btn btn-primary btn-sm addMoreMultileBtn"
                                        onclick="get_options_multiple()"><i class="fa fa-plus fs-5"></i> Make Option
                                        (checkbox)</a>
                                    <div id="addMoreMultipleOptions"></div>
                                </div>

                            </div>
                            <input type="hidden" id="id" name="id" value="">
                            <button type="submit" class="btn btn-primary w-100">Save</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- End : pop up form to edit speciality  -->

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
        
        var site_admin_base_url = "{{ env('SITE_ADMIN_BASE_URL') }}";


        $(document).ready(function() {
            $(".answer_type").change(function() {
                $(this).find("option:selected").each(function() {
                    var optionValue = $(this).attr("value");
                    if (optionValue) {
                        $(".box").not("." + optionValue).hide();
                        $("." + optionValue).show();
                    } else {
                        $(".box").hide();
                    }
                });
            }).change();
        });

        $(document).ready(function() {
            jQuery("#addQuestionForm").validate({
                rules: {
                    doctor: "required",
                    specialty: "required",
                    answer_type: "required",
                    questions: "required",
                },
                messages: {
                    doctor: "Please select doctor!",
                    specialty: "Please select specialty!",
                    answer_type: "Please select answer type!",
                    questions: "Please enter question question!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.add.questions') ?>",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            swal.fire("Done!", response.message, "success");
                            jQuery('#add_question').modal('hide');
                            $('#addQuestionForm')[0].reset();
                            jQuery('#question_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            var errors = error_messages.responseJSON;
                            $.each(errors.errors, function(key, value) {
                                console.log(value);
                                var id = key.replace(/\./g, '_');
                                console.log('#' + id + '_error');
                                $('#' + id + '_error').html(value);
                                remove_error_div(id)
                            });


                            function remove_error_div(error_ele_id) {
                                setTimeout(function() {
                                    jQuery("#" + error_ele_id + "_error").html('');
                                }, 5000);
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


            jQuery("#editQuestionForm").validate({
                rules: {
                    doctor: "required",
                    specialty: "required",
                    answer_type: "required",
                    questions: "required",
                },
                messages: {
                    doctor: "Please select doctor!",
                    specialty: "Please select specialty!",
                    answer_type: "Please select answer type!",
                    questions: "Please enter question question!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "{{ route('admin.questions.update') }}",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            swal.fire("Done!", response.message, "success");
                            jQuery('#edit_question').modal('hide');
                            jQuery('#question_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100) + 1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                $(document).find('#edit_question [name=' + error_key + ']')
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

            $(document).on('click', '.delete-question', function() {
                const id = $(this).attr('data-id');
                $("#delete-question-id").val(id);
            });

            $(document).on('click', '.confirm-delete', function(e) {
                e.preventDefault();
                const id = $("#delete-question-id").val();
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
                            jQuery('#delete-question').modal('hide');
                            jQuery('#question_list').replaceWith(response.data);
                        }
                    });
                }
            });


            $(document).on('click', '.close-form-add', function() {
                $('#editQuestionForm')[0].reset();
                $('#addQuestionForm')[0].reset();
            });

        }); // ready function end

        var counterForRadion = 0;
        function edit_question(doctorQuestionDetails) {

            var doctorQuestionDetails = JSON.parse(doctorQuestionDetails);
            console.log(doctorQuestionDetails);
            $('.addMoreOptionsEdit').empty();
            $('#id').val(doctorQuestionDetails.id);
            $('#doctor').val(doctorQuestionDetails.doctor_id);
            $('#specialty').val(doctorQuestionDetails.specialty_id);
            $('.answer_type').val(doctorQuestionDetails.answer_type);
            $('#questions').val(doctorQuestionDetails.questions);
            doctorQuestionDetails.options.forEach(function(option, counter) {
                var radio_options_html =
    '<div class="family-detail"><div class="row panel panel-body"><div class="col-md-6 form-group"><label for="">Answers ' +
    (counterForRadion + 1) +
    '</label><input class="form-control" type="text" name="radio[' +
    counterForRadion +
    '][options]" value="' + option.options + '" ><span class="text-danger" id="radio_' + counterForRadion +
    '_options_error"></span><div><input type="hidden" name="radio[' + counterForRadion +
    '][option_id]" value="' + option.id + '"></div></div><div class="col-md-2 form-group mt-4"><a onclick="remove_radion_options(this, ' + option.id + ')" class="btn btn-danger btn-sm float-right"> <i class="fa fa-minus"></i></a></div></div></div>';

$('.addMoreOptionsEdit').append(radio_options_html);

            counterForRadion += 1;
            $(".optional").show();
        });
        }


        function get_options() {

            var radio_options_html =
                '<div class="family-detail"><div class="row panel panel-body"><div class="col-md-6 form-group"><label for="">Answers ' +
                (counterForRadion + 1) +
                '</label><input class="form-control" type="text" name="radio[' +
                counterForRadion +
                '][options]"><span class="text-danger" id="radio_' + counterForRadion +
                '_options_error"></span></div><div class="col-md-2 form-group mt-4"><a onclick="remove_radion_options(this)" class="btn btn-danger btn-sm float-right"> <i class="fa fa-minus"></i></a></div></div></div>';
            $('.addMoreOptionsEdit').append(radio_options_html);
            counterForRadion += 1;
            if (counterForRadion >= 4) {
                $('.addMoreBtn').addClass('disabled');
            }
        }


        var counterForMultiple = 0;
        function get_options_multiple() {
            var family_details_html =
                '<div class="family-detail"><div class="row panel panel-body"><div class="col-md-6 form-group"><label for="">Answers ' +
                (counterForMultiple + 1) +
                '</label><input class="form-control" type="text" name="checkbox[' +
                counterForMultiple +
                '][options]"><span class="text-danger" id="checkbox_' + counterForMultiple +
                '_options_error"></div><div class="col-md-2 form-group mt-4"><a onclick="remove_multiple_options(this)" class="btn btn-danger btn-sm float-right"> <i class="fa fa-minus"></i></a></div></div></div>';
            $('#addMoreMultipleOptions').append(family_details_html);
            counterForMultiple += 1;
            if (counterForMultiple >= 7) {
                $('.addMoreMultileBtn').addClass('disabled');
            }
        }

        // function remove_multiple_options(button) {
        //     $(button).closest('.family-detail').remove();
        //     counterForMultiple -= 1;
        //     if (counterForMultiple < 7) {
        //         $('.addMoreMultileBtn').removeClass('disabled');
        //     }
        // }




        function remove_radion_options(this_ele,id) {
            console.log(id);

            if (this_ele != null) {
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
                                Swal.fire("Done!", "It was succesfully deleted!", "success");
                                jQuery(this_ele).parent().parent().remove();
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                Swal.fire("Error deleting!", "Please try again", "error");
                            }
                        });
                    }
                });
            } else {
                // jQuery(this_ele).parent().parent().remove();
                $(button).closest('.family-detail').remove();
            counterForMultiple -= 1;
            if (counterForMultiple < 7) {
                $('.addMoreMultileBtn').removeClass('disabled');
            }

            }
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
</style>