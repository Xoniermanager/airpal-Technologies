<!DOCTYPE html>
<html lang="zxx">

<head>
    @include('include.head')
</head>


@include('doctor.include.header')

<div class="breadcrumb-bar-two">
    <div class="container">
        <div class="row align-items-center inner-banner">
            <div class="col-md-12 col-12 text-center">
                <h2 class="breadcrumb-title">Appointment config</h2>
                <nav aria-label="breadcrumb" class="page-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{ route('doctor.doctor-dashboard.index') }}">Home</a></li>
                        <li class="breadcrumb-item" aria-current="page">Appointments config</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
</div>


<div class="content">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-xl-3 theiaStickySidebar">

                @include('doctor.include.sidebar')
            </div>
            <div class="col-lg-8 col-xl-9">           
    <div class="main-wrapper">
        <div class="page-wrapper">
            <div class="content container-fluid">
                <div class="page-header">
                  
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card">
                                <div class="card-header">
                                    <div class="row">
                                        
                                        {{-- <div class="col-sm-3 col">
                                            <label value="">Filter by Doctor</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">All</option>
                                                <option value="">Jane Smith	</option>
                                                <option value="">John Doe	</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 col">
                                            <label value="">Filter by Doctor</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">All</option>
                                                <option value="">Dentist</option>
                                                <option value="">Cardiologist</option>
                                            </select>
                                        </div>
                                        <div class="col-sm-3 col">
                                            <label value="">Filter by Doctor</label>
                                            <select name="" id="" class="form-control">
                                                <option value="">All</option>
                                                <option value="">Text</option>
                                                <option value="">Optional</option>
                                                <option value="">Multiple</option>
                                            </select>
                                        </div> --}}
                                            <div class="col-sm-12 col float-end">
                                            <a href="#add_question" data-bs-toggle="modal" class="btn btn-primary float-end mt-2">Add</a>
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
                                                @if(auth()->check() && auth()->user()->isDoctor())
                                                    <option value="{{ auth()->user()->id }}">{{ auth()->user()->fullName }}</option>
                                                @else
                                                    <option>No doctor found</option>
                                                @endif
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
                                            <div class="mb-3" id="question-div" >
                                                <label class="mb-2 text-dark">Answer</label>
                                                <textarea xtype="text" name="answer" class="form-control min-h-100px" id="answer"></textarea>
                                                <span class="text-danger" id="answer-error"></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                
                                <div>        
                                <div class="row addMoreOptions">
                                </div></div>
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
                                            <select class="form-control select" name="doctor">
                                                @if(auth()->check() && auth()->user()->isDoctor())
                                                    <option value="{{ auth()->user()->id }}">{{ auth()->user()->fullName }}</option>
                                                @else
                                                    <option>No doctor found</option>
                                                @endif
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
{{-- @endsection
@section('javascript') --}}


    <script>
        // Clear all selected options if question type gets changed
    // Global counter for dynamically adding options
    var counter = 0;

        $(document).ready(function() {
            $(".answer_type").change(function() 
            {
                /*
                Removing all selected options on change of question type.
                Also reset the counter to 0 and 
                Remove disabled class to allow add new options
                */
                jQuery('.addMoreOptions').html('');
                counter = 0;
                $('.addMoreBtn').removeClass('disabled');
                console.log('counter : ' + counter);
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
                        // doctor.delete-questions
                        // admin.delete-questions
                        url: "{{ route('doctor.delete-questions') }}",
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

 function edit_question(question_id) 
 {
    jQuery.ajax({
        type: 'GET',
        url: '{{ route('doctor.get.question.html') }}',
        data:{
            'question_id':question_id,
            '_token': '{{ csrf_token() }}',
        },
        dataType:'json',
        success: function(response){

        },
        error: function(error_data){

        }
    });
    // var doctorQuestionDetails = JSON.parse(doctorQuestionDetails);
    // $('.addMoreOptionsEdit').empty();
    // $('#id').val(doctorQuestionDetails.id);
    // $('#doctor').val(doctorQuestionDetails.doctor_id);
    // $('#specialty').val(doctorQuestionDetails.specialty_id);
    // $('.answer_type').val(doctorQuestionDetails.answer_type);
    // $('#question').val(doctorQuestionDetails.question);


    // if ($('.answer_type').val() != 'text') {
    //     doctorQuestionDetails.options.forEach(function(option, index) {
    //         var options_html =
    //             '<div class="col-md-6 option-details"><div class="row panel panel-body"><div class="col-md-10 form-group"><label for="">Option ' +
    //             (index + 1) +
    //             '</label><input class="form-control" type="text" name="options[' +
    //             index +
    //             '][value]" value="' + option.options + '" ><span class="text-danger" id="options_' + index +
    //             '_value_error"></span><div><input type="hidden" name="options[' + index +
    //             '][option_id]" value="' + option.id + '"></div></div><div class="col-md-2 form-group mt-4"><a onclick="remove_options(this, ' + option.id + ')" class="btn btn-danger btn-sm float-right"> <i class="fa fa-minus"></i></a></div></div></div>';
    //         $('.addMoreOptionsEdit').append(options_html);
    //         counter = index + 1; // Update counter to the latest index
    //     });
    //     $(".optional").show();
    // } 
    // else 
    // {
    //     var text_html = 
    //         '<div class="col-12 col-sm-12">' +
    //             '<div class="mb-3" id="question-div">' +
    //                 '<label class="mb-2">Question</label>' +
    //                 '<textarea type="text" name="question" class="form-control">' + doctorQuestionDetails.question + '</textarea>' +
    //                 '<span class="text-danger" id="question_error"></span>' +
    //             '</div>' +
    //         '</div>';
    //     $('.addMoreOptionsEdit').append(text_html);
    //     $(".optional").hide(); // Hide options section if the answer type is 'text'
    // }

    $('#edit_question').addClass('show').css('display', 'block').attr('aria-hidden', 'false');
}




// Function to handle adding options dynamically
function add_options(id) {
    console.log('Add counter : ' + counter);
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

    counter = $('.option-details').length;
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
    </script>
{{-- @endsection --}}




<style>
    .box {
        color: #fff;
        padding: 20px;
        display: none;
        margin-top: 20px;
    }
</style>
