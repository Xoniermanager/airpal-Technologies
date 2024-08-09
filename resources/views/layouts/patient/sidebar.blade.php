<div class="profile-sidebar patient-sidebar profile-sidebar-new">
    <div class="widget-profile pro-widget-content">
        <div class="profile-info-widget">
            <a href="{{ route('patient-settings.index') }}" class="booking-doc-img previewProfile">
                <img src="{{ auth()->user()->image_url }}" id="blah">
                {{-- <img src="../assets/img/doctors-dashboard/profile-06.jpg" alt=""> --}}
            </a>
            <div class="profile-det-info">
                <h3><a href="{{ route('patient-settings.index') }}">{{ auth()->user()->fullName }}</a></h3>

                <span>{{ auth()->user()->gender ?? ''}} <i class="fa-solid fa-circle"></i> Age: {{ auth()->user()->getAgeAttribute ?? ''}} year</span>
            </div>
        </div>
    </div>
    <div class="dashboard-widget">
        <nav class="dashboard-menu">
            <ul>
                <li  class="{{ request()->routeIs('patient-dashboard.index') ? 'active' : '' }}">
                    <a href="{{ route('patient-dashboard.index') }}">
                        <i class="fa-solid fa-shapes"></i>
                        <span>Dashboard</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('patient-appointments.index') ? 'active' : '' }}">
                    <a href="{{ route('patient-appointments.index') }}">
                        <i class="fa-solid fa-calendar-days"></i>
                        <span>My Appointments</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('patient.favorite.index') ? 'active' : '' }}">
                    <a href="{{ route('patient.favorite.index')}}">
                        <i class="fa-solid fa-user-doctor"></i>
                        <span>Favourites</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('patient.dependant.index') ? 'active' : '' }}">
                    <a href="{{ route('patient.dependant.index')}}">
                        <i class="fa-solid fa-user-plus"></i>
                        <span>Dependants</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('patient.medical-records.index') ? 'active' : '' }}">
                    <a href="patient.medical-records.index">
                        <i class="fa-solid fa-money-bill-1"></i>
                        <span>Add Medical Records</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('get.all.review') ? 'active' : '' }}">
                    <a href="{{ route('get.all.review') }}">
                        <i class="fa-solid fa-key"></i>
                        <span>My Rating</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('patient-accounts.index') ? 'active' : '' }}">
                    <a href="{{ route('patient-accounts.index') }}">
                        <i class="fa-solid fa-file-contract"></i>
                        <span>Accounts</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('patient-invoices.index') ? 'active' : '' }}">
                    <a href="{{ route('patient-invoices.index') }}">
                        <i class="fa-solid fa-file-lines"></i>
                        <span>Invoices</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('patient.medical-details.index') ? 'active' : '' }}">
                    <a href="{{ route('patient.medical-details.index')}}">
                        <i class="fa-solid fa-shield-halved"></i>
                        <span>Medical Details</span>
                    </a>
                </li>
                <li class="{{ request()->routeIs('patient-settings.index') ? 'active' : '' }}">
                    <a href="{{ route('patient-settings.index') }}">
                        <i class="fa-solid fa-user-pen"></i>
                        <span>Profile Settings</span>
                    </a>
                </li>
                <li>
                    <a href="change-password.html">
                        <i class="fa-solid fa-key"></i>
                        <span>Change Password</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('get.all.review') }}">
                        <i class="fa-solid fa-key"></i>
                        <span>My Rating</span>
                    </a>
                </li>
                <li>
                    <a href="{{ route('patient.diary.index') }}">
                        <i class="fa-solid fa-key"></i>
                        <span>Patient Diary</span>
                    </a>
                </li>
                <li>
                <li class="{{ request()->routeIs('patient.logout') ? 'active' : '' }}">
                    <a href="{{ route('patient.logout') }}">
                        <i class="fa-solid fa-calendar-check"></i>
                        <span>Logout</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</div>
