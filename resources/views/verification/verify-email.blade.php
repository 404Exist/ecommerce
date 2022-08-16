@php
$title = 'Verify Email';
$description = 'Verify Email';
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

                    <div class="mb-4 text-sm text-gray-600">
                        {{ __('Thanks for signing up! Before getting started, could you verify your email address by clicking on the link we just emailed to you? If you didn\'t receive the email, we will gladly send you another.') }}
                    </div>

                    @if (session('status') == 'verification-link-sent')
                        <div class="mb-4 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                        </div>
                    @endif

                    <div class="mt-4 flex items-center justify-between">
                        <form method="POST" action="{{ route('verification.resend') }}">
                            @csrf

                            <div>
                                <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                    {{ __('Resend Verification Email') }}
                                </button>
                            </div>
                        </form>

                        <form method="POST" action="{{ route('logout') }}">
                            @csrf

                            <button type="submit" class="underline text-sm text-gray-600 hover:text-gray-900">
                                {{ __('Log Out') }}
                            </button>
                        </form>
                    </div>
            </div>
        </div>
    </div>
    </div>
@endsection
