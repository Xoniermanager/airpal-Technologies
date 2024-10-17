/*
=====================================================================
                Start: Chat Scripts
=====================================================================
*/
jQuery('document').ready(function () {
    jQuery('.typing').hide();
    jQuery('.remove-typing').css('display', 'none');
    // console.log("test : " + jQuery('.remove-typing').html());
});
// Search doctors/patients from doctor panel
jQuery('#search_chat_users').on('keyup', function () {
    let search_text = jQuery(this).val().trim();
    refresh_chat_list(search_text);
});


// Setting selected chat user as receiver
var current_chat_user = 0;
function set_current_chat_user(selected_user) {
    current_chat_user = selected_user;
}

function check_online_status(online_div_class)
{
   let online = jQuery('.'+online_div_class).hasClass('avatar-online');
   if(online)
    {
        jQuery('.chat-header .avatar').addClass('avatar-online');
        jQuery('.last-seen').text('Online');
    }
    else
    {
        jQuery('.last-seen').text('Offline');
    }
}

// Loading selected chat history
function load_chat_history(receiver_user_id,read_status=0)
{
    set_current_chat_user(receiver_user_id);
    jQuery('#receiver_id').val(receiver_user_id);
    jQuery('.user-list-item').removeClass('active');
    jQuery('#chat-user-' + receiver_user_id).addClass('active');
    // Setting up csrf token for all ajax requests header
    jQuery.ajax({
        type: 'POST',
        url: site_base_url + "/chat-history",
        data:{
            '_token':jQuery('meta[name="csrf-token"]').attr('content'),
            'receiver_user_id':receiver_user_id,
            'read_status':read_status
        },
        dataType: 'json',
        success: function (response) {
            if (response.status) {
                jQuery('#chat-history').html(response.data);
                $('.slimscroll-chat-body').scrollTop(1000000);
            }
        },
        error: function (error_response) {
            console.log(error_response);
        },
        complete: function () {
            setTimeout(function () {
                jQuery('#receiver_id').val(receiver_user_id);
                check_online_status('online-'+receiver_user_id);
                // remove message unread counter from user list
                if(read_status)
                    {
                        jQuery('.unread-counter-'+receiver_user_id).remove();
                    }
            },1200);
        }
    });
}

function update_user_online_status(users)
{
    Object.keys(users).forEach(key  =>  {
        jQuery('.online-'+users[key]['id']).addClass('avatar-online');
    });
    // console.log(users);
}

function make_user_offline(user)
{
    jQuery('.online-'+user['id']).removeClass('avatar-online');
}
/*
=====================================================================
                End: Chat Scripts
=====================================================================
*/

$(document).ready(function () {
    var medicine_counter = parseInt($('#medicine_count').val()) + 1;
    var advice_counter = parseInt($('#advice_count').val()) + 1;
    var test_counter = parseInt($('#test_count').val()) + 1;

    // Function to initialize or reinitialize form validation
    function validatefunction() {
        // Initialize form validation
        $("#medical_record_form").validate({
            rules: {
                description: "required",
                booking_slot_id: "required",
                start_date: "required",
                end_date: "required",
            },
            messages: {
                description: "Please enter the description",
                booking_slot_id: "Please select the booking slot",
                start_date: "Please select the start date",
                end_date: "Please select the end date"
            }
        });

        // Apply validation rules to existing and dynamically added input fields
        $('input[name$="[medicine_name]"]').each(function () {
            $(this).rules("add", {
                required: true,
                messages: {
                    required: "Name is mandatory"
                }
            });
        });

        $('input[name$="[quantity]"]').each(function () {
            $(this).rules("add", {
                required: true,
                number: true,
                messages: {
                    required: "Quantity is mandatory",
                    number: "Please enter a valid number"
                }
            });
        });
    }

    // Function to generate and append HTML for new medicine fields
    function generate_medicine_html() {
        var html = `<div class="card card-body mb-2">
                    <div class="row m-0 p-0">
                    <div class="mb-3 col-6 col-sm-4">
                    <p class="mb-2">Medicine Name *</p>
                    <div><input type="text" name="medicine_detail[${medicine_counter}][medicine_name]" class="form-control"></div>
                    </div>
                    <div class="mb-3 col-4 col-sm-3">
                    <p class="mb-2">Quantity *</p>
                    <div><input type="number" name="medicine_detail[${medicine_counter}][quantity]" class="form-control"  min="1" max="5"></div>
                    </div>
                    <div class="mb-3 col-2 col-sm-2">
                    <div class="customecheckbox">
                    <div class="d-flex align-items-center">
                    <input type="checkbox" value="Morning" name="medicine_detail[${medicine_counter}][frequency][]">
                    <span> &nbsp; Morning</span>
                    </div>
                    <div class="d-flex align-items-center">
                    <input type="checkbox" value="Evening" name="medicine_detail[${medicine_counter}][frequency][]">
                    <span> &nbsp; Evening</span>
                    </div>
                    <div class="d-flex align-items-center">
                    <input type="checkbox" value="Night" name="medicine_detail[${medicine_counter}][frequency][]">
                    <span> &nbsp; Night</span>
                    </div> </div> </div>
                    <div class="mb-3 col-4 col-sm-3">
                    <p class="mb-2">Meal Status *</p>
                    <div class="custom-radio float-left">
                    <input type="radio" value="1" name="medicine_detail[${medicine_counter}][meal_status]"> Yes
                    <input type="radio" value="0" name="medicine_detail[${medicine_counter}][meal_status]" checked> No
                    </div>
                    <a class="btn btn-danger btn-xs ml-10px float-right" onclick="remove_medicine_html(this)">
                    <i class="fa fa-minus" aria-hidden="true"></i>
                    </a></div></div></div>`;
        $('#medicine_more_html').append(html);
        medicine_counter += 1;
        validatefunction();
    }

    function get_advice_html() {
        var html = `<div class="row">
                    <div class="mb-3 col-6 col-sm-10">
                        <input type="text" name="advice[${advice_counter}]" class="form-control"
                        placeholder="Enter the Description">
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-danger" onclick="remove_html(this)">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </a>
                    </div>
                </div>`;
        $('#advice_html').append(html);
        advice_counter += 1;
        // Reapply validation after adding new fields
        validatefunction();
    }

    function get_test_html() {
        var html = `<div class="row"><div class="mb-3 col-6 col-sm-5">
                        <input type="text" name="test[${test_counter}][name]" class="form-control"
                           placeholder="Enter the Name of Test">
                    </div>
                    <div class="mb-3 col-6 col-sm-5">
                        <textarea type="text" name="test[${test_counter}][description]" class="form-control"
                           placeholder="Enter the Description of test"></textarea>
                    </div>
                    <div class="col-md-2">
                        <a class="btn btn-danger" onclick="remove_html(this)">
                            <i class="fa fa-minus" aria-hidden="true"></i>
                        </a>
                    </div></div>`;
        $('#test_html').append(html);
        test_counter += 1;
        // Reapply validation after adding new fields
        validatefunction();
    }

    $('#addAdvice').click(get_advice_html);
    $('#addTest').click(get_test_html);
    $('#addMedicine').click(generate_medicine_html);
    validatefunction();
});
// Function to remove HTML block
function remove_html(this_ele, test_id) {
    if (test_id != null) {
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
                    url: "/doctor/prescription/delete/test-details/" + test_id,
                    type: "get",
                    success: function (res) {
                        if (res.status == true) {
                            $(this_ele).closest('.row').remove();
                            Swal.fire("Done!", "It was succesfully deleted!", "success");
                        } else {
                            Swal.fire("Error deleting!", "Please try again", "error");
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        Swal.fire("Error deleting!", "Please try again", "error");
                    }
                });
            }
        });
    } else {
        $(this_ele).closest('.row').remove();
    }
}

