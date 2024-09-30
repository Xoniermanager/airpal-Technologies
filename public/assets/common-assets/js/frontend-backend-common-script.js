/* Checking if booking are allowed and slots are configured for current doctor */
function bookings_available(status)
{
    if(status)
    {
        return true;
    }
    else
    {
        swal.fire({
            icon: "error",
            title: "Bookings are not open now!",
            text: "We are sorry, the doctor has not set its availability to book appointments.!",
            footer: 'Please try later in some days.'
        });
        return false;
    }
}