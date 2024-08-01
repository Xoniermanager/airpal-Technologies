@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">

                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">

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
                                            <select class="form-control select" name="specialty" id="specialty">
                                                <option value="">All</option>
                                                @forelse ($specialties as $specialty)
                                                    <option value="{{ $specialty->id }}">{{ $specialty->name }}</option>
                                                @empty
                                                    <option>Not found</option>
                                                @endforelse
                                            </select>
                                        </div>
                                        <div class="col-sm-3 col">
                                            <label>Filter by Answer Type</label>
                                            <select name="" id="answerType" class="form-control" name="answerType">
                                                <option value="">All</option>
                                                <option value="text">Text</option>
                                                <option value="optional">Optional</option>
                                                <option value="multiple">Multiple</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 col">
                                            <a href="#add_question" data-bs-toggle="modal"
                                                class="btn btn-primary float-end mt-2">Add</a>
                                        </div>
                                    </div>
                                </div>
                                @include('admin.questions.question-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start : pop up form to add new country  -->
        <div class="modal fade" id="add_question" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                        <textarea type="text" name="question" class="form-control"></textarea>
                                        <span class="text-danger" id="question_error"></span>
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

                                <div class="col-md-6">
                                    <div class="optional box">
                                        <a class="btn btn-primary btn-sm addMoreBtn" onclick="add_options()"><i
                                                class="fa fa-plus fs-5"></i> Add Option</a>
                                    </div>
                                    <div class="multiple box">
                                        <a class="btn btn-primary btn-sm addMoreBtn" onclick="add_options()"><i
                                                class="fa fa-plus fs-5"></i> Add Option</a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="text box p-0 mt-0">
                                        <div class="col-12 col-sm-12">
                                            <div class="mb-3" id="question-div">
                                                <label class="mb-2 text-dark">Answer</label>
                                                <textarea xtype="text" name="answer" class="form-control min-h-100px" id="answer"></textarea>
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

        <!-- Start : pop up form to edit question  -->
        <div class="modal fade" id="edit_question" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
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
                                        <textarea type="text" name="question" class="form-control" id="question"></textarea>
                                        <span class="text-danger" id="question-error"></span>
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
                                <div class="col-md-6">

                                    <div class="optional box">
                                        <a class="btn btn-primary btn-sm addMoreBtn" onclick="add_options('1')"><i
                                                class="fa fa-plus fs-5"></i> Add Option</a>
                                    </div>
                                    <div class="multiple box">
                                        <a class="btn btn-primary btn-sm addMoreBtn" onclick="add_options('1')"><i
                                                class="fa fa-plus fs-5"></i> Add Option</a>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="text box p-0 mt-0">
                                        <div class="col-12 col-sm-12">
                                            <div class="mb-3" id="question-div">
                                                <label class="mb-2 text-dark">Answer</label>
                                                <textarea xtype="text" name="answer" class="form-control min-h-100px" id="answer"></textarea>
                                                <span class="text-danger" id="answer-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div>
                                    <div class="row addMoreOptionsEdit"></div>
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

            $(document).ready(function() {
    $('#doctors, #specialty, #answerType').on('change', function() {
        search_question();
    });
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
                    $.ajax({
                        url: "{{ route('admin.add.questions') }}",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            swal.fire("Done!", response.message, "success");
                            $('#add_question').modal('hide');
                            $('#addQuestionForm')[0].reset();
                            $('#question_list').replaceWith(response.data);
                            location.reload(); // Reload the page
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
                    $.ajax({
                        url: "{{ route('admin.questions.update') }}",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            swal.fire("Done!", response.message, "success");
                            $('#edit_question').modal('hide');
                            $('#question_list').replaceWith(response.data);
                            location.reload(); // Reload the page

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

        // Global counter for dynamically adding options
        var counter = 0;


        function edit_question(doctorQuestionDetails) {
            var doctorQuestionDetails = JSON.parse(doctorQuestionDetails);
            console.log(doctorQuestionDetails.specialty_id);
            $('.addMoreOptionsEdit').empty();
            $('#id').val(doctorQuestionDetails.id);
            $('#doctor').val(doctorQuestionDetails.doctor_id);
            $('#specialty').val(doctorQuestionDetails.specialty_id);
            $('.answer_type').val(doctorQuestionDetails.answer_type);
            $('#question').val(doctorQuestionDetails.question);

            // Reset counter
            counter = 0;


            // if ($('.answer_type').val() != 'text') {
            //     doctorQuestionDetails.options.forEach(function(option, index) {
            //         var options_html =
            //             '<div class="col-md-6 option-details"><div class="row panel panel-body"><div class="col-md-10 form-group"><label for="">Option ' +
            //             (index + 1) +
            //             '</label><input class="form-control" type="text" name="options[' +
            //             index +
            //             '][value]" value="' + option.options + '" ><span class="text-danger" id="options_' + index +
            //             '_value_error"></span><div><input type="hidden" name="options[' + index +
            //             '][option_id]" value="' + option.id +
            //             '"></div></div><div class="col-md-2 form-group mt-4"><a onclick="remove_options(this, ' +
            //             option.id +
            //             ')" class="btn btn-danger btn-sm float-right"> <i class="fa fa-minus"></i></a></div></div></div>';
            //         $('.addMoreOptionsEdit').append(options_html);
            //         counter = index + 1; // Update counter to the latest index
            //     });
            //     $(".optional").show();
            // }
            if ($('.answer_type').val() != 'text') {
        doctorQuestionDetails.options.forEach(function(option, index) {
            var options_html =
                '<div class="col-md-6 option-details"><div class="row panel panel-body"><div class="col-md-10 form-group"><label for="">Option ' +
                (index + 1) +
                '</label><input class="form-control" type="text" name="options[' +
                index +
                '][value]" value="' + option.options + '" ><span class="text-danger" id="options_' + index +
                '_value_error"></span><div><input type="hidden" name="options[' + index +
                '][option_id]" value="' + option.id + '"></div></div><div class="col-md-2 form-group mt-4"><a onclick="remove_options(this, ' + option.id + ')" class="btn btn-danger btn-sm float-right"> <i class="fa fa-minus"></i></a></div></div></div>';
            $('.addMoreOptionsEdit').append(options_html);
            counter = index + 1; // Update counter to the latest index
        });
        $(".optional").show();
    } else {
        var text_html = 
            '<div class="col-12 col-sm-12">' +
                '<div class="mb-3" id="question-div">' +
                    '<label class="mb-2">Question</label>' +
                    '<textarea type="text" name="question" class="form-control">' + doctorQuestionDetails.question + '</textarea>' +
                    '<span class="text-danger" id="question_error"></span>' +
                '</div>' +
            '</div>';
        $('.addMoreOptionsEdit').append(text_html);
        $(".optional").hide(); // Hide options section if the answer type is 'text'
    }


        }


        // Function to handle adding options dynamically
        function add_options(id) {
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
            console.log(id);

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
                                reindex_options();
                            },
                            error: function(xhr, ajaxOptions, thrownError) {
                                Swal.fire("Error deleting!", "Please try again", "error");
                            }
                        });
                    }
                });
            } else {
                $(this_ele).closest('.option-details').remove();
                reindex_options();
            }
        }

        function reindex_options() {
            $('.option-details').each(function(index, element) {
                console.log(index);
                var newIndex = index + 1; // Calculate the new index starting from 1

                // Update label
                $(element).find('label').text('Answers ' + newIndex);

                // Update input names
                $(element).find('input[type="text"]').attr('name', 'options[' + index + '][value]');
                $(element).find('span').attr('id', 'options_' + index + '_value_error');
                $(element).find('input[type="hidden"]').attr('name', 'options[' + index + '][option_id]');
            });

            // Update counter to the number of options
            counter = $('.option-details').length;

            // Enable or disable "Add More" button based on the number of options
            if (counter >= 4) {
                $('.addMoreBtn').addClass('disabled');
            } else {
                $('.addMoreBtn').removeClass('disabled');
            }
        }
        // // Function to handle removing options dynamically
        // function remove_options(this_ele) {
        //     $(this_ele).closest('.option-details').remove();
        //     counter -= 1;
        //     if (counter < 4) {
        //         $('.addMoreBtn').removeClass('disabled');
        //     }
        // }

        // $('input[name="doctor"] ,input[name="specialty"],input[name="answerType"]').on('change', function() {
        //     search_question();
        // });

        // function search_question() {
        //     let userId     = jQuery('#doctor').val();
        //     let answerType = jQuery('#answerType').val();
        //     let specialty  = jQuery('#specialty').val();
        //     $.ajax({
        //         url: "<?= route('doctor.appointment-filter') ?>",
        //         type: 'get',
        //         data: {
             
        //             doctorId: userId,
        //             answerType: answerType,
        //             specialty: specialty,
        //             _token: '{{ csrf_token() }}'
        //         },
        //         success: function(response) {
        //             jQuery('#question_list').replaceWith(response.data);
        //             jQuery('#question_list').hide().delay(200).fadeIn();
        //         },
        //         error: function(xhr, status, error) {
        //             // Handle any errors
        //             console.error(error);
        //         }
        //     });
        // }

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
