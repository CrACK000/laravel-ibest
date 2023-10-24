@extends('layout.app')

@section('title_page', 'Vyhľadávanie - ibest.sk')

@php

    use Illuminate\Support\Facades\Vite;

@endphp

@section('content')

    @mobile

        <div class="position-fixed bottom-0 start-0 m-3" style="z-index: 1002;">
            <button type="button" class="btn btn-primary" data-bs-toggle="offcanvas" data-bs-target="#showFilter">
                filter
            </button>
        </div>

        <div class="offcanvas offcanvas-start" style="max-width: 350px;" tabindex="1302" id="showFilter" aria-labelledby="showFilterLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="showFilterLabel">Filtrovať produkty</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                @include('components.filter')
            </div>
        </div>

    @endmobile

    <div class="container-fluid col-md-10 mt-4">

        @include('layout.parts.navbar')

        @include('components.breadcrumb')

        <div class="row g-5">

            @desktop

                <div class="col-md-2">
                    <div class="sticky-md-top filter-panel" id="filter" style="margin-left: -50px;">
                        <div class="bg-body p-3 rounded-3 mt-2 mt-md-0">

                            @include('components.filter')

                        </div>
                    </div>
                </div>

            @enddesktop

            <div class="col">

                @include('components.categories')

                <div class="d-flex mt-5">
                    <div class="fs-4 me-auto text-muted">

                        @if($getSearchMain)

                            <small class="fw-normal">Vyhľadávanie:</small> &#8222;{{ $getSearchMain }}&#8220;

                        @elseif($getCategory)

                            {{ $getCategoryTitle }}

                        @endif

                    </div>
                    <div class="small text-muted fw-normal">
                        <span class="fw-semibold">{{ $countProducts }}</span> výsledkov
                    </div>
                </div>

                <div class="d-flex flex-column flex-md-row align-items-center mb-3 mt-3 px-3">

                    <div class="me-auto small">
                        Zoradiť podľa:
                        <a href="{{ route('filter', ['sort_by' => 'top']) }}" class="text-decoration-none mx-1 {{ ($getSortBy == 'top' or !$getSortBy) ? "fw-bold" : "" }}">
                            Najobľúbenejší
                        </a>
                        <a href="{{ route('filter', ['sort_by' => 'best_seller']) }}" class="text-decoration-none mx-1 {{ $getSortBy == 'best_seller' ? "fw-bold" : "" }}">
                            Najpredávanejší
                        </a>
                        <a href="{{ route('filter', ['sort_by' => 'price_asc']) }}" class="text-decoration-none mx-1 {{ $getSortBy == 'price_asc' ? "fw-bold" : "" }}">
                            Najlacnejší
                        </a>
                        <a href="{{ route('filter', ['sort_by' => 'price_desc']) }}" class="text-decoration-none mx-1 {{ $getSortBy == 'price_desc' ? "fw-bold" : "" }}">
                            Najdrahší
                        </a>
                    </div>

                    <div class="d-md-flex align-items-center d-none">
                        <a class="link-primary" href="{{ route('filter', ['show' => 'box']) }}">
                            <div class="p-2 lh-1">
                                <i class="fa-solid fa-grip fs-5"></i>
                            </div>
                        </a>
                        <div class="vr m-3 opacity-25"></div>
                        <a class="link-primary" href="{{ route('filter', ['show' => 'list']) }}">
                            <div class="p-2 lh-1">
                                <i class="fa-solid fa-bars fs-5"></i>
                            </div>
                        </a>
                    </div>

                </div>

                @desktop

                    @include("components.catalog_$show_type")

                @elsedesktop

                    @include("components.catalog_box")

                @enddesktop

            </div>
        </div>

    </div>

    <script type="module">
        {!! Vite::content('resources/js/filter.js') !!}
    </script>

@stop
