@extends('layouts.app')
@section('content')
    {{-- breadcrum --}}
    <div class="py-4 container flex gap-3 items-center">
        <a href="{{ route('home') }}" class="text-primary text-base">
            <i class="fa fa-home"></i>
        </a>
        <span class="text-sm text-gray-400"><i class="fa fa-chevron-right"></i></span>
        <a href="{{ route('home') }}" class="text-primary text-base font-medium uppercase">
            Shop
        </a>
        <span class="text-sm text-gray-400"><i class="fa fa-chevron-right"></i></span>
        <a href="{{ $product->category->url }}" class="text-primary text-base font-medium uppercase">
            {{ $product->category->title }}
        </a>
        <span class="text-sm text-gray-400"><i class="fa fa-chevron-right"></i></span>
        <p class="text-gray-600 font-medium uppercase">{{ $product->title }}</p>
    </div>
    {{-- breadcrum end --}}

    {{-- product view --}}
    <div class="container pt-4 pb-6 grid lg:grid-cols-2 gap-6">
        {{-- product image --}}
        <div>
            <div>
                <img id="main-img" src="{{ $product->image }}" class="w-full">
            </div>
            <div class="grid grid-cols-5 gap-4 mt-4">
                <div>
                    <img src="{{ $product->image }}" class="single-img w-full cursor-pointer border border-primary">
                </div>
                @foreach ($product->images as $image)
                    <div>
                        <img src="{{ $image->url }}" class="single-img w-full cursor-pointer border">
                    </div>
                @endforeach
            </div>
        </div>
        {{-- product image end --}}
        {{-- product content --}}
        <div>
            <h2 class="md:text-3xl text-2xl font-medium uppercase mb-2">{{ $product->title }}</h2>
            <div class="flex items-center mb-4">
                <div class="flex gap-1 text-sm text-yellow-400">
                    {!! $product->starsView !!}
                </div>
                <div class="text-xs text-gray-500 ml-3">({{ $product->reviews->count() }} Reviews)</div>
            </div>
            <div class="space-y-2">
                <p class="text-gray-800 font-semibold space-x-2">
                    <span>Availability: </span>
                    @if ($product->isInStock)
                    <span class="text-green-600">In Stock</span>
                    @else
                    <span class="text-primary">Out of Stock</span>
                    @endif
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Brand: </span>
                    <span class="text-gray-600">{{ $product->brand->title }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">Category: </span>
                    <span class="text-gray-600">{{ $product->category->title }}</span>
                </p>
                <p class="space-x-2">
                    <span class="text-gray-800 font-semibold">SKU: </span>
                    <span class="text-gray-600">{{ $product->sku }}</span>
                </p>
            </div>
            <div class="mt-4 flex items-baseline gap-3">
                <span class="text-primary font-semibold text-xl">{{ $product->price }}</span>
                <span class="text-gray-500 text-base line-through">{{ $product->oldPrice }}</span>
            </div>
            <p class="mt-4 text-gray-600">
                {{ $product->short_description }}
            </p>
            {{-- size --}}
            <div class="mt-4">
                <h3 class="text-base text-gray-800 mb-1">Size</h3>
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
            {{-- size end --}}
            {{-- color --}}
            <div class="mt-4">
                <h3 class="text-base text-gray-800 mb-1">Color</h3>
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
            {{-- color end --}}
            {{-- quantity --}}
            <div class="mt-4">
                <h3 class="text-base text-gray-800 mb-1">Quantity</h3>
                <div class="flex border border-gray-300 text-gray-600 divide-x divide-gray-300 w-max">
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">-</div>
                    <div class="h-8 w-10 flex items-center justify-center">4</div>
                    <div class="h-8 w-8 text-xl flex items-center justify-center cursor-pointer select-none">+</div>
                </div>
            </div>
            {{-- color end --}}
            {{-- add to cart button --}}
            <div class="flex gap-3 border-b border-gray-200 pb-5 mt-6">
                <a href="#" class="bg-primary border border-primary text-white px-8 py-2 font-medium rounded uppercase
                    hover:bg-transparent hover:text-primary transition text-sm flex items-center">
                    <span class="mr-2"><i class="fa fa-shopping-bag"></i></span> Add to cart
                </a>
                <a href="#" class="border border-gray-300 text-gray-600 px-8 py-2 font-medium rounded uppercase
                    hover:bg-transparent hover:text-primary transition text-sm">
                    <span class="mr-2"><i class="fa fa-heart"></i></span> Wishlist
                </a>
            </div>
            {{-- add to cart button end --}}
            {{-- product share icons --}}
            <div class="flex space-x-3 mt-4">
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa fa-facebook-f"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa fa-twitter"></i>
                </a>
                <a href="#"
                    class="text-gray-400 hover:text-gray-500 h-8 w-8 rounded-full border border-gray-300 flex items-center justify-center">
                    <i class="fa fa-instagram"></i>
                </a>
            </div>
            {{-- product share icons end --}}
        </div>
        {{-- product content end --}}
    </div>
    {{-- product view end --}}

    {{-- product details and review --}}
    <div class="container pb-16">
        {{-- detail buttons --}}
        <h3 class="border-b border-gray-200 font-roboto text-gray-800 pb-3 font-medium">
            Product Details
        </h3>
        {{-- details button end --}}

        {{-- details content --}}
        <div class="lg:w-4/5 xl:w-3/5 pt-6">
            <div class="space-y-3 text-gray-600">
                {{ $product->description }}
            </div>
            {{-- details table --}}
            <table class="table-auto border-collapse w-full text-left text-gray-600 text-sm mt-6">
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Color</th>
                    <td class="py-2 px-4 border border-gray-300">Black, Brown, Red</td>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Material</th>
                    <td class="py-2 px-4 border border-gray-300">Artificial Leather</td>
                </tr>
                <tr>
                    <th class="py-2 px-4 border border-gray-300 w-40 font-medium">Weight</th>
                    <td class="py-2 px-4 border border-gray-300">55kg</td>
                </tr>
            </table>
            {{-- details table --}}
        </div>
        {{-- details content end --}}
    </div>
    {{-- product details and review end --}}

    {{-- related products --}}
    <div class="container pb-16">
        <h2 class="text-2xl md:text-3xl font-medium text-gray-800 uppercase mb-6">related products</h2>
        {{-- product wrapper --}}
        <div class="grid lg:grid-cols-4 sm:grid-cols-2 gap-6">
            @foreach ($product->related()->limit(4)->get() as $product)
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
                            <p class="text-sm text-gray-400 font-roboto ">{!! $product->oldPrice !!}</p>
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
    {{-- related products end --}}
@endsection

@push('js')
<script>
    let mainImg = document.getElementById('main-img')
    let imgBars = document.getElementsByClassName('single-img')

    for(let imgBar of imgBars){
        imgBar.addEventListener('click', function(){
            clearActive()
            let imgPath = this.getAttribute('src')
            mainImg.setAttribute('src', imgPath)
            this.classList.add('border-primary')
        })
    }

    function clearActive(){
        for(let imgBar of imgBars){
            imgBar.classList.remove('border-primary')
        }
    }
</script>
@endpush

