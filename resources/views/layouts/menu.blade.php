{{-- navbar --}}
<nav class="bg-gray-800 hidden lg:block">
    <div class="container">
        <div class="flex">

            {{-- all category --}}
            <div class="px-8 py-4 bg-primary flex items-center cursor-pointer group relative">
                <span class="text-white">
                    <i class="fa fa-bars"></i>
                </span>
                <span class="capitalize ml-2 text-white">All categories</span>

                <div class="absolute left-0 top-full w-full bg-white shadow-md py-3 invisible opacity-0 group-hover:opacity-100 group-hover:visible transition duration-300 z-50 divide-y divide-gray-300 divide-dashed">
                    {{-- @foreach ($categories as $category)
                        <a href="{{ $category->url }}" class="px-6 py-3 flex items-center hover:bg-gray-100 transition">
                            <img src="{{ $category->image }}" class="w-5 h-5 object-contain">
                            <span class="ml-6 text-gray-600 text-sm">{{ $category->title }}</span>
                        </a>
                    @endforeach --}}
                </div>
            </div>
            {{-- all category end --}}

            {{-- nav menu --}}
            <div class="flex items-center justify-between flex-grow pl-12">
                <div class="flex items-center space-x-6 text-base capitalize">
                    <a href="{{ route('home') }}" class="text-gray-200 hover:text-white transition">Home</a>
                    <a href="shop.html" class="text-gray-200 hover:text-white transition">Shop</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">About us</a>
                    <a href="#" class="text-gray-200 hover:text-white transition">Contact us</a>
                </div>
                <div class="text-gray-200 ml-auto justify-self-end ">
                    @auth
                        <a href="#" class="hover:text-white transition" onclick="document.getElementById('logout-form').submit();">
                            {{ __('global.logout') }}
                        </a>
                        <form method="POST" action="{{ route('logout') }}" class="hide" id="logout-form">
                            @csrf
                        </form>

                    @else
                        <a href="{{ route('login') }}" class="hover:text-white transition">
                            {{ __('global.login') }}
                        </a>
                        /
                        <a href="{{ route('register') }}" class="hover:text-white transition">
                            {{ __('global.register') }}
                        </a>
                   @endauth
                </div>
            </div>
            {{-- nav menu end --}}

        </div>
    </div>
</nav>
{{-- navbar end --}}

{{-- mobile menubar --}}
<div
    class="fixed w-full border-t border-gray-200 shadow-sm bg-white py-3 bottom-0 left-0 flex justify-around items-start px-6 lg:hidden z-40">
    <a href="javascript:void(0)" class="block text-center text-gray-700 hover:text-primary transition relative">
        <div class="text-2xl" id="menuBar">
            <i class="fa fa-bars"></i>
        </div>
        <div class="text-xs leading-3">Menu</div>
    </a>
    <a href="#" class="block text-center text-gray-700 hover:text-primary transition relative">
        <div class="text-2xl">
            <i class="fa fa-list-ul"></i>
        </div>
        <div class="text-xs leading-3">Category</div>
    </a>
    <a href="#" class="block text-center text-gray-700 hover:text-primary transition relative">
        <div class="text-2xl">
            <i class="fa fa-search"></i>
        </div>
        <div class="text-xs leading-3">Search</div>
    </a>
    <a href="cart.html" class="text-center text-gray-700 hover:text-primary transition relative">
        <span
            class="absolute -right-3 -top-1 w-5 h-5 rounded-full flex items-center justify-center bg-primary text-white text-xs">3</span>
        <div class="text-2xl">
            <i class="fa fa-shopping-bag"></i>
        </div>
        <div class="text-xs leading-3">Cart</div>
    </a>
</div>
{{-- mobile menu end --}}

{{-- mobile sidebar menu --}}
<div class="fixed left-0 top-0 w-full h-full z-50 bg-black bg-opacity-30 shadow hidden" id="mobileMenu">
    <div class="absolute left-0 top-0 w-72 h-full z-50 bg-white shadow">
        <div id="closeMenu"
            class="text-gray-400 hover:text-primary text-lg absolute right-3 top-3 cursor-pointer">
            <i class="fa fa-times"></i>
        </div>
        {{-- navlink --}}
        <h3 class="text-xl font-semibold text-gray-700 mb-1 font-roboto pl-4 pt-4">Menu</h3>
        <div class="">
            <a href="index.html" class="block px-4 py-2 font-medium transition hover:bg-gray-100">
                Home
            </a>
            <a href="shop.html" class="block px-4 py-2 font-medium transition hover:bg-gray-100">
                Shop
            </a>
            <a href="#" class="block px-4 py-2 font-medium transition hover:bg-gray-100">
                About Us
            </a>
            <roa href="#" class="block px-4 py-2 font-medium transition hover:bg-gray-100">
                Contact Us
            </roa>
        </div>
        {{-- navlinks end --}}
    </div>
</div>
{{-- mobile sidebar menu end --}}
