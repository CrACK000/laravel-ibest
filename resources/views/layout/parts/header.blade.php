<nav class="navbar navbar-expand-lg bg-transparent">
    <div class="container-fluid col-md-10 mt-3">

        <div class="vstack">
            <div class="d-flex align-items-center w-100">
                <a class="navbar-brand fw-semibold me-auto lh-1" href="{{ route('homePage') }}">
                    <img src="{{ asset('img/full_logo_blue.svg') }}" style="width: 145px;opacity: .75;" alt="iBest.sk">
                </a>

                <div class="d-flex align-items-center justify-content-end">

                    <div>
                        <a data-bs-toggle="modal" href="#open-search"
                           class="text-decoration-none fw-medium px-2 d-flex align-items-center">
                            <i class="fa-solid fa-magnifying-glass fs-5"></i>
                            <span class="d-md-inline d-none ms-4">Hľadať</span>
                        </a>
                    </div>

                    <div class="vr mx-md-5 mx-3 my-2"></div>

                    <div>
                        <a href="{{ route('myListProducts') }}"
                           class="text-decoration-none fw-medium px-2 d-flex align-items-center">
                            <i class="fa-regular fa-heart fs-4"></i>
                            <span class="d-md-inline d-none ms-4">Môj zoznam</span>
                        </a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</nav>

@include('modal_search.modal')
