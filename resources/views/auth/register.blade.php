@extends('layouts.app')
@section('content')
    {{-- form wrapper --}}
    <div class="container py-16">
        <div class="max-w-lg mx-auto shadow px-6 py-7 rounded overflow-hidden">
            <h2 class="text-2xl uppercase font-medium mb-1">
                create an acocunt
            </h2>
            <p class="text-gray-600 mb-6 text-sm">
                Register here if you don't have account
            </p>
            <form method="POST">
                @csrf
                <div class="space-y-4">
                    <div>
                        <label for="name" class="text-gray-600 mb-2 block"> {{ __('global.full name')}} <span class="text-primary">*</span></label>
                        <input type="text" class="input-box" placeholder="John Doe" id="name" name="name" :value="old('name')" required />
                        @error('name')
                            <p class="text-danger text-sm m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="username" class="text-gray-600 mb-2 block">{{ __('global.username') }} <span class="text-primary">*</span></label>
                        <input id="username" type="text" class="input-box" placeholder="username" name="username" :value="old('username')" required />
                        @error('username')
                            <p class="text-danger text-sm m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="email" class="text-gray-600 mb-2 block">{{ __('global.email address') }} <span class="text-primary">*</span></label>
                        <input id="email" type="email" class="input-box" placeholder="example@mail.com" name="email" :value="old('email')" required />
                        @error('email')
                            <p class="text-danger text-sm m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password" class="text-gray-600 mb-2 block">{{ __('global.password') }} <span class="text-primary">*</span></label>
                        <input type="password" class="input-box" placeholder="type password" name="password" id="password" />
                        @error('password')
                            <p class="text-danger text-sm m-0">{{ $message }}</p>
                        @enderror
                    </div>
                    <div>
                        <label for="password_confirmation" class="text-gray-600 mb-2 block">{{ __('global.confirm password') }} <span class="text-primary">*</span></label>
                        <input type="password" class="input-box" placeholder="confirm your password" name="password_confirmation" id="password_confirmation" />
                        @error('password_confirmation')
                            <p class="text-danger text-sm m-0">{{ $message }}</p>
                        @enderror
                    </div>
                </div>
                <div class="flex items-center mt-6">
                    <input type="checkbox" id="agreement"
                        class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                    <label for="agreement" class="text-gray-600 ml-3 cursor-pointer">
                        I have read and agree to the
                        <a href="#" class="text-primary">terms & conditions</a>
                    </label>
                </div>
                <div class="mt-4">
                    <button type="submit"
                        class="block w-full py-2 text-center text-white bg-primary border border-primary rounded hover:bg-transparent hover:text-primary transition uppercase font-roboto font-medium">
                        create account
                    </button>
                </div>
            </form>
            {{-- login with social --}}
            <div class="mt-6 flex justify-center relative">
                <div class="absolute left-0 top-3 w-full border-b-2 border-gray-200"></div>
                <div class="text-gray-600 uppercase px-3 bg-white relative z-10">
                    OR SINGUP IN WITH
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
                Already have an account? <a href="{{ route('login') }}" class="text-primary">Login Now</a>
            </p>
        </div>
    </div>
    {{-- form wrapper end --}}
@endsection
