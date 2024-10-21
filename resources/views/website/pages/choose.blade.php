@extends('layouts.frontend.main')
@section('content')

<div class="container d-flex justify-content-center align-items-center vh-100">
    <div class="register-container text-center">
        <div class="register-title mb-4">
            Register For
        </div>
        <div class="row justify-content-center">
            <div class="col-md-6 mb-4">
                <div class="register-box p-4 border rounded shadow-sm">
                    <a href="{{ route('register.index') }}" class="text-decoration-none text-dark">
                        <i class="fa fa-user fa-3x mb-3"></i>
                        <h5>Register as Patient</h5>
                    </a>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <div class="register-box p-4 border rounded shadow-sm">
                    <a href="{{ route('doctor.register.index') }}" class="text-decoration-none text-dark">
                        <i class="fa fa-stethoscope fa-3x mb-3"></i>
                        <h5>Register as Doctor</h5>
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>


<style>
body {
    background-image: url('https://img.freepik.com/free-photo/blue-watercolor-stain-white-background_23-2147835864.jpg?t=st=1720166400~exp=1720170000~hmac=ab6c394438adaa520ddaa29029cfe72db0da5ec650b98f0544e75657b508836d&w=1060');
    background-size: cover;
    background-position: center;
    background-repeat: no-repeat;
    font-family: 'Arial', sans-serif;
}
.register-container {
    background-color: rgba(255, 255, 255, 0.9); /* Slight transparency to see background image */
    padding: 50px;
    border-radius: 10px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
}

.register-box {
    width: 220px;
    height: 220px;
    display: flex;
    align-items: center;
    justify-content: center;
    background-color: #ddf6fa;
    border: 2px solid #004cd4;
    border-radius: 10px;
    text-align: center;
    transition: all 0.3s ease;
    box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);
}

.register-box:hover {
    background-color: #004cd4;
    color: #fff;
    transform: translateY(-5px);
}

.register-box a {
    text-decoration: none;
    color: inherit;
    font-size: 1.3rem;
    font-weight: bold;
}

.register-box a:hover {

    color: white;

}

.register-title {
    text-align: center;
    margin-bottom: 40px;
    color: #004cd4;
    font-size: 2rem;
    font-weight: bold;
}
</style>