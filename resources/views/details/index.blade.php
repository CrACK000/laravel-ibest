@extends('layout.app')

@section('title_page', $productData->title.' - ibest.sk')

@php

    /*
     * @todo hodnotenie produktu nahradiť hviezdami *5
     */

@endphp

@include('details.components.shops')
@include('details.components.description')
@include('details.components.parameters')
@include('details.components.sales')
@include('details.components.others')
@include('details.components.report')

@section('info_panel')
    <div class="mx-md-0 mx-auto">
        <span class="fw-semibold text-primary">
            <i class="fa-solid fa-star"></i> {{ $productRate }}%
        </span>
    </div>
    <div class="vr mx-3 my-4"></div>
    <div class="fw-normal mx-md-0 mx-auto">
        <span @class(['d-none' => MobileDetect::isMobile()])>Značka:</span> <span
            class="fw-semibold">{{ $productData->brand }}</span>
    </div>
    <div class="vr mx-3 my-4"></div>
    <div class="mx-md-0 mx-auto">
        <a href="#" class="text-decoration-none link-danger">
            <i @class([
                    'fa-regular fa-heart me-1',
                    'fs-3' => MobileDetect::isMobile()
                ])></i>
            <span @class(['d-none' => MobileDetect::isMobile()])>Pridať do obľúbených</span>
        </a>
    </div>
@endsection

@section('content')

    @include('layout.parts.navbar')

    <div class="container-fluid col-md-9 mt-5">

        @mobile
        <div class="fs-3 fw-normal lh-sm mt-3">{{ $productData->title }}</div>

        <div class="d-flex align-items-center">
            @yield('info_panel')
        </div>
        @endmobile

        <div class="row gx-4 mb-0">

            <div class="col-md-6">
                <div class="d-flex flex-column">
                    <div class="w-100 text-center px-5 py-4">
                        <img src="{{ $main_img }}" alt="title" class="mw-100 remove-bg-img" style="max-height: 400px;">
                    </div>
                    <div class="d-flex flex-row justify-content-center w-100 bg-body-secondary py-2 px-3 rounded-4"
                         style="height: 75px;">
                        @foreach($productGallery as $picture)
                            <a href="#" class="gallery-item p-2 rounded-4 me-2">
                                <img
                                    src="https://cloud.ibest.sk/products/{{ $picture->offer_id }}/{{ $picture->src }}_50x50.{{ $picture->tmp }}"
                                    alt="{{ $productData->title }} - Picture #{{ $picture->id }}"
                                    class="mw-100 mh-100 remove-bg-img">
                            </a>
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="col-md-6 d-flex flex-column">

                @notmobile

                <span class="fs-3 fw-normal lh-sm">{{ $productData->title }}</span>

                <div class="d-flex align-items-center">
                    @yield('info_panel')
                </div>

                @endnotmobile

                <div class="fw-normal my-4 mt-md-0">
                    {{ $productData->brief_description }}
                </div>

                <div class="mt-auto bg-body-secondary p-3 rounded-4 d-flex flex-column flex-md-row align-items-center"
                     style="max-height: 400px;">
                    @if($productData->price > 0)
                        <div class="me-md-auto mb-2 mb-md-0 text-center text-md-end">
                            Dostupné v <b>{{ $productData->available_shops }}</b> obchodoch
                        </div>
                        <div class="d-flex align-items-center">
                            <div class="text-end small fw-normal lh-1 me-2">
                                Najnižšia<br>cena
                            </div>
                            <a href="#" class="btn btn-primary py-2 px-3 rounded-3">
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

    </div>

    <div class="bg-body mt-5">
        <div class="container-fluid col-md-9 mx-auto">
            <div class="d-flex flex-column flex-md-row">

                <div class="col-md-3 me-md-5">
                    <div class="pt-5 pb-md-5 pb-0 sticky-md-top">
                        <div class="bg-body-tertiary rounded-4">
                            <div class="d-flex flex-row flex-md-column overflow-x-auto p-2 p-md-3 rounded-4" id="myTab"
                                 role="tablist">

                                @yield('shops_button')

                                @yield('description_button')

                                @yield('parameters_button')

                                @yield('sales_button')

                                @yield('others_button')

                                @yield('report_button')

                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-md-9">

                    <div class="tab-content pb-5 pt-4 pt-md-5" id="myTabContent">
                        <div class="tab-pane fade show active" id="shops-tab-pane" role="tabpanel"
                             aria-labelledby="shops-tab" tabindex="0">
                            @yield('shops_table')
                        </div>
                        <div class="tab-pane fade" id="description-tab-pane" role="tabpanel"
                             aria-labelledby="description-tab" tabindex="0">
                            @yield('description_table')
                        </div>
                        <div class="tab-pane fade" id="parameters-tab-pane" role="tabpanel"
                             aria-labelledby="parameters-tab" tabindex="0">
                            @yield('parameters_table')
                        </div>
                        <div class="tab-pane fade" id="vouchers-tab-pane" role="tabpanel" aria-labelledby="vouchers-tab"
                             tabindex="0">
                            @yield('sales_table')
                        </div>
                        <div class="tab-pane fade" id="others-products-tab-pane" role="tabpanel"
                             aria-labelledby="others-products-tab" tabindex="0">
                            @yield('others_table')
                        </div>
                        <div class="tab-pane fade" id="report-tab-pane" role="tabpanel" aria-labelledby="report-tab"
                             tabindex="0">
                            @yield('report_table')
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>

@stop
