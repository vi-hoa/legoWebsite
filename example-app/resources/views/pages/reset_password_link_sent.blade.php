@extends('layouts.master')
@section('title', 'Password Reset Link Sent')
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Reset Password Link Sent') }}</div>

                    <div class="card-body">
                        <p>{{ __('We have sent you an email with a link to reset your password.') }}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
