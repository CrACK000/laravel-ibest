<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\View\View;

class HomePage extends Controller
{
    public function index(): View
    {
        $best_seller = DB::table('offers')->where('disabled', 0)->limit(3)->get();
        $user_favorite_products = DB::table('offers')->where('disabled', 0)->limit(4)->get();
        $count_products = DB::table('offers')->count();
        $count_shops = DB::table('shops')->count();
        $most_cats = DB::table('categories')->limit(25)->get();

        $first_box_id   = 4;

        $first_box_categories = DB::table('categories')->where('subcategory_id', $first_box_id)->limit(5)->get();
        $first_box_products = DB::table('offers')->where('category_id','LIKE', "%\"$first_box_id\"%")->limit(6)->get();

        return view('main_page', [
            'best_seller'               => $best_seller,
            'user_favorite_products'    => $user_favorite_products,
            'count_products'            => Str::replace(',', ' ', number_format($count_products)),
            'count_shops'               => $count_shops,
            'most_cats'                 => $most_cats,
            'first_box_categories'      => $first_box_categories,
            'first_box_products'        => $first_box_products
        ]);
    }
}
