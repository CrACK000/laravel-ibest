<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Boxs
{
    static public function boxs(): array
    {
        $id_1 = 4;
        $id_2 = 2;
        $id_3 = 6;

        return [
            $id_1 => [
                'title'             => self::get_title_category($id_1),
                'img'               => 'img/sport_banner.png',
                'query_categories'  => self::get_category($id_1),
                'query_products'    => self::get_products($id_1)
            ],
            $id_2 => [
                'title'             => self::get_title_category($id_2),
                'img'               => 'img/sport_banner.png',
                'query_categories'  => self::get_category($id_2),
                'query_products'    => self::get_products($id_2)
            ],
            $id_3 => [
                'title'             => self::get_title_category($id_3),
                'img'               => 'img/sport_banner.png',
                'query_categories'  => self::get_category($id_3),
                'query_products'    => self::get_products($id_3)
            ]
        ];
    }

    static private function get_title_category($categoryId): string
    {
        return DB::table('categories')->where('id', $categoryId)->value('title');
    }
    static private function get_category($subCategoryId): Collection
    {
        return DB::table('categories')->where('subcategory_id', $subCategoryId)->limit(6)->get();
    }
    static private function get_products($subCategoryId): Collection
    {
        return DB::table('offers')->where('category_id','LIKE', "%\"$subCategoryId\"%")->limit(6)->get();
    }

    public function boxsa()
    {
        $first_box_id   = 4;

        $first_box_categories = DB::table('categories')->where('subcategory_id', $first_box_id)->limit(5)->get();
        $first_box_products = DB::table('offers')->where('category_id','LIKE', "%\"$first_box_id\"%")->limit(6)->get();
    }
}
