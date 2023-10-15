@extends('layout.app')

@section('title_page', 'Vyhľadávanie - ibest.sk')

@section('content')

    <div class="container-fluid col-md-10 mt-4">

        Navbar
        Breadcrumb

        <div class="row g-4 position-relative">
            <div class="col-md-2">

                @include('components.filter')

            </div>
            <div class="col-md-10">

                @include('components.categories')

                <div class="d-flex flex-column flex-md-row align-items-center mb-2">
                    <div class="me-auto small">
                        Zoradiť podľa:
                        <a href="{{ route('filter', ['sort_by' => 'top']) }}" class="mx-1 {{ ($getSortBy == 'top' or !$getSortBy) ? "fw-bold" : "" }}">
                            Najobľúbenejší
                        </a>
                        <a href="{{ route('filter', ['sort_by' => 'best_seller']) }}" class="mx-1 {{ $getSortBy == 'best_seller' ? "fw-bold" : "" }}">
                            Najpredávanejší
                        </a>
                        <a href="{{ route('filter', ['sort_by' => 'price_asc']) }}" class="mx-1 {{ $getSortBy == 'price_asc' ? "fw-bold" : "" }}">
                            Najlacnejší
                        </a>
                        <a href="{{ route('filter', ['sort_by' => 'price_desc']) }}" class="mx-1 {{ $getSortBy == 'price_desc' ? "fw-bold" : "" }}">
                            Najdrahší
                        </a>
                    </div>
                    <div class="vr m-2 opacity-25 d-none d-md-block"></div>
                    <div>
                        <div class="nav nav-sort">
                            <li class="nav-item">
                                <a class="nav-link link-primary" href="#">
                                    <i class="fas fa-th"></i>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link link-primary" href="#">
                                    <i class="fas fa-th-list"></i>
                                </a>
                            </li>
                        </div>
                    </div>
                </div>

                @include('components.catalog_list')

            </div>
        </div>

    </div>

@stop
