@extends('layout.app')

@section('title_page', 'Nakupuj za najlepšie ceny - ibest.sk')

@section('content')

    @include('components.main_page.banner')

    @include('components.main_page.boxs')

    @include('components.main_page.best_seller')

    @include('components.main_page.favorite')

    @include('components.main_page.best_categories')

@stop
