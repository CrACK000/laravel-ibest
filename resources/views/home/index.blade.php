@extends('layout.app')

@section('title_page', 'Nakupuj za najlepšie ceny - ibest.sk')

@section('content')

    <style>
        .header-menu {
            position: absolute;
            top: 0;
            right: 0;
            left: 0;
            padding: 3rem;
            transition: all 250ms;
            z-index: 1030;
        }

        .header-menu-scroll {
            position: fixed;
            top: 0;
            right: 0;
            left: 0;
            padding: .5rem 3rem;
            background-color: #ffffff;
            border-bottom: var(--bs-border-width) var(--bs-border-style) var(--bs-border-color);
            z-index: 1030;
            transition: all 250ms;
        }

        @media only screen and (max-width: 768px) {
            .header-menu {
                padding: 1rem;
            }

            .header-menu-scroll {
                padding: .45rem 1rem;
            }
        }
    </style>

    <script type="module">
        $(document).ready(function () {
            const a = $(".header-menu").offset().top;

            $('.btn-start').hide();

            $(document).scroll(function () {
                $('.header-menu').toggleClass('header-menu-scroll', $(this).scrollTop() > 1);

                if ($(this).scrollTop() > 1) {
                    $('.btn-start').show();
                    $('.btn-lang').hide();
                    $('.header-icon').attr('src', '{{ asset('img/icon_blue.svg') }}')
                } else {
                    $('.btn-start').hide();
                    $('.btn-lang').show();
                    $('.header-icon').attr('src', '{{ asset('img/icon_light.svg') }}')
                }
            });
        });
    </script>

    <div class="bg-header h-100 w-100 d-flex flex-column">
        <div class="header-menu d-flex align-items-center">
            <div class="px-4 py-3">
                <img src="{{ asset('img/icon_light.svg') }}" width="{{ MobileDetect::isMobile() ? '30' : '38' }}"
                     class="header-icon opacity-75" alt="iBest">
            </div>
            <div class="ms-auto">
                <a href="#"
                   class="btn btn-light bg-body bg-opacity-25 blur fw-medium border-0 link-light rounded-3 btn-lang">Slovenčina</a>
                <a data-bs-toggle="modal" href="#catalogModal"
                   class="btn btn-light bg-primary bg-opacity-75 fw-medium border-0 link-light rounded-3 btn-start">
                    Otvoriť katalóg
                </a>
            </div>
        </div>
        <div class="col-md-9 mx-auto p-3 my-auto">
            <div class="text-light">
                <div class="fs-1 fw-semibold mb-4">
                    Porovnávajte tie najlepšie ceny !
                </div>
                <div class="fs-5 opacity-75 col-md-4 mb-4">
                    S našou aplikáciou ušetríte veľa peňazí. Užite si výber medzi tými najlepšími a
                    overenými e-shopmi, ich zľavové kódy a vyberte si tú najlepšiu cenu.
                </div>
                <div class="fs-5 mb-5">
                    Nakupujte rozumne <i class="fa-solid fa-face-smile mx-1"></i>
                </div>
                <div class="">
                    <a data-bs-toggle="modal" href="#catalogModal"
                       class="btn btn-light bg-body bg-opacity-25 blur py-3 px-4 fw-medium border-0 link-light rounded-3">
                        Otvoriť katalóg
                    </a>
                </div>
            </div>
        </div>
    </div>

    @include('components.modal_catalog.modal')

    @include('home.components.best_products')

    @include('home.components.best_categories')

    @include('home.components.boxs')

@stop
