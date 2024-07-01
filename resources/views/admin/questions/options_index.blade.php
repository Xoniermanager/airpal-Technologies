@extends('layouts.admin.main')
@section('content')
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-7 col-auto">
                            <h3 class="page-title">question_options</h3>
                            <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a>
                                </li>
                                <li class="breadcrumb-item active">question_options</li>
                            </ul>
                        </div>
                        <div class="col-sm-5 col">
                            <a href="#add_question_options" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                @include('admin.questions.options-list')
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Start : pop up form to add new country  -->
        <div class="modal fade" id="add_question_options" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Add Question Options</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="addOptionsForm" enctype="multipart/form-data">
                            @csrf
                            <div class="row">
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3">
                                        <label class="mb-2">Question
                                         
                                        </label>
                                        <div >
                                            <select class="form-control select" name="question">
                                            <option value="">Select Question</option>
                                            @forelse ($allQuestions as  $question)
                                            <option value="{{ $question->id }}">   {{ $question->questions}}</option>
                                            @empty
                                            <option>Not found</option>  
                                            @endforelse
                                            </select>
                                            </div>
                                        <span class="text-danger" id="question-error"></span>
                                    </div>
                                </div>

                                </div>
 

                                <div class="col-12 col-sm-12">
                                    <div class="mb-3" id="question_options-div">
                                        <label class="mb-2">Question's options</label>
                                        <input type="text" name="options" class="form-control">
                                        <span class="text-danger" id="question_options-error"></span>
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

        <!-- Start : pop up form to edit question_options  -->
        <div class="modal fade" id="edit_question_option" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit question_options</h5>
                        <button type="button" class="btn-close close-form-add" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="editOptionsForm" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-12 col-sm-12">
                                        <div class="mb-3">
                                            <label class="mb-2">Question
                                             
                                            </label>
                                            <div >
                                                <select class="form-control select" name="question" id="question">
                                                <option value="">Select Question</option>
                                                @forelse ($allQuestions as  $question)
                                                <option value="{{ $question->id }}">{{ $question->questions}}</option>
                                                @empty
                                                <option>Not found</option>  
                                                @endforelse
                                                </select>
                                                </div>
                                            <span class="text-danger" id="question-error"></span>
                                        </div>
                                    </div>
    
                                    </div>
                                    <input type="hidden" id="id" name="id" value="">
    
                                    <div class="col-12 col-sm-12">
                                        <div class="mb-3" id="question_options-div">
                                            <label class="mb-2">Question's options</label>
                                            <input type="text" name="options" class="form-control" id="options">
                                            <span class="text-danger" id="question_options-error"></span>
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
        <div class="modal fade" id="delete-question-options" aria-hidden="true" role="dialog">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-body">
                        <div class="form-content p-2">
                            <h4 class="modal-title">Delete</h4>
                            <p class="mb-4">Are you sure want to delete?</p>
                            <input type="hidden" id="delete-question-options-id" name="question_options_id">
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
            jQuery("#addOptionsForm").validate({
                rules: {
                    question: "required",
                    options : "required",
                },
                messages: {
                    question: "Please select quesiton!",
                    options: "Please enter options!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "<?= route('admin.add.questions-options') ?>",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            swal.fire("Done!", response.message, "success");
                            jQuery('#add_question_options').modal('hide');
                            $('#addOptionsForm')[0].reset();
                            jQuery('#question_options_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#add_question_options [name=' + error_key + ']')
                                    .after(
                                        '<span id="' + random_id +
                                        '_error" class="text text-danger '+ error_key +'_error">' + errors[
                                            error_key] + '</span>');
                                remove_error_div(random_id);
                            }
                        }
                    });
                }
            });

            /* Remove server erorr messge div */
            function remove_error_div(error_ele_id) 
            {
                setTimeout(function() {
                    jQuery("#" + error_ele_id + "_error").remove();
                }, 5000);
            }


            jQuery("#editOptionsForm").validate({
                rules: {
                    question: "required",
                    options : "required",
                },
                messages: {
                    question: "Please select quesiton!",
                    options: "Please enter options!",
                },
                submitHandler: function(form) {
                    var formData = $(form).serialize();
                    $.ajax({
                        url: "{{ route('admin.questions-options.update') }}",
                        type: 'post',
                        data: formData,
                        success: function(response) {
                            swal.fire("Done!", response.message, "success");
                            jQuery('#edit_question_option').modal('hide');
                            jQuery('#question_options_list').replaceWith(response.data);
                        },
                        error: function(error_messages) {
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                $(document).find('#edit_question_option [name=' + error_key + ']').after(
                                    '<span id="' + random_id +
                                    '_error" class="text text-danger ' + error_key + '_error">' + errors[
                                        error_key] + '</span>');
                                    remove_error_div(random_id);
                            }
                        }
                    });
                }
            });

            $(document).on('click', '.delete-question-options', function() {
                const id = $(this).attr('data-id');
                $("#delete-question-options-id").val(id);
            });


            $(document).on('click', '.confirm-delete', function(e) {
                    e.preventDefault();
                    const id = $("#delete-question-options-id").val();
                    if (id != '') {
                        $.ajax({
                            method:'post',
                            type: 'delete',
                            data : {'_token':'{{ csrf_token() }}','id':id},
                            url: "{{ route('admin.delete-questions-options') }}",
                            success: function(response) {
                                swal.fire("Done!", response.message, "success");
                                jQuery('#delete-question-options').modal('hide');
                                jQuery('#question_options_list').replaceWith(response.data);
                            }
                        });
                    }
                });


            $(document).on('click', '.close-form-add', function() {
                $('#addCountryForm')[0].reset();
            });

        }); // ready function end

        function edit_question_option(doctorquestion_optionsDetails) {
          var doctorquestion_optionsDetails = JSON.parse(doctorquestion_optionsDetails);
            $('#id').val(doctorquestion_optionsDetails.id);
            $('#question').val(doctorquestion_optionsDetails.question_id);
            $('#options').val(doctorquestion_optionsDetails.options);
    }


    </script>
@endsection

