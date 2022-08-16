@extends('layouts.app')
@section('content')
    {{-- form wrapper --}}
    <div class="container py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
            <h2 class="text-2xl uppercase font-medium mb-1">
                {{ __('global.login') }}
            </h2>
            <p class="text-gray-600 mb-6 text-sm">
                Login if you are a returing customer
            </p>
            <form method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="email" class="text-gray-600 mb-2 block">{{ __('global.Email / Username') }} <span class="text-primary">*</span></label>
                        <input id="email" type="text" class="input-box" placeholder="username / example@mail.com"
                            name="email" :value="old('email') ?: old('username')" required />
                        @error('email')
                            <p class="text-danger text-sm m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="text-gray-600 mb-2 block">{{ __('global.password') }} <span class="text-primary">*</span></label>
                        <input id="password" type="password" class="input-box" placeholder="type password" name="password" required />
                        @error('password')
                            <p class="text-danger text-sm m-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center justify-between mt-6">
                    <div class="flex items-center">
                        <input type="checkbox" id="remember_me" class="text-primary focus:ring-0 rounded-sm cursor-pointer" name="remember" />
                        <label for="remember_me" class="text-gray-600 ml-3 cursor-pointer">
                            {{ __('global.remember me') }}
                        </label>
                    </div>
                    <a href="#" class="text-primary">Forgot Password?</a>
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">
                        {{ __('global.login') }}
                    </button>
                </div>
            </form>

            {{-- login with social --}}
            <div class="mt-6 flex justify-center relative">
                <div class="absolute left-0 top-3 w-full border-b-2 border-gray-200"></div>
                <div class="text-gray-600 uppercase px-3 bg-white relative z-10">
                    OR LOGIN IN WITH
                </div>
            </div>
            <div class="mt-4 flex gap-4">
                <a href="#"
                    class="block w-1/2 py-2 text-center text-white bg-blue-800 rounded uppercase font-roboto font-medium text-sm">
                    Facebook
                </a>
                <a href="/oauth/google/redirect"
                    class="block w-1/2 py-2 text-center text-white bg-yellow-600 rounded uppercase font-roboto font-medium text-sm">
                    Google
                </a>
            </div>
            {{-- login with social end --}}

            <p class="mt-4 text-gray-600 text-center">
                Don't have an account? <a href="{{ route('register') }}" class="text-primary">Register Now</a>
            </p>
        </div>
    </div>
    {{-- form wrapper end --}}
@endsection
