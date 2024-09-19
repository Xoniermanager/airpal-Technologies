@extends('layouts.doctor.main')
@section('content')

<div class="container">
    
    <form id="save_doctor_paypal_account_details" class="row">
        @csrf
        <!-- First Column (Left) -->
        <div class="col-md-6">
            <!-- PAYPAL_LIVE_CLIENT_ID -->
            <div class="form-group">
                <label for="PAYPAL_LIVE_CLIENT_ID">PayPal Live Client ID:</label>
                <input value="{{ $paypalConfigDetails->PAYPAL_LIVE_CLIENT_ID ?? '' }}" type="text" class="form-control" name="PAYPAL_LIVE_CLIENT_ID">
            </div>
            
            <!-- PAYPAL_LIVE_CLIENT_SECRET -->
            <div class="form-group">
                <label for="PAYPAL_LIVE_CLIENT_SECRET">PayPal Live Client Secret:</label>
                <input value="{{ $paypalConfigDetails->PAYPAL_LIVE_CLIENT_SECRET ?? '' }}" type="text" class="form-control" name="PAYPAL_LIVE_CLIENT_SECRET">
            </div>
        </div>
    
        <!-- Second Column (Right) -->
        <div class="col-md-6">
            <!-- PAYPAL_LIVE_APP_ID -->
            <div class="form-group">
                <label for="PAYPAL_LIVE_APP_ID">PayPal Live App ID:</label>
                <input value="{{ $paypalConfigDetails->PAYPAL_LIVE_APP_ID ?? '' }}" type="text" class="form-control" name="PAYPAL_LIVE_APP_ID">
            </div>
        </div>
    
        <!-- Submit Button (Full Width) -->
        <div class="col-md-12">
            <button class="btn btn-primary btn-block">Save</button>
        </div>
    </form>
    
</div>
@endsection


@section('javascript')

<script>
$(document).ready(function() {
    // jQuery Validation for the form
    jQuery("#save_doctor_paypal_account_details").validate({

        rules: {
            PAYPAL_LIVE_CLIENT_ID: "required",
            PAYPAL_LIVE_CLIENT_SECRET: "required",
            PAYPAL_LIVE_APP_ID: "required",
            PAYPAL_PAYMENT_ACTION: "required",
            },
            messages: {
                PAYPAL_LIVE_CLIENT_ID: "Please enter the PAYPAL_LIVE_CLIENT_ID!",
                PAYPAL_LIVE_APP_ID: "Please enter the PAYPAL_LIVE_APP_ID!",
                PAYPAL_LIVE_CLIENT_SECRET	: "Please enter the PAYPAL_LIVE_CLIENT_SECRET	!",
                PAYPAL_PAYMENT_ACTION: "Please enter the PAYPAL_PAYMENT_ACTION!",
            },
        submitHandler: function(form) {
            var formData = new FormData(form);

            $.ajax({
                url: "{{ route('add.doctor.paypal.account.detail') }}",
                type: 'post',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    // $('#save_doctor_paypal_account_details')[0].reset();
                    Swal.fire({
                        icon: 'success',
                        title: 'Paypal config added successfully!',
                        showConfirmButton: false,
                        timer: 1500
                    });
                },
                error: function(error_messages) {
                    let errors = JSON.parse(error_messages.responseText).errors;
                    let random_number = Math.floor((Math.random() * 100) + 1);
                    // Clear previous errors
                    jQuery('.text-danger').remove();

                    // Loop through the errors and display them below respective fields
                    for (var error_key in errors) {
                        random_id = error_key + '_' + random_number;
                        jQuery('#addpartnersForm [name=' + error_key + ']')
                            .after(
                                '<span id="' + random_id +
                                '_error" class="text-danger ' + error_key + '_error">' + errors[
                                error_key] + '</span>');
                        remove_error_div(random_id); // Function to auto-remove error after a delay
                    }
                }
            });
        }
    });
});

</script>


@endsection

<style>#save_doctor_paypal_account_details {
    background-color: #fff; /* Background color */
    padding: 20px; /* Padding inside the form */
    border-radius: 10px; /* Rounded corners */
    box-shadow: 0px 4px 12px rgba(0, 0, 0, 0.1); /* Shadow effect */
    max-width: 800px; /* Optional: Set max width */
    margin: 0 auto; /* Center the form */
    height: 100%; /* Ensure form fills height */
}

@media (min-width: 768px) {
    #save_doctor_paypal_account_details {
        height: 400px; /* Fixed height for medium screens and larger */
    }
}

</style>