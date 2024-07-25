@extends('layouts.admin.main')
@section('content')
 

        <div class="page-wrapper">
            <div class="content container-fluid">

                <div class="page-header">
                    <div class="row">
                        <div class="col-sm-12">
                            <h3 class="page-title">Faqs Settings</h3>
                            {{-- <ul class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard.index') }}">Dashboard</a></li>
                                <li class="breadcrumb-item"><a href="javascript:(0)">Settings</a></li>
                                <li class="breadcrumb-item active">Faqs Settings</li>
                            </ul> --}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">

                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Add Faqs</h4>
                            </div>
                            <div class="card-body">
                                <form action="#" id="addFaqs">
                                    <div class="mb-3">
                                        <label class="mb-2">Name</label>
                                        <input type="text" class="form-control">
                                    </div>

                                    <div class="mb-3">
                                        <label class="mb-2">description</label>
                                        <textarea class="form-control" rows="5"></textarea>
                                    </div>

                                    <div class="modal-btn text-end">
                                        <button type="submit" class="btn btn-primary prime-btn">Save
                                        </button>
                                    </div>
                                    
                                </form>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    @include('admin.include.footer')

{{-- 
    <script>

        $(document).ready(function() {
                jQuery("#addFaqs").validate({
                rules: {

                    name: 'required',
                    description:'required'
                },
                messages: {

                    name: "Please enter faq name",
                    description: "Please enter your faq description",

      
                },
                submitHandler: function(form) {
                    var formData  = new FormData(form);
                    $.ajax({
                        url: "<?= route('admin.add.faqs') ?>",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false, 
                        success: function(response) {
                            if (response.success == true) {
                       
                                swal.fire("Done!", response.message, "success");  // todo use swal fire
                                // window.location.href  = "http://127.0.0.1:8000/doctors";
                            }
                        },
                        error: function(error_messages) {
                            var errors = error_messages.responseJSON;
                            $.each(errors.errors, function(key, value) {
                                console.log(value);
                                $('#' + key + '_error').html(value);
                            })

                        }
                    });
                }
            });
}); --}}

    </script>

    <style>
        .error {
    color: red;
}
    </style>
        @endsection