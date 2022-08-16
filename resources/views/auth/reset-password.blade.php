@php
$title = 'Reset Password';
$description = 'Reset Password';
@endphp
@extends('guest',[
'title'=>$title,
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
                    <div class="register-form mt-5 px-4">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-400">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf
                            <input type="hidden" name="token" value="{{ $request->route('token') }}">
                            @error('token')
                                <p class="text-danger text-sm m-0">{{ $message }}</p>
                            @enderror
                            <div class="form-group text-start mb-4">
                                <span>{{ __('Email') }}</span>
                                <label for="email"><i class="lni lni-envelope"></i></label>
                                <input class="form-control" id="email" type="email" placeholder="info@example.com"
                                    name="email" value="{{ old('email', $request->email) }}" required autofocus />
                                @error('email')
                                    <p class="text-danger text-sm m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group text-start mb-4">
                                <span>{{ __('Password') }}</span>
                                <label for="password"><i class="lni lni-lock"></i></label>
                                <input class="form-control" id="password" type="password" placeholder="**********"
                                    name="password" required autocomplete="new-password" />
                                @error('password')
                                    <p class="text-danger text-sm m-0">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group text-start mb-4">
                                <span>{{ __('Confirm Password') }}</span>
                                <label for="password_confirmation"><i class="lni lni-lock"></i></label>
                                <input class="form-control" id="password_confirmation" type="password"
                                    placeholder="**********" name="password_confirmation" required
                                    autocomplete="new-password" />
                                @error('password')
                                    <p class="text-danger text-sm m-0">{{ $message }}</p>
                                @enderror
                            </div>

                            <button class="btn btn-warning btn-lg w-100"
                                type="submit">{{ __('Reset Password') }}</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
