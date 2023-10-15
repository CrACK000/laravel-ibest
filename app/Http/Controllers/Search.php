<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class Search extends Controller
{
    public function searchResult(): View
    {
        $getCategory        = $_GET['categories']       ?? 0;
        $getPriceMin        = $_GET['price_min']        ?? '';
        $getPriceMax        = $_GET['price_max']        ?? '';
        $getSearchFilter    = $_GET['search_filter']    ?? '';
        $getStars           = $_GET['stars']            ?? 0;
        $getBrands          = $_GET['brand']            ?? [];
        $getSortBy          = $_GET['sort_by']          ?? 0;

        // Where's
        $wh_main            = "offers.disabled = 0 "; // Main where (first) every only
        $wh_categories      = $getCategory ? " AND offers.category_id LIKE '%\"$getCategory\"%' " : ""; // category a id get
        $wh_search_filter   = $getSearchFilter ? " AND offers.title LIKE '%$getSearchFilter%' " : ""; // where search
        $wh_brands          = (!empty($getBrands)) ? " AND (offers.brand LIKE '%".implode("%' OR offers.brand LIKE '%", $getBrands)."%') " : ""; // where $brands

        // where price
        if ($getPriceMin || $getPriceMax) {

            $priceWhereMin = '';
            $priceWhereMax = '';

            if ($getPriceMin) $priceWhereMin = " AND offers.price >= $getPriceMin ";
            if ($getPriceMax) $priceWhereMax = " AND offers.price <= $getPriceMax ";

            $wh_price = ($getPriceMin || $getPriceMax) ? $priceWhereMin.$priceWhereMax : "";
        } else {
            $wh_price = "";
        }

        //where stars
        if ($getStars) {
            if     ($getStars == 1 )    { $stars_operator = ">= 10"; }
            elseif ($getStars == 2 )    { $stars_operator = "> 20"; }
            elseif ($getStars == 3 )    { $stars_operator = "> 40"; }
            elseif ($getStars == 4 )    { $stars_operator = "> 60"; }
            else                        { $stars_operator = ""; }

            $wh_stars = " AND rating_percent $stars_operator ";

        } else {
            $wh_stars = "";
        }

        //order by zoradenie
        if ($getSortBy) {
            if ($getSortBy == 'top') {
                $order = "rating_percent DESC ";
            } elseif ($getSortBy == 'best_seller') {
                $order = "rating_percent DESC "; // @todo napojiť to na najlepšie predajne/kliknutia
            } elseif ($getSortBy == 'price_asc') {
                $order = "offers.price ASC ";
            } elseif ($getSortBy == 'price_desc') {
                $order = "offers.price DESC ";
            } else {
                $order = "rating_percent DESC "; // Auto
            }
        } else {
            $order = "rating_percent DESC "; // Auto
        }

        // Query Products
        $getProducts = DB::table('offers')
            ->whereRaw($wh_main.$wh_categories.$wh_search_filter.$wh_brands.$wh_price.$wh_stars)
            ->orderByRaw($order)
            ->limit(24)
            ->get();

        // Filter panel -> Query all brands
        $eachBrands = DB::table('offers')
            ->select('brand')
            ->whereRaw($wh_main.$wh_categories.$wh_search_filter.$wh_price.$wh_stars)
            ->distinct()
            ->orderBy('title')
            ->get();

        // Query Sub Categories
        $eachCategories = DB::table('categories')->where('subcategory_id', $getCategory)->limit(11)->get();
        $countCategories = DB::table('categories')->where('subcategory_id', $getCategory)->count();

        return view('search_result', [
            'getProducts'       => $getProducts,
            'getPriceMin'       => $getPriceMin,
            'getPriceMax'       => $getPriceMax,
            'getSearchFilter'   => $getSearchFilter,
            'getStars'          => $getStars,
            'getBrands'         => $getBrands,
            'eachBrands'        => $eachBrands,
            'getSortBy'         => $getSortBy,
            'getCategory'       => $getCategory,
            'eachCategories'    => $eachCategories,
            'countCategories'   => $countCategories
        ]);
    }

    public function filter(): RedirectResponse
    {
        $back_link  = $_SERVER['HTTP_REFERER'];
        $array_link = parse_url($back_link);
        parse_str($array_link['query'], $params);

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

        return redirect()->route('searchResult', $new_url);
    }
}
