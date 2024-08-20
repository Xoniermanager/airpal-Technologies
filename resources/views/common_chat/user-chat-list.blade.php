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
                $chatId = $chatUser->sentChatDetails->id;
                $lastText = $chatUser->sentChatDetails->getLatestChatDetails->body;
                $lastTimeText =  \Carbon\Carbon::Parse($chatUser->sentChatDetails->last_time_message)->diffForHumans();
            }
            else if($chatUser->receivedChatDetails()->exists())
            {
                $chatId = $chatUser->receivedChatDetails->id;
                $lastText = $chatUser->receivedChatDetails->getLatestChatDetails->body;
                $lastTimeText =  \Carbon\Carbon::Parse($chatUser->receivedChatDetails->last_time_message)->diffForHumans();
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
    

