<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ProductRating extends Controller
{
    static public function percent_rate($productId): string
    {
        $rating = DB::table('rating_offers')->where('offers_id', $productId);
        $count_rating = $rating->count();

        if ($count_rating) {
            return ($rating->sum('rating') * 100) / ($count_rating * 5);
        } else {
            return "0";
        }
    }
}
