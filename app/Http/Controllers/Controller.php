<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Http\RedirectResponse;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    static public function toAscii($str, $replace = array(), $delimiter = '-'): string
    {
        if( !empty($replace) ) {
            $str = str_replace((array)$replace, ' ', $str);
        }

        $clean = iconv('UTF-8', 'ASCII//TRANSLIT', $str);
        $clean = preg_replace("/[^a-zA-Z0-9\/_|+ -]/", '', $clean);
        $clean = trim($clean, '-');
        $clean = preg_replace("/[\/_|+ -]+/", $delimiter, $clean);

        return strtolower($clean);
    }

    public function redirect(string $productId, int $shopId): RedirectResponse
    {
        /*
         * @todo spraviť zapisovanie štatistiky
         */

        $shop_data = DB::table('shops')->where('id', $shopId)->first();

        if (is_numeric($productId)){

            $product_data = DB::table('offers')
                            ->select('offers.*', "shop_$shopId")
                            ->join('product_uid','product_uid.product_id', '=', 'offers.id')
                            ->where('offers.id', $productId)
                            ->first();


            $shopVar = "shop_$shopId";

            $xml_data = DB::table($shop_data->db_xml)
                        ->where('id', $product_data->$shopVar)
                        ->first();

            return redirect()->intended($xml_data->link.$shop_data->affiliate_code);

        } else {

            return redirect()->intended($shop_data->address.$shop_data->affiliate_code);

        }
    }

    public function breadcrumb_categories($openCategoryId): array {

        $openCategory = DB::table("categories")->where('id', $openCategoryId)->first();

        $categories = array();

        if ($openCategory) {

            $openCatId = $openCategory->id;

            if ($openCategory->subcategory_id) {

                $categories = self::breadcrumb_categories($openCategory->subcategory_id);

            }

            $categories[$openCatId] = $openCategory->title;

        }

        return $categories;

    }
}
