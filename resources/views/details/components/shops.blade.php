@php

    use Illuminate\Support\Facades\DB;
    use App\Http\Controllers\Controller;

@endphp

@section('shops_button')

    @mobile
        <div class="button_flat_group me-1" role="presentation">
            <button type="button" id="shops-tab" data-bs-toggle="tab" data-bs-target="#shops-tab-pane" role="tab" class="btn btn-link p-3 rounded-3 button_flat active link-secondary">
                <div class="text-center">
                    <i class="fa-solid fs-4 fa-store"></i>
                </div>
                <span class="mini fw-medium opacity-75 lh-1">Obchody</span>
            </button>
        </div>
    @elsemobile
        <div class="button_flat_group mb-1" role="presentation">
            <button type="button" id="shops-tab" data-bs-toggle="tab" data-bs-target="#shops-tab-pane" role="tab" class="btn btn-link p-3 rounded-3 button_flat active text-start link-secondary w-100">
                <div class="d-inline-block text-center" style="width: 28px;">
                    <i class="fa-solid fa-store me-2"></i>
                </div>
                Obchody
            </button>
        </div>
    @endmobile

@endsection

@section('shops_table')

    @if($productData->available_shops)

        <div class="rounded-4 ps-3 mb-2 small d-flex align-items-center">

            <span class="text-muted text-nowrap opacity-75 small me-2">Zoradiť podľa:</span>

            <div class="d-flex align-items-center flex-nowrap overflow-x-auto py-3 pe-3 rounded-end-5">
                <a href="{{ route('product', [ 'productId' => $productId, 'sort' => 'recommended_offers' ]) }}"
                   @class(['link_sort py-1 px-2 rounded-2 link-secondary mx-1 text-nowrap', 'link_sort_active' => $getSort == 'recommended_offers' or !$getSort ])>
                    Odporúčané ponuky
                </a>
                <a href="{{ route('product', [ 'productId' => $productId, 'sort' => 'price_low' ]) }}"
                    @class(['link_sort py-1 px-2 rounded-2 link-secondary mx-1 text-nowrap', 'link_sort_active' => $getSort == 'price_low' ])>
                    Najlacnejšie
                </a>
                <a href="{{ route('product', [ 'productId' => $productId, 'sort' => 'rating_shop' ]) }}"
                    @class(['link_sort py-1 px-2 rounded-2 link-secondary mx-1 text-nowrap', 'link_sort_active' => $getSort == 'rating_shop' ])>
                    Hodnotenie obchodu
                </a>
            </div>

        </div>

        <div class="mini text-muted mb-4 lh-sm px-3 opacity-75 border-start">
            <i class="fa-regular fa-circle-question me-2"></i> Uvedené ceny môžu byť v danom e-shope odlišné. Uvádzame iba ceny, ktoré dokážeme získať pomocou rôznych komponentov daných e-shopov.
        </div>

        <style>
            .button-go-shop {
                background: rgb(207,226,255);
                background: linear-gradient(270deg, rgba(207,226,255,1) 0%, rgba(0,0,0,0) 100%);
            }

            .sale-badge {
                padding: 2px 4px;
                transform: rotate(35deg);
            }
        </style>

        <div class="row gy-3">

            @foreach($allShops as $shop)

                @php($var = "shop_$shop->id")

                @if(!empty($productData->$var))

                    @php($voucher      = DB::table('vouchers')->where('shop_id', $shop->id)->orderByDesc('value')->first())
                    @php($xmlData      = DB::table($shop->db_xml)->where('id', $productData->$var)->first())
                    @php($shop_price   = round(str_replace(',','', $xmlData->price)))

                    @desktop
                    <div class="col-12">
                        <div class="bg-body-tertiary rounded-4">
                            <div class="row gx-3 align-items-center">

                                <div class="col-auto">
                                    <a href="{{ route('redirect', ['productId' => Controller::toAscii($shop->title), 'shopId' => $shop->id]) }}" target="_blank">
                                        <img src='https://admin.ibest.sk/assets/images/products/{{ $shop->logo }}' class='rounded-start-4' style="width: 200px;" alt='{{ $shop->title }}'>
                                    </a>
                                </div>

                                <div class="col-3">

                                    <span class='badge fw-medium rounded-3 bg-primary-subtle text-primary border border-primary-subtle'><i class='fa-solid fa-star'></i> 90%</span>

                                    @if( $xmlData->availability )
                                        <span class='badge fw-medium rounded-3 bg-success-subtle text-success border border-success-subtle'><i class='fa-solid fa-box-open'></i> Na sklade</span>
                                    @endif

                                    @if($voucher)
                                        <span class='badge fw-medium rounded-3 bg-warning-subtle text-danger border border-warning-subtle'><i class="fas fa-percent"></i> Zľava</span>
                                    @endif

                                </div>

                                <div class="col">
                                    <div class="d-flex align-items-center">
                                        <div class="mx-auto text-center lh-1">
                                            <div class="py-2 px-3">
                                                <div class="fs-5">{{ $shop_price }} €</div>
                                                <span class="mini text-muted">Cena v obchode</span>
                                            </div>
                                        </div>

                                        @if(!empty($voucher->value))
                                            <div class="mx-auto text-center lh-1">
                                                <div class="bg-warning-subtle py-2 px-3 rounded position-relative">
                                                    <div class="fs-5 text-danger fw-semibold">{{ round($shop_price - ($shop_price / 100) * $voucher->value) }} €</div>
                                                    <span class="mini text-muted">Po zľave</span>
                                                    <div class="position-absolute top-0 start-100 translate-middle">
                                                        <div class="sale-badge badge bg-danger text-warning">
                                                            {{ $voucher->value }} %
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                                <div class="col-auto text-end align-self-stretch">
                                    <a href="{{ route('redirect', ['productId' => $productId, 'shopId' => $shop->id]) }}" target="_blank" class="d-flex align-items-center justify-content-center h-100 w-100 button-go-shop text-decoration-none px-3 px-md-4 py-2 rounded-4">
                                        Do obchodu
                                        <i class="fa-solid fa-arrow-right ms-3"></i>
                                    </a>
                                </div>

                            </div>
                        </div>
                    </div>
                    @elsedesktop
                    <div class="col-12">
                        <div class="bg-body-tertiary rounded-4">
                            <div class="row g-0 align-items-center">

                                <div class="col-12">
                                    <div class="position-relative">
                                        <a href="{{ route('redirect', ['productId' => Controller::toAscii($shop->title), 'shopId' => $shop->id]) }}" target="_blank">
                                            <img src='https://admin.ibest.sk/assets/images/products/{{ $shop->logo }}' class='mw-100 rounded-top-4' alt='{{ $shop->title }}'>
                                        </a>

                                        <div class="position-absolute end-0 top-50 translate-middle-y me-3">
                                            <a href="{{ route('redirect', ['productId' => $productId, 'shopId' => $shop->id]) }}" target="_blank" class="d-flex align-items-center justify-content-end w-100 bg-white bg-opacity-50 blur text-decoration-none px-3 px-md-4 py-2 rounded-3">
                                                Do obchodu
                                                <i class="fa-solid fa-arrow-right ms-3"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>

                                <div class="col">
                                    <div class="d-flex align-items-center p-3">
                                        <div class="mx-auto text-center lh-1">
                                            <div class="py-2 px-3">
                                                <div class="fs-5">{{ $shop_price }} €</div>
                                                <span class="mini text-muted">Cena v obchode</span>
                                            </div>
                                        </div>

                                        @if(!empty($voucher->value))
                                            <div class="mx-auto text-center lh-1">
                                                <div class="bg-warning-subtle py-2 px-3 rounded position-relative">
                                                    <div class="fs-5 text-danger fw-semibold">{{ round($shop_price - ($shop_price / 100) * $voucher->value) }} €</div>
                                                    <span class="mini text-muted">Po zľave</span>
                                                    <div class="position-absolute top-0 start-100 translate-middle">
                                                        <div class="sale-badge badge bg-danger text-warning">
                                                            {{ $voucher->value }} %
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    @enddesktop

                @endif

            @endforeach

        </div>

    @else

        <div class="text-center">Tento produkt neponúka žiadny podporovaný e-shop</div>

    @endif

@endsection
