<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="Xonier technologies">
    <meta property="og:url" content="">
    <meta property="og:type" content="website">
    <meta property="og:title" content="">
    <meta property="og:description" content="">
    <meta property="og:image" content="../assets/img/logo.png">
    <meta property="twitter:domain" content="">
    <meta property="twitter:url" content="">
    <meta name="twitter:title" content="">
    <meta name="twitter:description" content="">
    <meta name="twitter:image" content="../assets/img/logo.png">
    <title>Telemedicine Application</title>
    <link href="../assets/img/favicon.png" rel="icon">

    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">

    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/fontawesome.min.css">
    <link rel="stylesheet" href="../assets/plugins/fontawesome/css/all.min.css">

    <link rel="stylesheet" href="../assets/plugins/select2/css/select2.min.css">

    <link rel="stylesheet" href="../assets/css/feather.css">

    <link rel="stylesheet" href="../assets/css/custom.css">
    <script src="{{ asset('/assets/js/jquery-3.7.1.min.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-ui.js') }}"></script>
    <script src="{{ asset('admin/assets/js/jquery-ui.css') }}"></script>
    <script src="{{ asset('admin/assets/jquery-validation/dist/jquery.validate.min.js') }}"></script>
</head>

<body class="bg-gray">
    <div class="main-wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 m-auto">

                        <form action="#" id="appoimentQueriesForm" class="disease_details">
                            @csrf
                            <div class="setting-title">
                                <h5>Answer this about your disease.</h5>
                            </div>
                            <input type="hidden" value="{{ $booking_id }}" name="booking_id">
                            <div class="setting-card">
                                <div class="row">
                                    @forelse ($doctorQuestions->doctorQuestions as $question)
                                        <div class="col-lg-12">
                                            <div class="form-wrap">
                                                <label class="col-form-label">
                                                    <span class="text-danger">*</span> {{ $question->questions }}
                                                </label>
                                                @if ($question->answer_type == 'optional')
                                                    <div class="d-flex">
                                                        @foreach ($question->options as $option)
                                                            <div class="form-check mr-3" style="margin-right: 20px;">
                                                                <input class="form-check-input" type="radio"
                                                                    name="question_{{ $question->id }}"
                                                                    id="option_{{ $question->id }}_{{ $loop->index }}"
                                                                    value="{{ $option->id }}"
                                                                    {{ old('question_' . $question->id) == $option->id ? 'checked' : '' }}>
                                                                <label class="form-check-label"
                                                                    for="option_{{ $question->id }}_{{ $loop->index }}">
                                                                    {{ $option->options }}
                                                                </label>
                                                            </div>
                                                        @endforeach
                                                    </div>
                                                    <span class="text-danger"
                                                        id="question_{{ $question->id }}_error"></span>
                                                @elseif($question->answer_type == 'multiple')
                                                    @foreach ($question->options as $option)
                                                        <div class="form-check">
                                                            <input class="form-check-input" type="checkbox"
                                                                name="question_{{ $question->id }}[]"
                                                                id="option_{{ $question->id }}_{{ $loop->index }}"
                                                                value="{{ $option->id }}"
                                                                {{ in_array($option->id, old('question_' . $question->id, [])) ? 'checked' : '' }}>
                                                            <label class="form-check-label"
                                                                for="option_{{ $question->id }}_{{ $loop->index }}">
                                                                {{ $option->options }}
                                                            </label>
                                                        </div>
                                                    @endforeach
                                                    <span class="text-danger"
                                                        id="question_{{ $question->id }}_error"></span>
                                                @elseif($question->answer_type == 'text')
                                                    <input type="text" class="form-control"
                                                        name="question_{{ $question->id }}"
                                                        value="{{ old('question_' . $question->id) }}">

                                                    <span class="text-danger"
                                                        id="question_{{ $question->id }}_error"></span>
                                                @endif
                                            </div>
                                        </div>
                                    @empty
                                        <div class="col-lg-12">
                                            <div class="form-wrap">
                                                <p>Not Found</p>
                                            </div>
                                        </div>
                                    @endforelse
                                </div>
                            </div>
                            <div class="modal-btn text-end">
                                <a href="#" class="btn btn-gray">Cancel</a>
                                <button type="submit" class="btn btn-primary prime-btn">Save Changes</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@section('javascript')
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            jQuery("#appoimentQueriesForm").validate({

                rules: {

                    // TODO apply it later
                },
                messages: {

                    email: "Please enter a valid email address",
                    password: {
                        required: "Please enter your password",
                        minlength: "Password must be at least 8 characters long",
                        maxlength: "Password must be no more than 20 characters long"
                    },
                },
                submitHandler: function(form) {
                    var formData = new FormData(form);
                    $.ajax({
                        url: "<?= route('doctor.appointment.query') ?>",
                        type: 'post',
                        data: formData,
                        dataType: 'json',
                        processData: false,
                        contentType: false,
                        success: function(response) {
                            swal.fire("Done!", 'Completed Successfully', "success");
                            if (response.success == true) {
                                setTimeout(function() {
                                    window.location.href =
                                        "<?= route('home.index') ?>";
                                }, 2000);

                            }
                        },
                        error: function(error_messages) {
                            var errors = error_messages.responseJSON;
                            $.each(errors.errors, function(key, messages) {
                                $('#' + key + '_error').html(messages.join('<br>'));
                            });

                        }
                    });
                }
            });
        });
    </script>

    <style>
        form.disease_details {
            box-shadow: rgba(149, 157, 165, 0.2) 0px 8px 24px;
            padding: 30px;
            border-radius: 20px;
            background: #fff;
            border-top: 5px solid #004CD4
        }

        .bg-gray {
            background: #eee;
        }
    </style>




    <script src="../assets/js/bootstrap.bundle.min.js" type="279b513fa2a9bfd9bc4db18a-text/javascript"></script>

    <script src="../assets/plugins/theia-sticky-sidebar/ResizeSensor.js"
        type="279b513fa2a9bfd9bc4db18a-text/javascript"></script>
    <script src="../assets/plugins/theia-sticky-sidebar/theia-sticky-sidebar.js"
        type="279b513fa2a9bfd9bc4db18a-text/javascript"></script>

    <script src="../assets/plugins/select2/js/select2.min.js" type="279b513fa2a9bfd9bc4db18a-text/javascript"></script>

    <script src="../assets/plugins/apex/apexcharts.min.js" type="279b513fa2a9bfd9bc4db18a-text/javascript"></script>
    <script src="../assets/plugins/apex/chart-data.js" type="279b513fa2a9bfd9bc4db18a-text/javascript"></script>

    <script src="../assets/js/circle-progress.min.js" type="279b513fa2a9bfd9bc4db18a-text/javascript"></script>

    <script src="../assets/js/script.js" type="279b513fa2a9bfd9bc4db18a-text/javascript"></script>


    <script src="../assets/js/bootstrap.bundle.min.js" type="e42e19e5bff8e0a5fb42d697-text/javascript"></script>
    <script src="../cdn-cgi/scripts/7d0fa10a/cloudflare-static/rocket-loader.min.js"
        data-cf-settings="e42e19e5bff8e0a5fb42d697-|49" defer></script>

</body>

</html>
