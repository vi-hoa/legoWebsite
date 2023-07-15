<style>
    .login-page {
        min-height: 100vh;
        /* background: #f5f5f5; */
        background-image: url(https://thumbs.dreamstime.com/b/vibrant-meccano-puzzle-kit-set-light-white-paper-backdrop-freehand-line-dark-black-color-ink-hand-drawn-design-object-logo-152473486.jpg);

        display: flex;
        justify-content: center;
        align-items: center;
    }
    .login-page .login-form-box {
        background: #fff;
        border-radius: 10px;
        padding: 30px;
        width: 500px;
        max-width: 100%;
        box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
    }
    .login-title {
        font-size: 30px;
        font-weight: 600;
        text-align: center;
        margin-bottom: 30px;
        color: #9681EB;
        text-shadow: -1px -1px 0 #000, 1px -1px 0 #000, -1px 1px 0 #000, 1px 1px 0 #000;

    }
    .filed {
        margin-bottom: 25px;
        font-family:Arial, Helvetica, sans-serif;
        font-weight: bold;
    }
    .filed a {
        text-align: center;
        margin-right: 100px;
    }
    .filed input {
        width: 100%;
        padding: 10px 15px;
        border-radius: 200px;
        border: 1px solid #55afd5;
    }
    .filed button {
        background: rgb(71, 184, 221);
        color: #fff;
        width: 100%;
        text-align: center;
        font-family:'Times New Roman', Times, serif;
        height: 40px;
        border-radius: 200px;
        cursor: pointer;
    }
    .filed button:hover {
        background: #13698e;
    }
</style>

@extends('layouts.master')
@section('title', 'Register Page')
@section('content')
    <section class="login-page">
        <div class="login-form-box">
            <div class="login-title">Welcome To Register Page</div>
            <div class="login-form">
                <form action="{{route('register')}}" method="post">
                    @csrf
                    <div class="filed">
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" class="@error('name') has-error @enderror" placeholder="Enter your name...">
                        @error('name')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="filed">
                        <label for="email">Email</label>
                        <input type="email" id="email" name="email" class="@error('email') has-error @enderror" placeholder="Enter your email...">
                        @error('email')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="filed">
                        <label for="name">Password</label>
                        <input type="password" id="password" name="password" class="@error('password') has-error @enderror" placeholder="Enter your password...">
                        @error('password')
                            <span class="field-error">{{$message}}</span>
                        @enderror
                    </div>
                    <div class="filed">
                        <label for="password_confirmation">Confirm Password</label>
                        <input type="password" id="password" name="password_confirmation" placeholder=".............">
                    </div>
                    <div class="filed">
                        <button type="submit" class="btn btn-primary btn-block">Register Now</button>
                    </div>
                    <div class="filed">
                        <a href="{{route('login')}}">Already a User? Login Now!</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
    @include('pages.components.footer')
@endsection