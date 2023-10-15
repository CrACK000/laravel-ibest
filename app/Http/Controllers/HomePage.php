<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class HomePage extends Controller
{
    public function index(): View
    {
        $best_seller = DB::select("select * from offers where disabled = 0 limit 6");
        $count_products = DB::table('offers')->count();
        $count_shops = DB::table('shops')->count();
        $most_cats = DB::select("select * from categories limit 8");

        return view('main_page', [
            'best_seller' => $best_seller,
            'count_products' => $count_products,
            'count_shops' => $count_shops,
            'most_cats' => $most_cats
        ]);
    }
}
