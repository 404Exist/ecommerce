@extends('layouts.app')
@section('content')
    {{-- breadcrum --}}
    <div class="container py-4 flex justify-between">
        <div class="flex gap-3 items-center">
            <a href="index.html" class="text-primary text-base">
                <i class="fa fa-home"></i>
            </a>
            <span class="text-sm text-gray-400"><i class="fa fa-chevron-right"></i></span>
            <p class="text-gray-600 font-medium">SHOP</p>
        </div>
    </div>
    {{-- breadcrum end --}}

    {{-- shop wrapper --}}
    <div class="container grid lg:grid-cols-4 gap-6 pt-4 pb-16 items-start relative">
        {{-- sidebar --}}
        <div
            class="col-span-1 bg-white px-4 pt-4 pb-6 shadow rounded overflow-hidden absolute lg:static left-4 top-16 z-10 w-72 lg:w-full lg:block">
            <div class="divide-gray-200 divide-y space-y-5 relative">
                {{-- brand filter --}}
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Categories</h3>
                    <div class="space-y-2">
                        @foreach ($brand->categories as $category)
                            {{-- single brand name --}}
                            <div class="flex items-center">
                                <input type="checkbox" id="Dominik"
                                    class="text-primary focus:ring-0 rounded-sm cursor-pointer">
                                <label for="Dominik" class="text-gray-600 ml-3 cursor-pointer">{{ $category->title }}</label>
                                <div class="ml-auto text-gray-600 text-sm">({{ $category->products->count() }})</div>
                            </div>
                            {{-- single brand name end --}}
                        @endforeach
                    </div>
                </div>
                {{-- brand filter end --}}
                {{-- price filter --}}
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">Price</h3>
                    <div class="mt-4 flex items-center">
                        <input type="text"
                            class="w-full border-gray-300 focus:ring-0 focus:border-primary px-3 py-1 text-gray-600 text-sm shadow-sm rounded"
                            placeholder="min">
                        <span class="mx-3 text-gray-500">-</span>
                        <input type="text"
                            class="w-full border-gray-300 focus:ring-0 focus:border-primary px-3 py-1 text-gray-600 text-sm shadow-sm rounded"
                            placeholder="mix">
                    </div>
                </div>
                {{-- price filter end --}}
                {{-- size filter --}}
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">size</h3>
                    <div class="flex items-center gap-2">
                        {{-- single size --}}
                        <div class="size-selector">
                            <input type="radio" name="size" class="hidden" id="size-xs">
                            <label for="size-xs"
                                class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                                XS
                            </label>
                        </div>
                        {{-- single size end --}}
                        {{-- single size --}}
                        <div class="size-selector">
                            <input type="radio" name="size" class="hidden" id="size-s">
                            <label for="size-s"
                                class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                                S
                            </label>
                        </div>
                        {{-- single size end --}}
                        {{-- single size --}}
                        <div class="size-selector">
                            <input type="radio" name="size" class="hidden" id="size-m" checked>
                            <label for="size-m"
                                class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                                M
                            </label>
                        </div>
                        {{-- single size end --}}
                        {{-- single size --}}
                        <div class="size-selector">
                            <input type="radio" name="size" class="hidden" id="size-l">
                            <label for="size-l"
                                class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                                L
                            </label>
                        </div>
                        {{-- single size end --}}
                        {{-- single size --}}
                        <div class="size-selector">
                            <input type="radio" name="size" class="hidden" id="size-xl">
                            <label for="size-xl"
                                class="text-xs border border-gray-200 rounded-sm h-6 w-6 flex items-center justify-center cursor-pointer shadow-sm text-gray-600">
                                XL
                            </label>
                        </div>
                        {{-- single size end --}}
                    </div>
                </div>
                {{-- size filter end --}}
                {{-- color filter --}}
                <div class="pt-4">
                    <h3 class="text-xl text-gray-800 mb-3 uppercase font-medium">color</h3>
                    <div class="flex items-center gap-2">
                        {{-- single color --}}
                        <div class="color-selector">
                            <input type="radio" name="color" class="hidden" id="color-red" checked>
                            <label for="color-red" style="background-color : #fc3d57"
                                class="text-xs border border-gray-200 rounded-sm h-5 w-5 flex items-center justify-center cursor-pointer shadow-sm">
                            </label>
                        </div>
                        {{-- single color end --}}
                        {{-- single color --}}
                        <div class="color-selector">
                            <input type="radio" name="color" class="hidden" id="color-white">
                            <label for="color-white" style="background-color : #fff"
                                class="text-xs border border-gray-200 rounded-sm h-5 w-5 flex items-center justify-center cursor-pointer shadow-sm">
                            </label>
                        </div>
                        {{-- single color end --}}
                        {{-- single color --}}
                        <div class="color-selector">
                            <input type="radio" name="color" class="hidden" id="color-black">
                            <label for="color-black" style="background-color : #000"
                                class="text-xs border border-gray-200 rounded-sm h-5 w-5 flex items-center justify-center cursor-pointer shadow-sm">
                            </label>
                        </div>
                        {{-- single color end --}}
                    </div>
                </div>
                {{-- color filter end --}}
            </div>
        </div>
        {{-- sidebar end --}}

        {{-- products --}}
        <div class="col-span-3">
            {{-- sorting --}}
            <div class="mb-4 flex items-center">
                <button ="showFilter=!showFilter"
                    class="bg-primary border border-primary text-white px-10 py-3 font-medium rounded uppercase hover:bg-transparent hover:text-primary transition lg:hidden text-sm mr-3 focus:outline-none">
                    Filter
                </button>
                <select
                    class="w-44 text-sm text-gray-600 px-4 py-3 border-gray-300 shadow-sm rounded focus:ring-primary focus:border-primary">
                    <option>Default sorting</option>
                    <option>Price low-high</option>
                    <option>Price high-low</option>
                    <option>Latest product</option>
                </select>
                <div class="flex gap-2 ml-auto">
                    <div
                        class="border border-primary w-10 h-9 flex items-center justify-center text-white bg-primary rounded cursor-pointer">
                        <i class="fa fa-th"></i>
                    </div>
                    <div
                        class="border border-gray-300 w-10 h-9 flex items-center justify-center text-gray-600 rounded cursor-pointer">
                        <i class="fa fa-list"></i>
                    </div>
                </div>
            </div>
            {{-- sorting end --}}
            {{-- product wrapper --}}
            <div class="grid lg:grid-cols-2 xl:grid-cols-3 sm:grid-cols-2 gap-6">
                @foreach ($products as $product)
                    {{-- single product --}}
                    <div class="group rounded bg-white shadow overflow-hidden">
                        {{-- product image --}}
                        <div class="relative">
                            <img src="{{ $product->image }}" class="w-full">
                            <div
                                class="absolute inset-0 bg-black bg-opacity-40 flex items-center justify-center gap-2 opacity-0 group-hover:opacity-100 transition">
                                <a href="{{ $product->url }}"
                                    class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center">
                                    <i class="fa fa-search"></i>
                                </a>
                                <a href="#"
                                    class="text-white text-lg w-9 h-9 rounded-full bg-primary hover:bg-gray-800 transition flex items-center justify-center">
                                    <i class="fa fa-heart"></i>
                                </a>
                            </div>
                        </div>
                        {{-- product image end --}}
                        {{-- product content --}}
                        <div class="pt-4 pb-3 px-4">
                            <a href="{{ $product->url }}">
                                <h4 class="uppercase font-medium text-xl mb-2 text-gray-800 hover:text-primary transition">
                                    {{ $product->title }}
                                </h4>
                            </a>
                            <div class="flex items-baseline mb-1 space-x-2">
                                <p class="text-xl text-primary font-roboto font-semibold">{{ $product->price }}</p>
                                <p class="text-sm text-gray-400 font-roboto line-through">{{ $product->oldPrice }}</p>
                            </div>
                            <div class="flex items-center">
                                <div class="flex gap-1 text-sm text-yellow-400">
                                    {!! $product->starsView !!}
                                </div>
                                <div class="text-xs text-gray-500 ml-3">({{ $product->reviews->count() }})</div>
                            </div>
                        </div>
                        {{-- product content end --}}
                        {{-- product button --}}
                        <a href="#"
                            class="block w-full py-1 text-center text-white bg-primary border border-primary rounded-b hover:bg-transparent hover:text-primary transition">
                            Add to Cart
                        </a>
                        {{-- product button end --}}
                    </div>
                    {{-- single product end --}}
                @endforeach
            </div>
            {{-- product wrapper end --}}
        </div>
        {{-- products end --}}
    </div>
    {{-- shop wrapper end --}}
@endsection
