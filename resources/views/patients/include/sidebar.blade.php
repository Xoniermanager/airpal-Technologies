  <div class="profile-sidebar patient-sidebar profile-sidebar-new">
                            <div class="widget-profile pro-widget-content">
                                <div class="profile-info-widget">
                                    <a href="{{ route('patients.patient-settings.index') }}" class="booking-doc-img">
                                        <img src="../assets/img/doctors-dashboard/profile-06.jpg" alt="User Image">
                                    </a>
                                    <div class="profile-det-info">
                                        <h3><a href="{{ route('patients.patient-settings.index') }}">Hendrita</a></h3>
                                        <div class="patient-details">
                                            <h5 class="mb-0">Patient ID : PT254654</h5>
                                        </div>
                                        <span>Female <i class="fa-solid fa-circle"></i> 32 years 03 Months</span>
                                    </div>
                                </div>
                            </div>
                            <div class="dashboard-widget">
                                <nav class="dashboard-menu">
                                    <ul>
                                        <li>
                                            <a href="{{ route('patients.patient-dashboard.index') }}">
                                                <i class="fa-solid fa-shapes"></i>
                                                <span>Dashboard</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('patients.patient-appointments.index') }}">
                                                <i class="fa-solid fa-calendar-days"></i>
                                                <span>My Appointments</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('patients.favourites.index') }}">
                                                <i class="fa-solid fa-user-doctor"></i>
                                                <span>Favourites</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('patients.dependant.index') }}">
                                                <i class="fa-solid fa-user-plus"></i>
                                                <span>Dependents</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('patients.records.index') }}">
                                                <i class="fa-solid fa-money-bill-1"></i>
                                                <span>Add Medical Records</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('patients.patient-accounts.index') }}">
                                                <i class="fa-solid fa-file-contract"></i>
                                                <span>Accounts</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('patients.patient-invoices.index') }}">
                                                <i class="fa-solid fa-file-lines"></i>
                                                <span>Invoices</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('patients.patient-settings.index') }}">
                                                <i class="fa-solid fa-user-pen"></i>
                                                <span>Profile Settings</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('patients.medical.index') }}">
                                                <i class="fa-solid fa-shield-halved"></i>
                                                <span>Medical Details</span>
                                            </a>
                                        </li>
                                        <li class="">
                                            <a href="{{ route('patients.patient-password.index') }}">
                                                <i class="fa-solid fa-key"></i>
                                                <span>Change Password</span>
                                            </a>
                                        </li>
                                        <li>
                                            <a href="{{ route('login.index') }}">
                                                <i class="fa-solid fa-calendar-check"></i>
                                                <span>Logout</span>
                                            </a>
                                        </li>
                                    </ul>
                                </nav>
                            </div>
                        </div>