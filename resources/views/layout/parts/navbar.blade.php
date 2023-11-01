<div class="ib-nav px-4 px-md-5 py-3">
    <div class="d-flex align-items-center">
        <div class="d-flex align-items-center">
            <img src="{{ asset('img/icon_blue.svg') }}" width="30" alt="iBest">
            <ul class="nav ms-3 ib-navbar">
                <li class="nav-item">
                    <a class="nav-link home" href="{{ route('homePage') }}">iBest.sk</a>
                </li>
            </ul>
        </div>
        <div class="ms-auto">

            @desktop

            <ul class="nav ib-navbar">
                <li class="nav-item">
                    <a class="nav-link" data-bs-toggle="modal" href="#open-search"><i
                            class="fa-solid fa-magnifying-glass small me-1"></i> Vyhľadávanie</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('myListProducts') }}"><i class="fa-regular fa-heart me-1"></i>
                        Moje obľúbené</a>
                </li>
            </ul>

            @elsedesktop

            <button type="button" class="btn btn-lg link-primary" style="line-height: 0;">
                <i class="fa-solid fa-bars"></i>
            </button>

            @enddesktop

        </div>
    </div>
</div>

@include('components.modal_search.modal')
