@extends('layout.app')

@section('title_page', $productData->title.' - ibest.sk')

@php

    /*
     * @todo hodnotenie produktu nahradiť hviezdami *5
     */

    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;

@endphp

@section('content')

    <div class="container-fluid col-md-10 mt-4">

        @include('layout.parts.navbar')

        <div class="col-lg-11 mx-auto">

            <div class="fs-3 fw-normal lh-sm d-block d-md-none mt-3">{{ $productData->title }}</div>

            <div class="row g-4 mt-2 mb-5 my-md-5">

                <div class="col-md-6">
                    <div class="d-flex flex-column">
                        <div class="w-100 text-center px-5 mb-3">
                            <div>
                                <img src="{{ $main_img }}" alt="title" class="mw-100 remove-bg-img" style="max-height: 400px;">
                            </div>
                        </div>
                        <div class="d-flex flex-row w-100 me-3 bg-white p-2 rounded-4" style="height: 75px;">
                            @foreach($productGallery as $picture)
                                <a href="#" class="gallery-item p-2 rounded-3 me-2">
                                    <img src="https://cloud.ibest.sk/products/{{ $picture->offer_id }}/{{ $picture->src }}_50x50.{{ $picture->tmp }}" alt="{{ $productData->title }} - Picture #{{ $picture->id }}" class="mw-100 mh-100">
                                </a>
                            @endforeach
                        </div>
                    </div>
                </div>

                <div class="col-md-6 d-flex flex-column">

                    <span class="fs-3 fw-normal lh-sm d-none d-md-block">{{ $productData->title }}</span>

                    <div class="mt-3 mb-md-0 mb-3 small d-flex align-items-center">
                        <div class="mx-md-0 mx-auto">
                            <span class="fw-semibold text-primary">
                                <i class="fa-solid fa-star"></i> {{ $productRate }}%
                            </span>
                        </div>
                        <div class="vr mx-3"></div>
                        <div class="fw-normal mx-md-0 mx-auto">
                            <span class="d-md-inline-block d-none">Značka:</span> <span class="fw-semibold">{{ $productData->brand }}</span>
                        </div>
                        <div class="vr mx-3"></div>
                        <div class="mx-md-0 mx-auto">
                            <a href="#" class="text-decoration-none link-danger">
                                <i class="fa-regular fa-heart me-1 d-md-inline-block d-none"></i>
                                <i class="fa-regular fa-heart me-1 fs-3 d-block d-md-none"></i>
                                <span class="d-md-inline-block d-none">Pridať do obľúbených</span>
                            </a>
                        </div>
                    </div>

                    <div class="py-3 fw-normal small">
                        {{ $productData->brief_description }}
                    </div>

                    <div class="mt-auto bg-white p-3 rounded-4 d-flex flex-column flex-md-row align-items-center">
                        @if($productData->price > 0)
                            <div class="me-md-auto mb-2 mb-md-0 text-center text-md-end">
                                Dostupné v <b>{{ $productData->available_shops }}</b> obchodoch
                            </div>
                            <div class="d-flex align-items-center">
                                <div class="text-end small fw-normal lh-1 me-2">
                                    Najnižšia<br>cena
                                </div>
                                <a href="#" class="btn btn-primary py-2 px-3">
                                    Do obchodu
                                    <span class="mx-3 fw-bold">{{ round($productData->price) }} €</span>
                                    <i class="fa-solid fa-basket-shopping"></i>
                                </a>
                            </div>
                        @else
                            <div class="mx-auto">Cena pre produkt nieje dostupná</div>
                        @endif
                    </div>

                </div>

            </div>

            <div class="col-lg-11 mx-auto">

                @if($productData->available_shops)

                    <div class="mb-3 small">
                        Zoradiť podľa:
                        <a href="#" class="text-decoration-none mx-1 fw-bold">
                            Odporúčané ponuky
                        </a>
                        <a href="#" class="text-decoration-none mx-1">
                            Najlacnejšie
                        </a>
                        <a href="#" class="text-decoration-none mx-1">
                            Hodnotenie obchodu
                        </a>
                    </div>

                    @foreach($allShops as $shop)

                        @php($var = "shop_{$shop->id}")

                        @if(!empty($productData->$var))

                            @php($vouchers      = DB::table('vouchers')->where('shop_id', $shop->id)->orderByDesc('value')->limit(2)->get())
                            @php($xmlData       = DB::table($shop->db_xml)->where('id', $productData->$var)->first())
                            @php($shop_price    = round(str_replace(',','', $xmlData->price)))

                            <div class='bg-white p-3 rounded-4 scale-box mb-1'>
                                <div class='row g-3 align-items-center'>
                                    <div class='col-md-2 col-5 order-1'>
                                        <a target='_blank' href='{{ url("/redirect/" . Controller::toAscii($shop->title) . "/$shop->id") }}'>
                                            <img src='https://admin.ibest.sk/assets/images/products/{{ $shop->logo }}' class='mw-100 mh-100 rounded' alt='{{ $shop->title }} Logo'>
                                        </a>
                                    </div>
                                    <div class='col-md-4 order-3 order-md-2'>
                                        <span class='badge fw-medium rounded-pill bg-primary-subtle text-primary'><i class='fa-solid fa-star'></i> 90%</span>

                                        @if( $xmlData->availability )
                                            <span class='badge fw-medium rounded-pill bg-success-subtle text-success'><i class='fa-solid fa-box-open'></i> Na sklade</span>
                                        @endif

                                        @if($vouchers->first())
                                            <a href="#" class='badge fw-medium rounded-pill bg-primary-subtle text-primary'><i class="fas fa-percent"></i> Zľavové kódy</a>
                                        @endif

                                    </div>
                                    <div class='col-md-4 order-4 order-md-3'>

                                        @forelse($vouchers as $voucher)

                                            <div class="voucher-pill d-flex align-items-center">
                                                <div class="me-auto small">

                                                    @if($voucher->type == 'sale')

                                                        Zľava {{ $voucher->value }}%

                                                    @elseif($voucher->type == 'delivery')

                                                        Doprava zadarmo

                                                    @endif

                                                </div>
                                                <div class="position-relative ms-2">
                                                    <label class="d-none" for="voucher_{{ $voucher->id }}"></label>
                                                    <input type="text" class="form-control form-control-sm" value="{{ $voucher->code }}" id="voucher_{{ $voucher->id }}" readonly>
                                                    <div class="position-absolute top-50 end-0 translate-middle-y">
                                                        <button type="button" class="btn btn-link px-2" onclick="copyVoucher('{{ $voucher->code }}')" data-bs-toggle="tooltip" data-bs-placement="top" data-bs-title="Kopírovať">
                                                            <i class="far fa-copy"></i>
                                                        </button>
                                                    </div>
                                                </div>
                                                <div class="ms-2" data-bs-toggle="popover" data-bs-trigger="hover" data-bs-content="{{ $voucher->info }}" data-bs-placement="top">
                                                    <span class="text-primary" style="cursor: pointer;">
                                                        <i class="fas fa-info-circle"></i>
                                                    </span>
                                                </div>
                                            </div>

                                        @empty

                                            <span class='small text-muted'>Nieje k dispozícii žiadny zľavový kód</span>

                                        @endforelse

                                    </div>
                                    <div class='col-md-2 col-7 text-end text-md-center order-2 order-md-4'>
                                        <div class='fs-4 mb-2 lh-1'>
                                            <span class="text-end text-md-center x-mini">Cena v obchode</span>
                                            {{ $shop_price }} €
                                        </div>
                                        <a target='_blank' href='{{ url("/redirect/$productId/$shop->id") }}' class='btn btn-sm btn-primary rounded-3 px-3 w-100'>
                                            Do obchodu <i class='fa-solid fa-basket-shopping ms-1 small'></i>
                                        </a>
                                    </div>
                                </div>
                            </div>

                        @endif

                    @endforeach

                @else

                    <div class="text-center">Tento produkt neponúka žiadny podporovaný e-shop</div>

                @endif

            </div>

        </div>

    </div>

@stop
