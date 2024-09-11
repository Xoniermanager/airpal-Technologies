@extends('layouts.admin.main')
@section('content')
<div class=" main-chat-blk ">
    <div class="page-wrapper chat-page-wrapper chat-page-wrapper">
        <div class="container">
            <div class="content">
                <div class="dashboard-header">
                    <h3><a href="#">Messages</a></h3>
                </div>
                <div class="chat-sec">

                    <div class="sidebar-group left-sidebar chat_sidebar">

                        <div id="chats" class="left-sidebar-wrap sidebar active slimscroll">
                            <div class="slimscroll-active-sidebar">

                                <div class="left-chat-title all-chats">
                                    <div class="setting-title-head">
                                        <h4> All Chats</h4>
                                    </div>
                                    <div class="add-section">

                                        <form>
                                            <div class="user-chat-search">
                                                <span class="form-control-feedback"><i class="fa-solid fa-magnifying-glass"></i></span>
                                                @csrf
                                                <input id="search_chat_users" type="text" name="search_patient" placeholder="Search" class="form-control">
                                            </div>
                                        </form>

                                    </div>
                                </div>

                                <div class="sidebar-body chat-body" id="chat-users-list">
                                    @include('common_chat.user-chat-list')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="chat chat-messages">
                        <div id="chat-history"></div>
                        @include('common_chat.send-message-form')
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('javascript')
<script>
function refresh_chat_list(search_key = '')
{
    jQuery.ajax({
        type:'GET',
        url:"{{ route('chat.search.user') }}",
        data: {
            'search': search_key,
            '_token': "{{ csrf_token() }}"
        },
        dataType: 'json',
        success: function(response){
            if(response.status)
            {
                jQuery('#chat-users-list').html(response.data)
            }
        },
        error: function(error_response){
            console.log(error_response);
        }
    });
}

    
// Receive new chat notification 
let userOnline = [];
jQuery('document').ready(function(){
    window.Echo.join('chat.online.0')
    .here((users)   =>  {
        userOnline = [...users];
            update_user_online_status(userOnline);
        })
    .joining((user) =>  {
        userOnline.push(user);
        update_user_online_status(userOnline);
        })
    .leaving((user) =>  {
        userOnline.splice(userOnline.indexOf(user),1);
        make_user_offline(user);
        update_user_online_status(userOnline);
        })
    .error((error)  =>  {
        console.log(error);
    });
    
    window.Echo.private('chat.{{ auth()->user()->id }}')
    .listen('MessageSent', (data) => {
        // Message received, now refresh chat users list
        refresh_chat_list();
        
        // If the chat is already opened for the user from where message has received update chat history
        if((data.message.receiver_id == '{{ auth()->user()->id }}') && (data.message.sender_id == current_chat_user))
        {
             // Passing second param as 1 means message for opened chat will be marked as read
            load_chat_history(current_chat_user,1);
        }
    });
    
    window.Echo.private('chat.{{ auth()->user()->id }}')
    .listenForWhisper('typing',(event)   =>  {
        jQuery('.typing-'+event.user_id).show();
        if(event.user_id == current_chat_user)
        {
            jQuery('.remove-typing'+event.user_id).show();
            $('.slimscroll-chat-body').scrollTop(1000000);
        }
        
        setTimeout(function(){
            jQuery('.typing-'+event.user_id).hide();

            if(event.user_id == current_chat_user)
            {
                jQuery('.remove-typing'+event.user_id).hide();
                $('.slimscroll-chat-body').scrollTop(1000000);
            }
        },8000);
    });
});
</script>
@endsection