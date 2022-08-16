@extends('layouts.app')
@section('content')
    {{-- form wrapper --}}
    <div class="container py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
            <h2 class="text-2xl uppercase font-medium mb-1">
                {{ __('global.verification') }}
            </h2>
            <p class="text-gray-600 mb-6">
                Before proceeding, please check your email for a verification link.
            </p>

                @if (session('status') == 'verification-link-sent')
                    <div class="mb-4 font-medium text-sm text-green-600">
                        {{ __('A new verification link has been sent to the email address you provided during registration.') }}
                    </div>
                @endif


            {{-- login with social --}}
            <div class="mt-6 flex justify-center relative">
                <div class="absolute left-0 top-3 w-full border-b-2 border-gray-200"></div>
                <div class="text-gray-600 uppercase px-3 bg-white relative z-10">
                    OR Resend Verification Email
                </div>
            </div>
            <div class="mt-4">
                <form action="{{ route('verification.resend') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="block w-1/2 mx-auto py-2 text-center text-white bg-blue-800 rounded uppercase font-roboto font-medium text-sm">
                        Resend
                    </button>
                </form>

            </div>

        </div>
    </div>
    {{-- form wrapper end --}}
@endsection
