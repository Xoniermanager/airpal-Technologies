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

// Loading selected chat history
function load_chat_history(receiver_user_id,read_status=0)
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
            'read_status':read_status
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

                // remove message unread counter from user list
                if(read_status)
                    {
                        jQuery('.unread-counter-'+receiver_user_id).remove();
                    }
            },1500);
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