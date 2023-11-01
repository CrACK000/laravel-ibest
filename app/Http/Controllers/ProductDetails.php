<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class ProductDetails extends Controller
{
    public function productView(string $productId): View
    {
        $getSort = $_GET['sort'] ?? 0;

        $productData = DB::table('offers')
            ->where('offers.id', $productId)
            ->select('offers.*', 'product_uid.id as productUidID', 'product_uid.*')
            ->leftJoin('product_uid', 'product_uid.product_id', '=', 'offers.id')
            ->first();

        $productGallery     = DB::table('gallery')->where('offer_id', $productId)->get();
        $main_image         = self::main_img_product($productId, '2000x2000');
        $productRate        = ProductRating::percent_rate($productId);
        $allShops           = DB::table('shops')->orderByDesc('important')->get();

        $parameters = DB::table('parameters')->where('offer_id', $productId)->get();

        return view('details.index', [
            'productId'         => $productId,
            'main_img'          => $main_image,
            'productData'       => $productData,
            'productGallery'    => $productGallery,
            'productRate'       => $productRate,
            'allShops'          => $allShops,
            'getSort'           => $getSort,
            'parameters'        => $parameters
        ]);
    }
    static public function main_img_product($product_id, $resolution): string
    {

        $select_gallery_id = DB::table('offers')->where('id', $product_id)
                                                      ->value('gallery_id');
        if ($select_gallery_id) {

            $folder             = "galleries/$select_gallery_id";
            $query_main_images  = DB::table('gallery')->where(['galleries_id' => $select_gallery_id, 'main' => 1])
                                                            ->first();
        } else {

            $folder             = "products/$product_id";
            $query_main_images  = DB::table('gallery')->where(['offer_id' => $product_id, 'main' => 1])
                                                            ->first();
        }

        if ($query_main_images){

            $query = $query_main_images;

        } else {

            if ($select_gallery_id) {

                $query = DB::table('gallery')->where('galleries_id', $select_gallery_id)
                                                   ->orderBy('id')
                                                   ->first();
            } else {

                $query = DB::table('gallery')->where('offer_id', $product_id)
                                                   ->orderBy('id')
                                                   ->first();
            }

        }

        $img_src = $query->src;
        $img_tmp = $query->tmp;

        return "https://cloud.ibest.sk/$folder/{$img_src}_$resolution.$img_tmp";
    }
}
