@extends('layout.app')

@section('title_page', 'Vyhľadávanie - ibest.sk')

@php

    use Illuminate\Support\Facades\Vite;

@endphp

@section('content')

    @mobile

        <div class="position-fixed bottom-0 start-0 m-3" style="z-index: 1002;">
            <button type="button" class="btn btn-secondary shadow text-center rounded-circle px-3 py-2" data-bs-toggle="offcanvas" data-bs-target="#showFilter">
                <i class="fa-solid fa-filter"></i>
                <div class="mini">
                    Filter
                </div>
            </button>
        </div>

        <div class="offcanvas offcanvas-start" style="max-width: 350px;" tabindex="1302" id="showFilter" aria-labelledby="showFilterLabel">
            <div class="offcanvas-header">
                <h5 class="offcanvas-title" id="showFilterLabel">Filtrovať produkty</h5>
                <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
            </div>
            <div class="offcanvas-body">
                @include('components.components.filter')
            </div>
        </div>

    @endmobile

    @include('layout.parts.navbar')

    <div class="container-fluid col-md-10 mx-auto mt-4">

        <div class="d-flex flex-column flex-md-row">

            @desktop

                <div class="col-md-2 me-5">
                    <div class="sticky-md-top filter-panel" id="filter" style="margin-left: -50px;">
                        <div class="pt-3">

                            @include('catalog.components.filter')

                        </div>
                    </div>
                </div>

            @enddesktop

            <div class="col">

                @include('catalog.components.breadcrumb')

                <div class="mb-1 pt-3">
                    <span class="small text-muted">Uľahčite si hľadanie</span>
                </div>

                @include('catalog.components.categories')

                <div class="d-flex align-items-center mt-5">
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

                @include('catalog.components.sort')

                @desktop

                    @include("catalog.components.sort_$show_type")

                @elsedesktop

                    @include("catalog.components.sort_box")

                @enddesktop

            </div>
        </div>

    </div>

    <script type="module">
        {!! Vite::content('resources/js/filter.js') !!}
    </script>

@stop
