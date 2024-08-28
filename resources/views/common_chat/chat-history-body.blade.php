<div id="chat-body">   
    <div class="slimscroll slimscroll-chat-body">
        <!-- Chat body header start here -->
        <div class="chat-inner-header">
            <div class="chat-header">
                <div class="user-details">
                    <div class="d-lg-none">
                        <ul class="list-inline mt-2 me-2">
                            <li class="list-inline-item">
                                <a class="text-muted px-0 left_sides" href="#" data-chat="open">
                                    <i class="fas fa-arrow-left"></i>
                                </a>
                            </li>
                        </ul>
                    </div>
                    <figure class="avatar avatar-online">
                        <img src="{{ $receiverDetails->image_url }}" alt="image">
                    </figure>
                    <div class="mt-1">
                        <h5>{{ $receiverDetails->first_name . ' ' . $receiverDetails->last_name }}</h5>
                        <small class="last-seen">
                            Online
                        </small>
                    </div>
                </div>
                <div class="chat-options ">
                    <ul class="list-inline">
                        <li class="list-inline-item">
                            <a href="javascript:void(0)" class="btn btn-outline-light chat-search-btn" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Search">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a class="btn btn-outline-light no-bg" href="#" data-bs-toggle="dropdown">
                                <i class="fa-solid fa-ellipsis-vertical"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end">
                                <a href="#" class="dropdown-item "><span><i class="bx bx-x"></i></span>Close Chat </a>
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#mute-notification"><span><i class="bx bx-volume-mute"></i></span>Mute
                                    Notification</a>
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#disappearing-messages"><span><i class="bx bx-time-five"></i></span>Disappearing
                                    Message</a>
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#clear-chat"><span><i class="bx bx-brush-alt"></i></span>Clear
                                    Message</a>
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#change-chat"><span><i class="bx bx-trash-alt"></i></span>Delete
                                    Chat</a>
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#report-user"><span><i class="bx bx-dislike"></i></span>Report</a>
                                <a href="#" class="dropdown-item" data-bs-toggle="modal" data-bs-target="#block-user"><span><i class="bx bx-block"></i></span>Block</a>
                            </div>
                        </li>
                    </ul>
                </div>

                <div class="chat-search">
                    <form>
                        <span class="form-control-feedback"><i class="fa-solid fa-magnifying-glass"></i></span>
                        <input type="text" name="chat-search" placeholder="Search Chats" class="form-control">
                        <div class="close-btn-chat"><i class="fa fa-close"></i></div>
                    </form>
                </div>

            </div>
        </div>

        <!-- Chat body header end here -->
        <div class="chat-body">
            <div class="messages">
                @forelse($chatHistory as $chatDate=>$chats)
                    <div class="chat-line">
                        @php
                            $today = new \DateTime("today");
                            $interval = $today->diff(date_create($chatDate));
                            $dateText = '';
                            
                            if($interval->days == 0)
                            {
                                $dateText = 'Today';
                            }
                            elseif($interval->days == 1)
                            {
                                $dateText = 'Yesterday';
                            }
                            else
                            {
                                $dateText = date_format(date_create($chatDate),'jS M Y');
                            }
                        @endphp
                        <span class="chat-date"> {{ $dateText . ' (' . \Carbon\Carbon::parse($chatDate)->diffForHumans() . ')' }}</span>
                    </div>
                    @foreach($chats as $chat)
                        @if($chat->sender_id != auth()->user()->id)
                        <div class="chats">
                            <div class="chat-avatar">
                                <img src="{{ $receiverDetails->image_url }}" class="dreams_chat" alt="image">
                            </div>
                            <div class="chat-content">
                                <div class="chat-profile-name">
                                    <h6>{{ $receiverDetails->first_name . ' ' . $receiverDetails->last_name }}<span>{{ \Carbon\Carbon::parse($chat->created_at)->diffForHumans() }}</span></h6>
                                    <div class="chat-action-btns ms-3">
                                        <div class="chat-action-col">
                                            <a class="#" href="#" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </a>
                                            <!-- <div class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item message-info-left">Message
                                                    Info </a>
                                                <a href="#" class="dropdown-item">Reply</a>
                                                <a href="#" class="dropdown-item">React</a>
                                                <a href="#" class="dropdown-item">Forward</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                                <div class="message-content">
                                    {{ $chat->body }}
                                    <div class="emoj-group">
                                        <ul>
                                            <li class="emoj-action"><a href="javascript:void(0);"><i class="fa-regular fa-face-smile"></i></a>
                                                <div class="emoj-group-list">
                                                    <ul>
                                                        <!-- <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-01.svg" alt="Icon"></a></li> -->
                                                        <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-02.svg" alt="Icon"></a></li>
                                                        <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-03.svg" alt="Icon"></a></li>
                                                        <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-04.svg" alt="Icon"></a></li>
                                                        <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-05.svg" alt="Icon"></a></li>
                                                        <li class="add-emoj"><a href="javascript:void(0);"><i class="bx bx-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#forward-message"><i class="fa-solid fa-share"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @else
                        <div class="chats chats-right">
                            <div class="chat-content">
                                <div class="chat-profile-name text-end justify-content-end">
                                    <h6>{{ $senderDetails->first_name . ' ' . $senderDetails->last_name }}<span>{{ \Carbon\Carbon::parse($chat->created_at)->diffForHumans()  }} 
                                        {!! ($chat->read == 0) ? '<i class="fa-solid fa-check grey-check"></i>' : '<i class="fa-solid fa-check-double green-check"></i>' !!}
                                    </span>
                                    </h6>
                                    <div class="chat-action-btns ms-3">
                                        <div class="chat-action-col">
                                            <a class="#" href="#" data-bs-toggle="dropdown">
                                                <i class="fa-solid fa-ellipsis"></i>
                                            </a>
                                            <div class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                <a href="#" class="dropdown-item message-info-left">Message
                                                    Info </a>
                                                <!-- <a href="#" class="dropdown-item">Reply</a>
                                                <a href="#" class="dropdown-item">React</a> -->
                                                <a href="#" class="dropdown-item">Forward</a>
                                                <a href="#" class="dropdown-item">Delete</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="message-content ">
                                    <div class="emoj-group rig-emoji-group">
                                        <ul>
                                            <li class="emoj-action"><a href="javascript:void(0);"><i class="fa-regular fa-face-smile"></i></a>
                                                <div class="emoj-group-list">
                                                    <ul>
                                                        <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-01.svg" alt="Icon"></a></li>
                                                        <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-02.svg" alt="Icon"></a></li>
                                                        <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-03.svg" alt="Icon"></a></li>
                                                        <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-04.svg" alt="Icon"></a></li>
                                                        <li><a href="javascript:void(0);"><img src="assets/img/icons/emoj-icon-05.svg" alt="Icon"></a></li>
                                                        <li class="add-emoj"><a href="javascript:void(0);"><i class="bx bx-plus"></i></a></li>
                                                    </ul>
                                                </div>
                                            </li>
                                            <li><a href="#" data-bs-toggle="modal" data-bs-target="#forward-message"><i class="fa-solid fa-share"></i></a></li>
                                        </ul>
                                    </div>
                                    <div class="chat-voice-group">
                                        {{ $chat->body }}
                                    </div>
                                </div>
                            </div>
                            <div class="chat-avatar">
                                <img src="{{ $senderDetails->image_url }}" class="dreams_chat" alt="image">
                            </div>
                        </div>
                        @endif
                    @endforeach
                @empty
                <p>No previous chats available</p>
                @endforelse
            </div>
        </div>
    </div>
</div>