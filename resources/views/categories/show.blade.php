@extends('layouts.app')
@section('content')
    {{-- breadcrum --}}
    <div class="container py-4 flex justify-between">
        <div class="flex gap-3 items-center">
            <a href="index.html" class="text-primary text-base">
                <i class="fa fa-home"></i>
            </a>
            <span class="text-sm text-gray-400"><i class="fa fa-chevron-right"></i></span>
            <p class="text-gray-600 font-medium">Shop</p>
        </div>
    </div>
    {{-- breadcrum end --}}

    {{-- shop wrapper --}}
    <shop-component></shop-component>
    {{-- shop wrapper end --}}
@endsection
