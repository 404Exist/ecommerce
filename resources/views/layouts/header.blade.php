{{-- header --}}
<header class="py-4 shadow-sm bg-pink-100 lg:bg-white">
    <div class="container flex items-center justify-between">
        {{-- logo --}}
        <a href="#" class="block w-32">
            <img src="{{ asset('images/logo.svg') }}" alt="logo" class="w-full">
        </a>
        {{-- logo end --}}

        {{-- searchbar --}}
        <div class="w-full xl:max-w-xl lg:max-w-lg lg:flex relative hidden">
            <span class="absolute left-4 top-3 text-lg text-gray-400">
                <i class="fa fa-search"></i>
            </span>
            <input type="text"
                class="pl-12 w-full border border-r-0 border-primary py-3 px-3 rounded-l-md outline-primary"
                placeholder="search">
            <button type="submit"
                class="bg-primary border border-primary text-white px-8 font-medium rounded-r-md hover:bg-transparent hover:text-primary transition">
                Search
            </button>
        </div>
        {{-- searchbar end --}}

        {{-- navicons --}}
        <div class="space-x-4 flex items-center">
            <a href="wishlist.html" class="block text-center text
            -gray-700 hover:text-primary transition relative">
                <span
                    class="absolute -right-0 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">5</span>
                <div class="text-2xl">
                    <i class="fa fa-heart-o"></i>
                </div>
                <div class="text-xs leading-3">Wish List</div>
            </a>
            <a href="cart.html"
                class="lg:block text-center text-gray-700 hover:text-primary transition hidden relative">
                <span
                    class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">3</span>
                <div class="text-2xl">
                    <i class="fa fa-shopping-bag"></i>
                </div>
                <div class="text-xs leading-3">Cart</div>
            </a>
            <a href="account.html" class="block text-center text-gray-700 hover:text-primary transition">
                <div class="text-2xl">
                    <i class="fa fa-user-o"></i>
                </div>
                <div class="text-xs leading-3">Account</div>
            </a>
        </div>
        {{-- navicons end --}}

    </div>
</header>
{{-- header end --}}
@include('layouts.menu')

{{-- @guest
    @if (Route::has('login'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
        </li>
    @endif

    @if (Route::has('register'))
        <li class="nav-item">
            <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
        </li>
    @endif
@else
    <li class="nav-item dropdown">
        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
            {{ Auth::user()->name }}
        </a>

        <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
            <a class="dropdown-item" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();">
                {{ __('Logout') }}
            </a>

            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </div>
    </li>
@endguest --}}
