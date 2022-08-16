@php
$title = 'Forgot Password';
$description = 'Forgot Password';
@endphp
@extends('guest',[
'title'=> $title,
'description'=>$description
])

@section('content')
    <div class="login-wrapper d-flex align-items-center justify-content-center text-center">
        {{-- Background Shape --}}
        <div class="background-shape"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                    <img class="big-logo" src="{{ web_asset('img/core-img/logo-white.png') }}" alt="">
                    {{-- Register Form --}}
                    @if (session('status'))
                        <div class="mb-4 font-medium text-sm text-green-400">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="bg-gray-800 register-form mt-4 p-4 rounded">
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf
                            <div class="mb-1 text-sm text-gray-300">
                                {{ __('Forgot your password? No problem. Just let us know your email address and we will email you a password reset link that will allow you to choose a new one.') }}
                            </div>
                            <div class="form-group text-start mb-4">
                                <span>{{ __('Email') }}</span>
                                <label for="email"><i class="lni lni-envelope"></i></label>
                                <input class="form-control" id="email" type="email" placeholder="info@example.com"
                                    name="email" :value="old('email')" required autofocus />
                                @error('email')
                                    <p class="text-danger text-sm m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <button class="btn btn-warning btn-lg w-100"
                                type="submit">{{ __('Email Password Reset Link') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
