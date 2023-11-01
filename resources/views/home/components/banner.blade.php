<div class="container-fluid mb-5 pb-5 pt-3">

    <div
            class="rounded-5 py-5 px-3 text-center text-light d-flex flex-column flex-md-row align-items-center justify-content-center"
            style="background-image: url('{{ asset('img/header_bg.svg') }}');">
        <div class="mx-auto mb-3 mb-md-0">
            <img src="{{ asset('img/icon_light.svg') }}" style="width: 90px;" alt="Logo iBest.sk">
        </div>
        <div class="mx-auto">
            <div class="fs-5">
                Viac ako <span class="text-white fw-semibold fs-4">{{ $count_products }}</span> produktov
            </div>
            <div class="fs-4 mb-2">
                Najlepšie ceny, zľavové kupóny a najviac ušetrených peňazí
            </div>
            <div class="mt-3">
                <button type="button" data-bs-toggle="modal" data-bs-target="#catalogModal"
                        class="btn btn-outline-light border-2 fw-medium text-uppercase rounded-3 px-3">
                    Otvoriť katalóg
                </button>
            </div>
        </div>
    </div>

    @include('modal_catalog.modal')

</div>
