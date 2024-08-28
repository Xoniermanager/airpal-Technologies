<div class="chat-footer">
    <form id="send-message-form" onsubmit="return send_message(event)">
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
        @csrf
        <div class="form-buttons">
            <button disabled class="btn send-btn" type="submit">
                <i class="fa-solid fa-paper-plane"></i>
            </button>
        </div>
    </form>
</div>
<script>
    // Send message and update chat history body
    function send_message(event)
    {
        event.preventDefault();
        let message = jQuery('input[name="message"]').val();
        let receiver_id = jQuery('input[name="receiver_id"]').val();
        // Send message in server
        form_data = jQuery("#send-message-form :input[value!='']").serialize();
        jQuery.ajax({
            url: "{{ route('send.message') }}",
            type: 'post',
            dataType: 'json',
            data: {
                'message':message,
                'receiver_id':receiver_id,
                '_token':'{{ csrf_token() }}'
            },
            success: function(response){
                if(response.status)
                {
                    jQuery('#chat-history').html(response.data);
                    jQuery('input[name=message]').val('');
                    $('.slimscroll-chat-body').scrollTop(1000000);
                }
            },
            error: function(error_response){
                console.log(error_response);
            }
        });
    }
</script>