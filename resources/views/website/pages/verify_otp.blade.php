@extends('layouts.frontend.main')
@section('content')
    <div class="breadcrumb-bar-two">
        <div class="container">
            <div class="row align-items-center inner-banner">
                <div class="col-md-12 col-12 text-center">
                    <h2 class="breadcrumb-title">About Us</h2>
                    <nav aria-label="breadcrumb" class="page-breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('home.index') }}">Home</a></li>
                            <li class="breadcrumb-item" aria-current="page">About Us</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="ctnclas ctnclas mt-5 mb-5">
        <h1>OTP Verification</h1>
        <p>Enter the OTP you received to <span style="color:#004cd4;font-weight:600">{{ $credentials['email'] ?? '' }}</span></p>
        <div class="otp-input">
            <input type="number" min="0" max="9" required>
            <input type="number" min="0" max="9" required>
            <input type="number" min="0" max="9" required>
            <input type="number" min="0" max="9" required>
        </div>
        <input type="hidden" id="email" value="{{ $credentials['email'] ?? '' }}">
        <input type="hidden" id="password" value="{{ $credentials['password'] ?? '' }}">

        <button onclick="verifyOTP()">Verify</button>
        <div class="resend-text">
            Didn't receive the code?
            <span class="resend-link" onclick="resendOTP()">Resend Code</span>
            <span id="timer"></span>
        </div>
    </div>
@endsection

@section('javascript')
    <script>
        const inputs = document.querySelectorAll('.otp-input input');
        const timerDisplay = document.getElementById('timer');
        const resendLink = document.querySelector('.resend-link');
        // const emailSpan = document.getElementById('email');
        let timeLeft = 120; // 2 minutes in seconds
        let timerId;
        let canResend = true;

        function startTimer() {
            timerId = setInterval(() => {
                if (timeLeft <= 0) {
                    clearInterval(timerId);
                    timerDisplay.textContent = "Code expired";
                    timerDisplay.classList.add('expired');
                    inputs.forEach(input => input.disabled = true);
                    canResend = false;
                } else {
                    const minutes = Math.floor(timeLeft / 60);
                    const seconds = timeLeft % 60;
                    timerDisplay.textContent = `(${minutes}:${seconds.toString().padStart(2, '0')})`;
                    timeLeft--;
                }
            }, 1000);
        }

        function resendOTP() {
            if (!canResend) {
                timeLeft = 120;
                inputs.forEach(input => {
                    input.value = '';
                    input.disabled = false;
                });
                inputs[0].focus();
                clearInterval(timerId);
                timerDisplay.classList.remove('expired');
                startTimer();
                email = $('#email').val();
                password = $('#password').val();
                $.ajax({
                        type: "post",
                        url: "{{ route('resend.otp') }}",
                        data: {
                            email: email,
                            password: password,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            if (response.success == true) {
                                swal.fire("Done!", response.message, "success");
                            } else {
                                swal.fire('Error!', "Invalid Otp", 'error');
                            }
                        }
                    });

            } 
        }

        inputs.forEach((input, index) => {
            input.addEventListener('input', (e) => {
                if (e.target.value.length > 1) {
                    e.target.value = e.target.value.slice(0, 1);
                }
                if (e.target.value.length === 1) {
                    if (index < inputs.length - 1) {
                        inputs[index + 1].focus();
                    }
                }
            });

            input.addEventListener('keydown', (e) => {
                if (e.key === 'Backspace' && !e.target.value) {
                    if (index > 0) {
                        inputs[index - 1].focus();
                    }
                }
                if (e.key === 'e') {
                    e.preventDefault();
                }
            });
        });

        function verifyOTP() {
            const otp = Array.from(inputs).map(input => input.value).join('');
            if (otp.length === 4) {
                if (timeLeft > 0) {
                    email = $('#email').val();
                    password = $('#password').val();
                    $.ajax({
                        type: "post",
                        url: "{{ route('verify.otp') }}",
                        data: {
                            otp: otp,
                            email: email,
                            password: password,
                            _token: '{{ csrf_token() }}'
                        },
                        success: function(response) {
                            let url = response.redirectUrl; // Assuming 'url' is part of the response object
                            console.log(response);

                            if (response.success == true) {
                                swal.fire("Done!", response.message, "success").then(() => {
                                    window.location.href = url;
                                });
                            } else {
                                swal.fire('Error!', "Invalid Otp", 'error');
                            }
                        }
                    });

                } else {
                    swal.fire('Error!', 'OTP has expired. Please request a new one.', 'error');

                }
            } else {
                swal.fire('Error!', 'Please enter a 4-digit OTP', 'error');
            }
        }

        startTimer();
    </script>