function remove_medicine_html(this_ele, medicine_detail_id) {
    if (medicine_detail_id != null) {
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
                    url: "/doctor/prescription/delete/medicine-details/" + medicine_detail_id,
                    type: "get",
                    success: function (res) {
                        if (res.status == true) {
                            jQuery(this_ele).parent().parent().remove();
                            Swal.fire("Done!", "It was succesfully deleted!", "success");
                        } else {
                            Swal.fire("Error deleting!", "Please try again", "error");
                        }
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        Swal.fire("Error deleting!", "Please try again", "error");
                    }
                });
            }
        });
    } else {
        $(this_ele).closest('.card').remove();
    }
}



// $(document).ready(function () {
//     // When a submenu anchor is clicked
//     $('.submenu > a').click(function (e) {
//         e.preventDefault();
        
//         // Toggle 'subdrop' class for the clicked anchor
//         $(this).toggleClass('subdrop');
        
//         // Check if the anchor has the class 'subdrop'
//         if ($(this).hasClass('subdrop')) {
//             // Show the inner ul (submenu) by adding display: block
//             $(this).next('ul').css('display', 'block');
//         } else {
//             // Hide the inner ul (submenu) by removing display: block
//             $(this).next('ul').css('display', 'none');
//         }
//     });
// });


/**
 * pay now button to generate payment link and redirect the user to payments page
 * it will be called from my appointment listing patient panel if in case :
 * Payment is required &
 * 
 */
function pay_fee_now(event,id)
{
    console.log("Booking Id : " + id);
    event.preventDefault();
    jQuery.ajax({
        type:'POST',
        url: site_base_url + '/patients/get-booking-fee-payment-link',
        data: {
            '_token': jQuery('meta[name="csrf-token"]').attr('content'),
            'id': id
        },
        dataType:'JSON',
        success: function(response){
            if(response.status)
            {
                window.open(response.payment_link,'_blank').focus();
            }
            else
            {
                // show error message returned from server in pop up
                Swal.fire("Booking error!", "Please try again", "error");
            }
        },
        error: function(error){
            Swal.fire("Booking error!", "Please try again", "error");
            // Show error in pop up
        }
    });
    return false;
}

function update_profile_completion_status(doctor_id)
{
    setTimeout(function(){
        jQuery.ajax({
            type: 'POST',
            url: site_base_url + 'update-doctor-profile-status',
            data:{
                'doctor_id':doctor_id,
                '_token': jQuery('meta[name=csrf-token]').attr('content')
            },
            // dataType: 'json',
            success:function(response){
                if(response.status)
                {
                    jQuery('#doctor-profile-progress-status').replaceWith(response.html);
                }
                console.log(response);
            },
            error: function(error_message){
                console.log(error_message);
            }
        });
    },500);
}

// Function to update profile progress percentage using animation
function update_profile_progress_animation(progressComplete) 
{
    const progressBar = document.querySelector(".progress-bar");
    let width = 0;
    const count = setInterval(() => {
    if (width != progressComplete) {
      width++;
      progressBar.style.opacity = "1";
      progressBar.style.width = width + "%";
      progressBar.innerHTML = width + "%";
    } else {
      clearInterval(count);
    }
  }, 10);
}
