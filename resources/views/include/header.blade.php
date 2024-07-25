<header class="header header-custom header-fixed header-one">
            <div class="container">
                <nav class="navbar navbar-expand-lg header-nav">
                    <div class="navbar-header">
                        <a id="mobile_btn" href="javascript:void(0);">
                            <span class="bar-icon">
                                <span></span>
                                <span></span>
                                <span></span>
                            </span>
                        </a>
                        <a href="{{ route('home.index') }}" class="navbar-brand logo">
                            <img src="http://127.0.0.1:8000/assets/img/logo.png" class="img-fluid" alt="Logo">
                        </a>
                    </div>
                    <div class="main-menu-wrapper">
                        <div class="menu-header">
                            <a href="{{ route('home.index') }}" class="menu-logo">
                                <img src="http://127.0.0.1:8000/assets/img/logo.png" class="img-fluid" alt="Logo">
                            </a>
                            <a id="menu_close" class="menu-close" href="javascript:void(0);">
                                <i class="fas fa-times"></i>
                            </a>
                        </div>
                        <ul class="main-nav">
                            <li class="active">
                                <a href="{{ route('home.index') }}">Home </a>

                            </li>
                            <li class="">
                                <a href="{{ route('doctors.index') }}">Doctors </a>
                            </li>
                            <li class="">
                                <a href="{{ route('instant.index') }}">Instant Consultation </a>
                            </li>
                            <li class="">
                                <a href="{{ route('health_monitoring.index') }}">Health Monitoring Device </a>
                            </li>

                            <li class="login-link"><a href="{{ url('login') }}">Login / Signup</a></li>
                            <li class="register-btn">
                                <a href="{{ route('register.index') }}" class="btn reg-btn"><i class="feather-user"></i>Register</a>
                            </li>
                            <li class="register-btn">
                                <a href="{{ route('patient.login.index') }}" class="btn btn-primary log-btn"><i
                                        class="feather-lock"></i>Login</a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </div>
 </header>