@extends('layouts.patient.main')
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
        url:"{{ (auth()->user()->role == 2) ? route('chat.search.patients') : route('chat.search.doctors') }}",
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
jQuery('document').ready(function(){
    window.Echo.private('chat.{{ auth()->user()->id }}')
    .listen('MessageSent', (data) => {
        refresh_chat_list();

        // do what you need to do based on the event name and data
        console.log('Event listened');
        if(data.message.sender_id == current_chat_user)
        {
            load_chat_history(current_chat_user);
        }
    });
});
</script>
@endsection