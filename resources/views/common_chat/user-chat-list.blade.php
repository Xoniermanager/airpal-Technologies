<ul class="user-list">
<!-- Loading active chat users -->
    @foreach($chatUsers as $chatUser)
        @php
        $lastMessageText = '';
        $lastMessageDate = '';

        if($chatUser->last_message)
        {
            $lastMessageText = $chatUser->last_message;
        }

        if($chatUser->last_message_date)
        {
            $lastMessageDate =  \Carbon\Carbon::Parse($chatUser->last_message_date)->diffForHumans();
        }
        @endphp
        <li id="chat-user-{{ $chatUser->id }}" class="user-list-item">
        <a  href="javascript:void(0);" onclick="load_chat_history('{{ $chatUser->id }}',1)">
            <div class="avatar online-{{ $chatUser->id }}">
                <img src="{{ $chatUser->image_url }}" 
                  onerror="this.src='{{ asset('assets/img/user.jpg') }}';"
                alt="image">
            </div>
            <div class="users-list-body">
                <div>
                    <h5>{{ $chatUser->first_name }} {{ $chatUser->last_name }}</h5>
                    @if($chatUser->unreadCounter > 0)
                        <span class='unread-counter-{{ $chatUser->id }}'> {{ $chatUser->unreadCounter }} </span>
                    @endif
                    <p>{{ $lastMessageText }}</p>
                </div>
                <div class="last-chat-time">
                    <small class="text-muted">{{ $lastMessageDate }}</small>
                    <div class="chat-pin">
                    <p class='typing typing-{{ $chatUser->id }}'>typing...</p>
                    
                        <!-- <i class="fa-solid fa-check-double green-check"></i> -->
                    </div>
                </div>
            </div>
        </a>
    </li>
    @endforeach
</ul>
