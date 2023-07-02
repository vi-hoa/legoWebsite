<style>
    .login-page {
        min-height: 100vh;
        background: #c1671d;
        opacity: 1;
        display: flex;
        justify-content: center;
        align-items: center;
        border-radius: 25% 25% 25% 25%;
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
        color: purple;
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
@section('title', 'Login Page')
@section('content')
    <section class="login-page">
        <div class="login-form-box">
            <div class="login-title">Welcome To Login Page</div>
            <div class="login-form">
                <form action="{{route('login')}}" method="post"> 
                    @csrf
                    
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
                        <button type="submit" class="btn btn-primary btn-block">Login</button>
                    </div>
                    <div class="filed">
                        <a href="{{route('register')}}">New User? Register Now!</a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection