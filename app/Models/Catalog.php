<?php

namespace App\Models;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;

class Catalog
{
    static public function categories_list(): Collection
    {
        return DB::table('categories')->where('subcategory_id', 0)->get();
    }
}
