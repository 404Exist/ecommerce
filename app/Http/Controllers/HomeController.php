<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Contracts\View\View;

class HomeController extends Controller
{
    public const MONTH_IN_SECONDS = 2592000;

    public function index(): View
    {
        $product = Product::first();
        $categories = cache()->remember('categories', self::MONTH_IN_SECONDS, fn () => Category::all());
        $topNewArrivalProducts = Product::published()->newest()->take(4)->get();
        $recommendedProducts = Product::published()->newest()->take(8)->orderByRates()->get();

        return view('home', compact('categories', 'topNewArrivalProducts', 'recommendedProducts'));
    }
}
