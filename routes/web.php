<?php

use App\Http\Controllers\HomePage;
use App\Http\Controllers\ProductDetails;
use App\Http\Controllers\Search;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [HomePage::class, 'index']);
Route::get('/product/{productId}', [ProductDetails::class, 'productView'])->name('product');
Route::get('/search/', [Search::class, 'searchResult'])->name('searchResult');
Route::get('/search/filter/', [Search::class, 'filter'])->name('filter');
