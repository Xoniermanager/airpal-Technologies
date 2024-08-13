@extends('layouts.doctor.main')
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
                                    @include('doctor.chats.user-chat-list')
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="chat chat-messages" id="middle">
                        <div id="chat-body">
                           
                        </div>
                        <div class="chat-footer">
                            <form id="send-message-form">
                                <div class="smile-foot">
                                    <div class="chat-action-btns">
                                        <div class="chat-action-col">
                                            <span class="action-circle" style="position: absolute;bottom: 40px;">
                                                <i class="fa-solid fa-paperclip"></i>
                                            </span>
                                            <input type="file" class="" style="opacity: 0;width: 30px;">
                                        </div>
                                    </div>
                                </div>
                                <div class="smile-foot emoj-action-foot">
                                    <a href="#" class="action-circle"><i class="fa-regular fa-face-smile"></i></a>
                                    <div class="emoj-group-list-foot down-emoji-circle">
                                        <ul>
                                            <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-01.svg" alt="Icon"></a>
                                            </li>
                                            <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-02.svg" alt="Icon"></a>
                                            </li>
                                            <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-03.svg" alt="Icon"></a>
                                            </li>
                                            <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-04.svg" alt="Icon"></a>
                                            </li>
                                            <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-05.svg" alt="Icon"></a>
                                            </li>
                                            <li class="add-emoj"><a href="javascript:void(0);"><i class="fa-solid fa-plus"></i></a></li>
                                        </ul>
                                    </div>
                                </div>

                                <input type="text" name="message" class="form-control chat_form" placeholder="Type your message here...">
                                <input type="hidden" name="receiver_id" id="receiver_id" value="">
                                <input type="hidden" name="chat_id" id="chat_id" value="">
                                @csrf
                                <div class="form-buttons">
                                    <button class="btn send-btn" type="submit">
                                        <i class="fa-solid fa-paper-plane"></i>
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

@endsection

@section('javascript')
<script>
    var current_chat_user = 0;
    function set_current_chat_user(selected_user)
    {
        current_chat_user = selected_user;
    }

    function load_chat_history(receiver_user_id, chat_id=null)
    {
        set_current_chat_user(receiver_user_id);
        jQuery('#receiver_id').val(receiver_user_id);
        jQuery('#chat_id').val(chat_id);
        jQuery('.user-list-item').removeClass('active');
        jQuery('#chat-user-'+receiver_user_id).addClass('active');
        jQuery.ajax({
            type: 'POST',
            url: "{{ route('chat.history') }}",
            data:{
                'receiver_user_id':receiver_user_id,
                'chat_id':chat_id,
                '_token': '{{ csrf_token() }}'
            },
            dataType:'json',
            success: function(response){
                if(response.status)
                {
                    jQuery('#chat-body').html(response.data);
                }
            },
            error: function(error_response){
                console.log(error_response);
            }
        });
    }


    // Send message ans update chat history body
    jQuery(function(){
        jQuery('#send-message-form').validate({
            rules: {
                message:"required",
                receiver_id:"required"
            },
            messages:{
                message: 'Please enter some message to send!'
            },
            submitHandler: function(form){
                form_data = jQuery("#send-message-form :input[value!='']").serialize();

                jQuery.ajax({
                    url: "{{ route('send.message') }}",
                    type: 'post',
                    dataType: 'json',
                    data: form_data,
                    success: function(response){
                        if(response.status)
                        {
                            jQuery('#chat-body').html(response.data);
                            jQuery('input[name=message]').val('');
                            $('.slimscroll').scrollTop(1000000);
                            refresh_chat_list();
                        }
                    },
                    error: function(error_response){
                        console.log(error_response);
                    }
                });
            }
        });
    });

    // Search users/patients from doctor panel
    jQuery('#search_chat_users').on('keyup', function(){
        let search_text = jQuery(this).val().trim();
        refresh_chat_list(search_text);
    });

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
    
</script>
@endsection