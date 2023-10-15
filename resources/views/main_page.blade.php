@extends('layout.app')

@section('title_page', 'Nakupuj za najlepšie ceny - ibest.sk')

@php

    use App\Http\Controllers\ProductDetails;
    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\ProductRating;

@endphp

@section('content')

    <div class="container-fluid col-md-10 mt-4">

        <div class="text-center mb-5 text-muted">
            <div class="fs-4">
                Viac ako <span class="text-black fw-semibold fs-3">{{ $count_products }}</span> produktov,
                výber z viac ako <span class="text-black fw-semibold fs-3">{{ $count_shops }}</span> obchodov
            </div>
            <div class="fs-3 mb-2">
                Najlacnejšie ceny, zľavové kupóny a najviac spokojný zákazníci
            </div>
            <div class="mb-4 fs-4 text-black">
                IBEST.SK
            </div>
        </div>

        <div class="bg-white p-2 rounded-3 shadow-sm mb-5">
            Navbar
        </div>

        <div>
            <div class="mb-4">
                <span class="fs-4">Najpredávanejšie</span>
            </div>
            <div class="bg-white shadow-sm rounded-5 px-4 py-2">
                <div class="row gx-4 flex-nowrap overflow-auto">
                    @foreach($best_seller as $product)

                        @php($main_img_src = ProductDetails::main_img_product($product->id, '130x130'))

                        <div class="col-lg-2 col-11 grids-end py-2 px-3">
                            <a href="{{ route('product', ['productId' => $product->id]) }}" class="link-body-emphasis text-decoration-none d-flex flex-column h-100">
                                <div class="text-center position-relative py-4">
                                    <img src="{{ $main_img_src }}" class="mw-100 mh-100 remove-bg-img" alt="{{ $product->title }}">
                                    <div class="position-absolute top-0 start-0">
                                        <span class="badge text-bg-primary">TOP 10</span>
                                    </div>
                                </div>
                                <div class="lh-sm small mt-2 mb-3 text-center">
                                    {{ $product->title }}
                                </div>
                                <div class="d-flex align-items-end mt-auto">
                                    <div class="text-primary">
                                        <i class="fa-solid fa-star"></i> {{ ProductRating::percent_rate($product->id) }}%
                                    </div>
                                    @if($product->price > 0)
                                        <div class="ms-auto fw-semibold fs-5">{{ round($product->price) }} €</div>
                                    @endif
                                </div>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>

        <div class="mt-5">
            <div class="mb-4">
                <span class="fs-4 text-danger"><i class="fa-solid fa-heart me-2"></i> Moje obľúbené</span>
            </div>
            <div class="row gx-4 align-items-stretch flex-nowrap overflow-auto">
                @foreach($best_seller as $product)

                    @php($main_img_src = ProductDetails::main_img_product($product->id, '130x130'))

                    <div class="col-lg-2 col-11 pb-3">
                        <a href="{{ route('product', ['productId' => $product->id]) }}" class="link-body-emphasis text-decoration-none">
                            <div class="bg-white rounded-4 p-3 d-flex flex-column h-100 shadow-sm">
                                <div class="text-center">
                                    <img src="{{ $main_img_src }}" class="mw-100 mh-100 remove-bg-img" alt="{{ $product->title }}">
                                </div>
                                <div class="lh-sm small mt-2 mb-3 text-center">
                                    {{ $product->title }}
                                </div>
                                <div class="d-flex align-items-end mt-auto">
                                    <div class="text-primary">
                                        <i class="fa-solid fa-star"></i> {{ ProductRating::percent_rate($product->id) }}%
                                    </div>
                                    @if($product->price > 0)
                                        <div class="ms-auto fw-semibold fs-5">{{ round($product->price) }} €</div>
                                    @endif
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

        <div class="mt-5">
            <div class="mb-3">
                <span class="fs-4">Najviac navštevované kategórie</span>
            </div>
            <div class="row g-3">
                @foreach($most_cats as $cat)

                    @php($counter = DB::table('offers')->where('category_id', 'LIKE', '%"'.$cat->id.'"%')->count())

                    <div class="col-md-3">
                        <a href="{{ route('searchResult', ['categories' => $cat->id]) }}" class="text-decoration-none link-body-emphasis">
                            <div class="bg-white rounded-3 p-3 d-flex align-items-center shadow-sm scale-box">
                                <div class="me-3">
                                    <img src="https://admin.ibest.sk/assets/images/categories/{{ $cat->img }}" style="width: 50px;height: 50px;" alt="{{ $cat->title }}">
                                </div>
                                <div class="">
                                    {{ $cat->title }}
                                    <span class="small text-muted">({{ $counter }})</span>
                                </div>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
        </div>

    </div>

@stop
