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
                                        <div >
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
                                        <div >
                                            <select class="form-control select"  name="specialty">
                                                <option value="">Select Specialty</option>
                                                @forelse ($specialties as $specialty)
                                                <option value="{{$specialty->id}}">{{$specialty->name}}</option>  
                                                @empty
                                                <option>Not found</option>  
                                                @endforelse
                            
                                            </select>
                                            </div>
                                        <span class="text-danger" id="specialty-error"></span>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3" id="answer-type-div">
                                        <label class="mb-2">Answer Type</label>
                                        <select class="form-control select" name="answer_type">
                                            <option value="">Select Answer Type</option>
                                            <option>text</option>  
                                            <option>optional</option> 
                                            <option>multiple</option>  
                                        </select>
                                        <span class="text-danger" id="anser-type-error"></span>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12">
                                    <div class="mb-3" id="question-div">
                                        <label class="mb-2">Question</label>
                                        <textarea type="text" name="questions" class="form-control"></textarea>
                                        <span class="text-danger" id="questions-error"></span>
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
                                        <div >
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
                                        <div >
                                            <select class="form-control select"  name="specialty" id="specialty">
                                                <option value="">Select Specialty</option>
                                                @forelse ($specialties as $specialty)
                                                <option value="{{$specialty->id}}">{{$specialty->name}}</option>  
                                                @empty
                                                <option>Not found</option>  
                                                @endforelse
                            
                                            </select>
                                            </div>
                                        <span class="text-danger" id="specialty-error"></span>

                                    </div>
                                </div>
                                <div class="col-12 col-sm-12">
                                    <div class="mb-3" id="answer-type-div">
                                        <label class="mb-2">Answer Type</label>
                                        <select class="form-control select" name="answer_type" id="answer_type">
                                            <option value="">Select Answer Type</option>
                                            <option>text</option>  
                                            <option>optional</option> 
                                            <option>multiple</option>  
                                        </select>
                                        <span class="text-danger" id="anser-type-error"></span>
                                    </div>
                                </div>

                                <div class="col-12 col-sm-12">
                                    <div class="mb-3" id="question-div">
                                        <label class="mb-2">Question</label>
                                        <textarea type="text" name="questions" class="form-control" id="questions"></textarea>
                                        <span class="text-danger" id="questions-error"></span>
                                    </div>
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
            jQuery("#addQuestionForm").validate({
                rules: {
                    doctor   : "required",
                    specialty: "required",
                    answer_type : "required",
                    questions    : "required",
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
                            let errors = JSON.parse(error_messages.responseText).errors;
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                jQuery(document).find('#add_question [name=' + error_key + ']')
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


            jQuery("#editQuestionForm").validate({
                rules: {
                    doctor   : "required",
                    specialty: "required",
                    answer_type : "required",
                    questions    : "required",
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
                            let randon_number = Math.floor((Math.random() * 100)+1);
                            for (var error_key in errors) {
                                random_id = error_key + '_' + randon_number
                                jQuery('.' + error_key + '_error').remove();
                                $(document).find('#edit_question [name=' + error_key + ']').after(
                                    '<span id="' + random_id +
                                    '_error" class="text text-danger ' + error_key + '_error">' + errors[
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
                            method:'post',
                            type: 'delete',
                            data : {'_token':'{{ csrf_token() }}','id':id},
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
                $('#addCountryForm')[0].reset();
            });

        }); // ready function end

        function edit_question(doctorQuestionDetails) {
          var doctorQuestionDetails = JSON.parse(doctorQuestionDetails);
          console.log(doctorQuestionDetails);
            $('#id').val(doctorQuestionDetails.id);
            $('#doctor').val(doctorQuestionDetails.doctor_id);
            $('#specialty').val(doctorQuestionDetails.specialty_id);
            $('#answer_type').val(doctorQuestionDetails.answer_type);
            $('#questions').val(doctorQuestionDetails.questions);
    }


    </script>
@endsection

