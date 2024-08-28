/*
=====================================================================
                Start: Chat Scripts
=====================================================================
*/

// Search doctors/patients from doctor panel
jQuery('#search_chat_users').on('keyup', function(){
    let search_text = jQuery(this).val().trim();
    refresh_chat_list(search_text);
});


// Setting selected chat user as receiver
var current_chat_user = 0;
function set_current_chat_user(selected_user)
{
    current_chat_user = selected_user;
}

// Enable send message button after entering some text
jQuery('body').on('keyup','input[name="message"]', function(){
    let sendMessageText = jQuery(this).val().trim();
    if(sendMessageText.length > 0)
    {
        jQuery('.send-btn').attr('disabled',false);
    }
    else
    {
        jQuery('.send-btn').attr('disabled',true);
    }
});

// Loading selected chat history
console.log("site_base_url : " + window.site_base_url);
function load_chat_history(receiver_user_id)
{
    set_current_chat_user(receiver_user_id);
    jQuery('#receiver_id').val(receiver_user_id);
    jQuery('.user-list-item').removeClass('active');
    jQuery('#chat-user-'+receiver_user_id).addClass('active');
    // Setting up csrf token for all ajax requests header
    jQuery.ajax({
        type: 'POST',
        url: site_base_url + "/chat-history",
        data:{
            '_token':jQuery('meta[name="csrf-token"]').attr('content'),
            'receiver_user_id':receiver_user_id,
        },
        dataType:'json',
        success: function(response){
            if(response.status)
            {
                jQuery('#chat-history').html(response.data);
                $('.slimscroll-chat-body').scrollTop(1000000);
            }
        },
        error: function(error_response){
            console.log(error_response);
        },
        complete: function(){
            setTimeout(function(){
                jQuery('#receiver_id').val(receiver_user_id);
            },1500);
        }
    });
}
/*
=====================================================================
                End: Chat Scripts
=====================================================================
*/