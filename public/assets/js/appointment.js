// function splitButton(button) {

//     // // var originalButton = document.getElementById("original-button");
//     // button.classList.add("hidden");

   

//     // var additionalButtons = document.getElementsByClassName("additional-buttons");
//     // additionalButtons.classList.remove("hidden");

//         $(button).addClass("hidden"); // Hide the original slot button
//         $(button).siblings('.additional-buttons').removeClass("hidden"); // Show the additional buttons
//     }

function splitButton(button) {
    var $button = $(button);
    var $allSlots = $('.slot-group');

    // Toggle visibility for the clicked slot's additional buttons
    var $additionalButtons = $button.siblings('.additional-buttons');
    if ($additionalButtons.hasClass("hidden")) {
        // Show additional buttons of the clicked slot and hide others
        $allSlots.find('.additional-buttons').addClass("hidden");
        $additionalButtons.removeClass("hidden");
    } else {
        // Hide additional buttons of the clicked slot
        $additionalButtons.addClass("hidden");
    }
}

// function showContent(contentId,slot,date,doctorId) {

//     $('#booking_date').val(date);
//     $('.booking_date').text(date);
//     $('#booking_slot_time').val(slot);
//     $('.booking_slot_time').text(slot);
//     $('#doctor_id').val(doctorId);
    
//     var content = document.getElementById(contentId);
//     content.classList.remove("hidden-content");
// }

function showContent(contentId, slot, date, doctorId) {

    // Send AJAX request to check if the user is authenticated
    $.ajax({
        url: site_base_url + 'patients/check-auth',
        method: 'GET',
        success: function(response) {
            if (response.authenticated) {
                // If authenticated, proceed with booking process
                $('#booking_date').val(date);
                $('.booking_date').text(date);
                $('#booking_slot_time').val(slot);
                $('.booking_slot_time').text(slot);
                $('#doctor_id').val(doctorId);

                var content = document.getElementById(contentId);
                content.classList.remove("hidden-content");
            } else {
                // If not authenticated, redirect to login or show a message
                Swal.fire("To Continue!", "your booking, please sign in first.", "error");
          
            }
        },
        error: function() {
            alert('An error occurred while checking authentication.');
        }
    });
}