@endsection

<style>
    @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap');

    .ctnclas {
        margin: auto;
        /* background-color: rgba(30, 30, 30, 0.8); */
        padding: 3rem;
        border-radius: 16px;
        box-shadow: 0 8px 32px rgba(0, 0, 0, 0.3);
        text-align: center;
        backdrop-filter: blur(10px);
        border: 1px solid rgba(255, 255, 255, 0.1);
        max-width: 400px;
        text-align: center;
        width: 100%;
    }

    h1 {
        margin-bottom: 1.5rem;
        color: #ffffff;
        font-weight: 600;
        font-size: 2rem;
    }

    p {
        margin-bottom: 2rem;
        color: #b0b0b0;
        font-weight: 300;
    }

    .otp-input {
        display: flex;
        justify-content: center;
        margin-bottom: 2rem;
    }

    .otp-input input {
        width: 50px;
        height: 50px;
        margin: 0 8px;
        text-align: center;
        font-size: 1.5rem;
        border: 2px solid #004cd4;
        border-radius: 12px;
        color: rgba(42, 42, 42, 0.8);
        transition: all 0.3s ease;
    }

    .otp-input input:focus {
        border-color: #004cd4;
        box-shadow: 0 0 0 2px rgba(166, 86, 246, 0.3);
        outline: none;
    }

    .otp-input input::-webkit-outer-spin-button,
    .otp-input input::-webkit-inner-spin-button {
        -webkit-appearance: none;
        margin: 0;
    }

    .otp-input input[type=number] {
        -moz-appearance: textfield;
    }

    button {
        background: #004cd4;
        color: white;
        border: 2px solid #004cd4;
        padding: 12px 24px;
        font-size: 1rem;
        border-radius: 8px;
        cursor: pointer;
        margin: 5px;
        transition: all 0.3s ease;
        font-weight: 500;
        letter-spacing: 0.5px;
    }

    button:hover {
        background: linear-gradient(135deg, #A556F6, #6665F1);
        transform: translateY(-2px);
        box-shadow: 0 4px 8px rgba(166, 86, 246, 0.3);
    }

    button:disabled {
        background: #cccccc;
        border-color: #999999;
        color: #666666;
        cursor: not-allowed;
        transform: none;
        box-shadow: none;
    }

    #timer {
        font-size: 1rem;
        color: #004cd4;
        font-weight: 500;
        margin-left: 10px;
    }

    @keyframes pulse {
        0% {
            opacity: 1;
        }

        50% {
            opacity: 0.5;
        }

        100% {
            opacity: 1;
        }
    }

    .expired {
        animation: pulse 2s infinite;
        color: #ff4444;
    }

    .resend-text {
        margin-top: 1rem;
        font-size: 0.9rem;
        color: #b0b0b0;
    }

    .resend-link {
        color: #6665F1;
        text-decoration: none;
        cursor: pointer;
        transition: color 0.3s ease;
    }

    .resend-link:hover {
        color: #A556F6;
        text-decoration: underline;
    }

    #email {
        color: #A556F6;
        font-weight: 500;
    }
</style>
