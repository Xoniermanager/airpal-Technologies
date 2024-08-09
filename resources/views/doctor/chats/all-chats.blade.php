@extends('layouts.doctor.main')
@section('content') 
<div class=" main-chat-blk ">
            <div class="page-wrapper chat-page-wrapper chat-page-wrapper">
                <div class="container">
                    <div class="content">
                        <div class="dashboard-header">
                            <h3><a href="#"><i class="fa-solid fa-arrow-left"></i> Message</a></h3>
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
                                                        <span class="form-control-feedback"><i
                                                                class="fa-solid fa-magnifying-glass"></i></span>
                                                        <input type="text" name="chat-search" placeholder="Search"
                                                            class="form-control">
                                                    </div>
                                                </form>

                                            </div>
                                        </div>


                                       

                                        <div class="sidebar-body chat-body" id="chatsidebar">

                                            <div class="d-flex justify-content-between align-items-center ps-0 pe-0">
                                                <div class="fav-title pin-chat">
                                                    <h6>Pinned Chat</h6>
                                                </div>
                                            </div>

                                            <ul class="user-list">
                                                <li class="user-list-item">
                                                    <a href="javascript:void(0);">
                                                        <div class="avatar avatar-online">
                                                            <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                                alt="image">
                                                        </div>
                                                        <div class="users-list-body">
                                                            <div>
                                                                <h5>Adrian Marshall</h5>
                                                                <p>Have you called them?</p>
                                                            </div>
                                                            <div class="last-chat-time">
                                                                <small class="text-muted">Just Now</small>
                                                                <div class="chat-pin">
                                                                    
                                                                    <i class="fa-solid fa-check-double green-check"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="user-list-item">
                                                    <a href="javascript:void(0);">
                                                        <div class="avatar ">
                                                            <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                                alt="image">
                                                        </div>
                                                        <div class="users-list-body">
                                                            <div>
                                                                <h5>Dr Joseph Boyd</h5>
                                                                <p><i class="fa-solid fa-video me-1"></i>Video</p>
                                                            </div>
                                                            <div class="last-chat-time">
                                                                <small class="text-muted">Yesterday</small>
                                                                <div class="chat-pin">
                                                                    
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="user-list-item">
                                                    <a href="javascript:void(0);">
                                                        <div class="avatar avatar-online">
                                                            <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                                alt="image">
                                                        </div>
                                                        <div class="users-list-body">
                                                            <div>
                                                                <h5>Catherine Gracey</h5>
                                                                <p><i
                                                                        class="fa-solid fa-file-lines me-1"></i>Prescription.doc
                                                                </p>
                                                            </div>
                                                            <div class="last-chat-time">
                                                                <small class="text-muted">10:20 PM</small>
                                                                <div class="chat-pin">
                                                                    
                                                                    <i class="fa-solid fa-check-double green-check"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>

                                            <div class="d-flex justify-content-between align-items-center ps-0 pe-0">
                                                <div class="fav-title pin-chat">
                                                    <h6>Recent Chat</h6>
                                                </div>
                                            </div>

                                            <ul class="user-list">
                                                <li class="user-list-item">
                                                    <a href="javascript:void(0);">
                                                        <div class="avatar avatar-online">
                                                            <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                                alt="image">
                                                        </div>
                                                        <div class="users-list-body">
                                                            <div>
                                                                <h5>Kelly Stevens</h5>
                                                                <p>Have you called them?</p>
                                                            </div>
                                                            <div class="last-chat-time">
                                                                <small class="text-muted">Just Now</small>
                                                                <div class="new-message-count">2</div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="user-list-item">
                                                    <a href="javascript:void(0);">
                                                        <div>
                                                            <div class="avatar avatar-online">
                                                                <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                                    alt="image">
                                                            </div>
                                                        </div>
                                                        <div class="users-list-body">
                                                            <div>
                                                                <h5>Robert Miller</h5>
                                                                <p><i class="fa-solid fa-video me-1"></i>Video</p>
                                                            </div>
                                                            <div class="last-chat-time">
                                                                <small class="text-muted">Yesterday</small>
                                                                <div class="chat-pin">
                                                                    <i class="fa-solid fa-check"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="user-list-item">
                                                    <a href="javascript:void(0);">
                                                        <div class="avatar">
                                                            <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                                alt="image">
                                                        </div>
                                                        <div class="users-list-body">
                                                            <div>
                                                                <h5>Emily Musick</h5>
                                                                <p><i class="fa-solid fa-file-lines me-1"></i>Project
                                                                    Tools.doc</p>
                                                            </div>
                                                            <div class="last-chat-time">
                                                                <small class="text-muted">10:20 PM</small>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="user-list-item">
                                                    <a href="javascript:void(0);">
                                                        <div>
                                                            <div class="avatar avatar-online">
                                                                <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                                    alt="image">
                                                            </div>
                                                        </div>
                                                        <div class="users-list-body">
                                                            <div>
                                                                <h5>Samuel James</h5>
                                                                <p><i class="fa-solid fa-microphone me-1"></i>Audio</p>
                                                            </div>
                                                            <div class="last-chat-time">
                                                                <small class="text-muted">12:30 PM</small>
                                                                <div class="chat-pin">
                                                                    <i class="fa-solid fa-check-double green-check"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="user-list-item">
                                                    <a href="javascript:void(0);">
                                                        <div>
                                                            <div class="avatar ">
                                                                <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                                    alt="image">
                                                            </div>
                                                        </div>
                                                        <div class="users-list-body">
                                                            <div>
                                                                <h5>Dr Shanta Neill</h5>
                                                                <p class="missed-call-col"><i
                                                                        class="fa-solid fa-phone-flip me-1"></i>Missed
                                                                    Call</p>
                                                            </div>
                                                            <div class="last-chat-time">
                                                                <small class="text-muted">Yesterday</small>
                                                                <div class="chat-pin">
                                                                    <i class="bx bx-microphone-off"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="user-list-item">
                                                    <a href="javascript:void(0);">
                                                        <div>
                                                            <div class="avatar avatar-online">
                                                                <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                                    alt="image">
                                                            </div>
                                                        </div>
                                                        <div class="users-list-body">
                                                            <div>
                                                                <h5>Peter Anderson</h5>
                                                                <p>Have you called them?</p>
                                                            </div>
                                                            <div class="last-chat-time">
                                                                <small class="text-muted">23/03/24</small>
                                                                <div class="chat-pin">
                                                                    <i class="fa-solid fa-check"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                                <li class="user-list-item">
                                                    <a href="javascript:void(0);">
                                                        <div>
                                                            <div class="avatar">
                                                                <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                                    alt="image">
                                                            </div>
                                                        </div>
                                                        <div class="users-list-body">
                                                            <div>
                                                                <h5>Anderea Kearns</h5>
                                                                <p><i class="fa-solid fa-image me-1"></i>Photo</p>
                                                            </div>
                                                            <div class="last-chat-time">
                                                                <small class="text-muted">20/03/24</small>
                                                                <div class="chat-pin">
                                                                    <i class="fa-solid fa-check-double"></i>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>

                            </div>


                            <div class="chat chat-messages" id="middle">
                                <div class="slimscroll">
                                    <div class="chat-inner-header">
                                        <div class="chat-header">
                                            <div class="user-details">
                                                <div class="d-lg-none">
                                                    <ul class="list-inline mt-2 me-2">
                                                        <li class="list-inline-item">
                                                            <a class="text-muted px-0 left_sides" href="#"
                                                                data-chat="open">
                                                                <i class="fas fa-arrow-left"></i>
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
                                                <figure class="avatar avatar-online">
                                                    <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg" alt="image">
                                                </figure>
                                                <div class="mt-1">
                                                    <h5>Anderea Kearns</h5>
                                                    <small class="last-seen">
                                                        Online
                                                    </small>
                                                </div>
                                            </div>
                                            <div class="chat-options ">
                                                <ul class="list-inline">
                                                    <li class="list-inline-item">
                                                        <a href="javascript:void(0)"
                                                            class="btn btn-outline-light chat-search-btn"
                                                            data-bs-toggle="tooltip" data-bs-placement="bottom"
                                                            title="Search">
                                                            <i class="fa-solid fa-magnifying-glass"></i>
                                                        </a>
                                                    </li>
                                                    <li class="list-inline-item">
                                                        <a class="btn btn-outline-light no-bg" href="#"
                                                            data-bs-toggle="dropdown">
                                                            <i class="fa-solid fa-ellipsis-vertical"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <a href="#" class="dropdown-item "><span><i
                                                                        class="bx bx-x"></i></span>Close Chat </a>
                                                            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#mute-notification"><span><i
                                                                        class="bx bx-volume-mute"></i></span>Mute
                                                                Notification</a>
                                                            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#disappearing-messages"><span><i
                                                                        class="bx bx-time-five"></i></span>Disappearing
                                                                Message</a>
                                                            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#clear-chat"><span><i
                                                                        class="bx bx-brush-alt"></i></span>Clear
                                                                Message</a>
                                                            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#change-chat"><span><i
                                                                        class="bx bx-trash-alt"></i></span>Delete
                                                                Chat</a>
                                                            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#report-user"><span><i
                                                                        class="bx bx-dislike"></i></span>Report</a>
                                                            <a href="#" class="dropdown-item" data-bs-toggle="modal"
                                                                data-bs-target="#block-user"><span><i
                                                                        class="bx bx-block"></i></span>Block</a>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>

                                            <div class="chat-search">
                                                <form>
                                                    <span class="form-control-feedback"><i
                                                            class="fa-solid fa-magnifying-glass"></i></span>
                                                    <input type="text" name="chat-search" placeholder="Search Chats"
                                                        class="form-control">
                                                    <div class="close-btn-chat"><i class="fa fa-close"></i></div>
                                                </form>
                                            </div>

                                        </div>
                                    </div>
                                    <div class="chat-body">
                                        <div class="messages">
                                            <div class="chats">
                                                <div class="chat-avatar">
                                                    <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                        class="dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content">
                                                    <div class="chat-profile-name">
                                                        <h6>Andrea Kearns<span>8:16 PM</span></h6>
                                                        <div class="chat-action-btns ms-3">
                                                            <div class="chat-action-col">
                                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                                    <a href="#"
                                                                        class="dropdown-item message-info-left">Message
                                                                        Info </a>
                                                                    <a href="#" class="dropdown-item">Reply</a>
                                                                    <a href="#" class="dropdown-item">React</a>
                                                                    <a href="#" class="dropdown-item">Forward</a>
                                                                    <a href="#" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-content">
                                                        <a href="javascript:void(0);">Hello Doctor, </a> could you tell
                                                        a diet plan that suits for me?
                                                        <div class="emoj-group">
                                                            <ul>
                                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                                            class="fa-regular fa-face-smile"></i></a>
                                                                    <div class="emoj-group-list">
                                                                        <ul>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-01.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-02.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-03.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-04.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-05.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li class="add-emoj"><a
                                                                                    href="javascript:void(0);"><i
                                                                                        class="bx bx-plus"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <li><a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#forward-message"><i
                                                                            class="fa-solid fa-share"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chat-line">
                                                <span class="chat-date">Today, March 25</span>
                                            </div>
                                            <div class="chats chats-right">
                                                <div class="chat-content">
                                                    <div class="chat-profile-name text-end justify-content-end">
                                                        <h6>Edalin Hendry<span>9:45 AM <i
                                                                    class="fa-solid fa-check-double green-check"></i></span>
                                                        </h6>
                                                        <div class="chat-action-btns ms-3">
                                                            <div class="chat-action-col">
                                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                                    <a href="#"
                                                                        class="dropdown-item message-info-left">Message
                                                                        Info </a>
                                                                    <a href="#" class="dropdown-item">Reply</a>
                                                                    <a href="#" class="dropdown-item">React</a>
                                                                    <a href="#" class="dropdown-item">Forward</a>
                                                                    <a href="#" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-content ">
                                                        <div class="emoj-group rig-emoji-group">
                                                            <ul>
                                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                                            class="fa-regular fa-face-smile"></i></a>
                                                                    <div class="emoj-group-list">
                                                                        <ul>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-01.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-02.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-03.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-04.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-05.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li class="add-emoj"><a
                                                                                    href="javascript:void(0);"><i
                                                                                        class="bx bx-plus"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <li><a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#forward-message"><i
                                                                            class="fa-solid fa-share"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="chat-voice-group">
                                                       hello
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-avatar">
                                                    <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                        class="dreams_chat" alt="image">
                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="chat-avatar">
                                                    <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                        class="dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content">
                                                    <div class="chat-profile-name">
                                                        <h6>Andrea Kearns<span>9:47 AM</span><span class="check-star"><i
                                                                    class="bx bxs-star"></i></span></h6>
                                                        <div class="chat-action-btns ms-2">
                                                            <div class="chat-action-col">
                                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                                    <a href="#"
                                                                        class="dropdown-item message-info-left">Message
                                                                        Info </a>
                                                                    <a href="#" class="dropdown-item">Reply</a>
                                                                    <a href="#" class="dropdown-item">React</a>
                                                                    <a href="#" class="dropdown-item">Forward</a>
                                                                    <a href="#" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-content award-link chat-award-link">
                                                        <a href="javascript:void(0);"
                                                            class="mb-1">https://www.youtube.com/watch?v=GCmL3mS0Psk</a>
                                                        
                                                        <div class="emoj-group">
                                                            <ul>
                                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                                            class="fa-regular fa-face-smile"></i></a>
                                                                    <div class="emoj-group-list">
                                                                       dfd
                                                                    </div>
                                                                </li>
                                                                <li><a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#forward-message"><i
                                                                            class="fa-solid fa-share"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chats chats-right">
                                                <div class="chat-content">
                                                    <div class="chat-profile-name text-end justify-content-end">
                                                        <h6>Edalin Hendry<span>9:50 AM <i
                                                                    class="fa-solid fa-check-double green-check"></i></span>
                                                        </h6>
                                                        <div class="chat-action-btns ms-3">
                                                            <div class="chat-action-col">
                                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                                    <a href="#"
                                                                        class="dropdown-item message-info-left">Message
                                                                        Info </a>
                                                                    <a href="#" class="dropdown-item">Reply</a>
                                                                    <a href="#" class="dropdown-item">React</a>
                                                                    <a href="#" class="dropdown-item">Forward</a>
                                                                    <a href="#" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-content fancy-msg-box">
                                                        <div class="emoj-group wrap-emoji-group ">
                                                            <ul>
                                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                                            class="fa-regular fa-face-smile"></i></a>
                                                                    <div class="emoj-group-list">
                                                                        go
                                                                    </div>
                                                                </li>
                                                                <li><a href="javascript:void(0);" data-bs-toggle="modal"
                                                                        data-bs-target="#forward-message"><i
                                                                            class="fa-solid fa-share"></i></a></li>
                                                            </ul>
                                                        </div>
                                                        <div class="download-col">
                                                           hi
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="chat-avatar">
                                                    <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                        class="dreams_chat" alt="image">
                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="chat-avatar">
                                                    <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                        class="dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content">
                                                    <div class="chat-profile-name">
                                                        <h6>Andrea Kearns<span>8:16 PM</span></h6>
                                                        <div class="chat-action-btns ms-3">
                                                            <div class="chat-action-col">
                                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                                    <a href="#"
                                                                        class="dropdown-item message-info-left">Message
                                                                        Info </a>
                                                                    <a href="#" class="dropdown-item">Reply</a>
                                                                    <a href="#" class="dropdown-item">React</a>
                                                                    <a href="#" class="dropdown-item">Forward</a>
                                                                    <a href="#" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-content review-files">
                                                        <div class="file-download d-flex align-items-center mb-0">
                                                            <div
                                                                class="file-type d-flex align-items-center justify-content-center me-2">
                                                                <i class="fa-solid fa-location-dot"></i>
                                                            </div>
                                                            <div class="file-details">
                                                                <span class="file-name">My Location</span>
                                                                <ul>
                                                                    <li><a href="javascript:void(0);">Download</a></li>
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="emoj-group">
                                                            <ul>
                                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                                            class="fa-regular fa-face-smile"></i></a>
                                                                    <div class="emoj-group-list">
                                                                      dd
                                                                    </div>
                                                                </li>
                                                                <li><a href="#" data-bs-toggle="modal"
                                                                        data-bs-target="#forward-message"><i
                                                                            class="fa-solid fa-share"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                  
                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="chat-avatar">
                                                    <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                        class="dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content">
                                                    <div class="chat-profile-name">
                                                        <h6>Andrea Kearns<span>8:16 PM</span></h6>
                                                        <div class="chat-action-btns ms-3">
                                                            <div class="chat-action-col">
                                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                                    <a href="#"
                                                                        class="dropdown-item message-info-left">Message
                                                                        Info </a>
                                                                    <a href="#" class="dropdown-item">Reply</a>
                                                                    <a href="#" class="dropdown-item">React</a>
                                                                    <a href="#" class="dropdown-item">Forward</a>
                                                                    <a href="#" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-content">
                                                        Thank you for your support
                                                        <div class="emoj-group">
                                                            <ul>
                                                                <li class="emoj-action"><a href="javascript:void(0);"><i
                                                                            class="fa-regular fa-face-smile"></i></a>
                                                                    <div class="emoj-group-list">
                                                                        <ul>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-01.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-02.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-03.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-04.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li><a href="javascript:void(0);"><img
                                                                                        src="assets/img/icons/emoj-icon-05.svg"
                                                                                        alt="Icon"></a></li>
                                                                            <li class="add-emoj"><a
                                                                                    href="javascript:void(0);"><i
                                                                                        class="bx bx-plus"></i></a></li>
                                                                        </ul>
                                                                    </div>
                                                                </li>
                                                                <li><a href="javascript:void(0);" data-bs-toggle="modal"
                                                                        data-bs-target="#forward-message"><i
                                                                            class="fa-solid fa-share"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chats">
                                                <div class="chat-avatar">
                                                    <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                        class="dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content chat-cont-type">
                                                    <div class="chat-profile-name chat-type-wrapper">
                                                        <p>Andrea Kearns Typing...</p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="chats forward-chat-msg">
                                                <div class="chat-avatar">
                                                    <img src="../assets/img/doctors-dashboard/doctor-profile-img.jpg"
                                                        class="dreams_chat" alt="image">
                                                </div>
                                                <div class="chat-content">
                                                    <div class="chat-profile-name">
                                                        <h6>Andrea Kearns<span>8:16 PM</span></h6>
                                                        <div class="chat-action-btns ms-3">
                                                            <div class="chat-action-col">
                                                                <a class="#" href="#" data-bs-toggle="dropdown">
                                                                    <i class="fa-solid fa-ellipsis"></i>
                                                                </a>
                                                                <div
                                                                    class="dropdown-menu chat-drop-menu dropdown-menu-end">
                                                                    <a href="#"
                                                                        class="dropdown-item message-info-left">Message
                                                                        Info </a>
                                                                    <a href="#" class="dropdown-item">Reply</a>
                                                                    <a href="#" class="dropdown-item">React</a>
                                                                    <a href="#" class="dropdown-item">Forward</a>
                                                                    <a href="#" class="dropdown-item">Delete</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="message-content">
                                                        Thank you for your support
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="chat-footer">
                                    <form>
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
                                            <a href="#" class="action-circle"><i
                                                    class="fa-regular fa-face-smile"></i></a>
                                            <div class="emoj-group-list-foot down-emoji-circle">
                                                <ul>
                                                    <li><a href="javascript:void(0);"><img
                                                                src="assets/img/icons/emoj-icon-01.svg" alt="Icon"></a>
                                                    </li>
                                                    <li><a href="javascript:void(0);"><img
                                                                src="assets/img/icons/emoj-icon-02.svg" alt="Icon"></a>
                                                    </li>
                                                    <li><a href="javascript:void(0);"><img
                                                                src="assets/img/icons/emoj-icon-03.svg" alt="Icon"></a>
                                                    </li>
                                                    <li><a href="javascript:void(0);"><img
                                                                src="assets/img/icons/emoj-icon-04.svg" alt="Icon"></a>
                                                    </li>
                                                    <li><a href="javascript:void(0);"><img
                                                                src="assets/img/icons/emoj-icon-05.svg" alt="Icon"></a>
                                                    </li>
                                                    <li class="add-emoj"><a href="javascript:void(0);"><i
                                                                class="fa-solid fa-plus"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        
                                        <input type="text" class="form-control chat_form"
                                            placeholder="Type your message here...">
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

@endsection