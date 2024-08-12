<ul class="user-list">
<!-- Loading active chat users -->
    @foreach($chatUsers as $chatUser)
        @php
        $chatId = '';
        $lastTimeText = '';
        $lastText = '';
        if($chatUser->sentChatDetails()->exists() || $chatUser->receivedChatDetails()->exists())
        {
            if($chatUser->sentChatDetails()->exists())
            {
                $chatId = $chatUser->sentChatDetails[0]->id;
                $lastText = $chatUser->sentChatDetails[0]->getLatestChatDetails->body;
                $lastTimeText =  date_format($chatUser->sentChatDetails[0]->last_time_message,'Y-m-d')->diffForHumans();
            }
            else if($chatUser->receivedChatDetails()->exists())
            {
                $chatId = $chatUser->receivedChatDetails[0]->id;
                $lastText = $chatUser->receivedChatDetails[0]->getLatestChatDetails->body;
                $lastTimeText =  \Carbon\Carbon::Parse($chatUser->receivedChatDetails[0]->last_time_message)->diffForHumans();
            }
        }
        @endphp
        <li id="chat-user-{{ $chatUser->id }}" class="user-list-item" onclick="load_chat_history('{{ $chatUser->id }}','{{ $chatId }}')">
        <a href="javascript:void(0);">
            <div class="avatar avatar-online">
                <img src="{{ $chatUser->image_url }}" alt="image">
            </div>
            <div class="users-list-body">
                <div>
                    <h5>{{ $chatUser->first_name }} {{ $chatUser->last_name }}</h5>
                    <p>{{ $lastText }}</p>
                </div>
                <div class="last-chat-time">
                    <small class="text-muted">{{ $lastTimeText }}</small>
                    <div class="chat-pin">
                        <i class="fa-solid fa-check-double green-check"></i>
                    </div>
                </div>
            </div>
        </a>
    </li>
    @endforeach
    

