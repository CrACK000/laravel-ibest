<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Search extends Controller
{
    public function filter(): RedirectResponse
    {
        if (empty($_GET['search_main'])){

            $back_link  = $_SERVER['HTTP_REFERER'] ?? 0;

            if ($back_link){
                $array_link = parse_url($back_link);
                parse_str($array_link['query'], $params);
            } else {
                $params = [];
            }

            if (!empty($_GET['show'])){
                setcookie('shop_result_type', $_GET['show'], time() + (86400 * 30), "/"); //@todo doladiť čas cookies
                unset($_GET['show']);
            }

            if (empty($_GET['search_filter'])){
                unset($_GET['search_filter']);
            }

            if (empty($_GET['price_min'])){
                unset($_GET['price_min']);
            }

            if (empty($_GET['price_max'])){
                unset($_GET['price_max']);
            }

            $sum = ($_GET + $params);

            if (!empty($_GET['clear'])) {
                if ($_GET['clear'] == 'price'){
                    unset($sum['price_min'], $sum['price_max'], $sum['clear']);
                } else {
                    unset($sum[$_GET['clear']], $sum['clear']);
                }
            }

            $new_url = http_build_query($sum);

        } else {

            $new_url = ['search_main' => $_GET['search_main']];

        }

        return redirect()->route('searchResult', $new_url);
    }

    public function result_search(Request $request): Response
    {

        //@todo vylepšiť vyhľadávanie

        $products = DB::table('offers')->where('title', 'LIKE', "%$request->value%")->limit(10)->get();
        $countProducts = DB::table('offers')->where('title', 'LIKE', "%$request->value%")->count();

        $categories = DB::table('categories')->where('title', 'LIKE', "%$request->value%")->limit(10)->get();
        $countCategories = DB::table('categories')->where('title', 'LIKE', "%$request->value%")->count();

        return Response(view('components.modal_search.components.results', [
            'products' => $products,
            'countProducts' => $countProducts,
            'categories' => $categories,
            'countCategories' => $countCategories,
            'searchValue' => $request->value
        ]));

    }
}
