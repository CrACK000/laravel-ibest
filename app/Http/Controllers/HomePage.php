<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomePage extends Controller
{
    public function index(): View
    {
        $best_seller = DB::table('offers')->where('disabled', 0)->limit(5)->get();
        $user_favorite_products = DB::table('offers')->where('disabled', 0)->limit(4)->get();
        $count_products = DB::table('offers')->count();
        $count_shops = DB::table('shops')->count();
        $most_cats = DB::table('categories')->limit(10)->get();

        return view('home.index', [
            'best_seller'               => $best_seller,
            'user_favorite_products'    => $user_favorite_products,
            'count_products'            => Str::replace(',', ' ', number_format($count_products)),
            'count_shops'               => $count_shops,
            'most_cats'                 => $most_cats
        ]);
    }
}
