@php

    use App\Http\Controllers\ProductDetails;
    use App\Http\Controllers\ProductRating;
    use Illuminate\Support\Str;

@endphp

<div class="container-fluid col-md-8 mb-5 pt-5">

    <div class="row g-5 justify-content-center align-items-start pt-5">
        <div class="col-md-4">
            <div class="d-flex flex-column text-center text-md-end mt-3">
                <div class="fs-4 lh-1">Najpredávanejšie produkty</div>
                <div class="small text-muted mt-3">
                    Najviac predávané produkty v našej databáze. Meradlo je nastavené podľa záujmu ľudí a objednávania produktu z obchodu.
                </div>
            </div>
        </div>
        <div class="col-md-8 col-10">
            <div class="bg-body-tertiary rounded-5 mw-100 p-4 pt-0 position-relative">
                <div class="row g-4">
                    @foreach($best_seller as $product)

                        <div class="col-md-4">
                            <div class="bg-body-secondary rounded-4 p-3 h-100 position-relative shadow-hover">
                                <a href="{{ route('product', ['productId' => $product->id]) }}" class="link-secondary text-decoration-none d-flex flex-column h-100">
                                    <div class="text-center">
                                        <img src="{{ ProductDetails::main_img_product($product->id, '130x130') }}" class="mw-100 remove-bg-img" style="max-height: 100px;" alt="{{ $product->title }}">
                                    </div>
                                    <div class="lh-sm my-3 text-center">
                                        {{ Str::words($product->title, '3', '') }}
                                    </div>
                                    <div class="d-flex align-items-end mt-auto">
                                        <div class="text-primary small">
                                            <i class="fa-solid fa-star"></i> {{ ProductRating::percent_rate($product->id) }}%
                                        </div>
                                        @if($product->price > 0)
                                            <div class="ms-auto fw-medium fs-5">{{ round($product->price) }} €</div>
                                        @endif
                                    </div>
                                </a>
                                @if($loop->first)
                                    <div class="position-absolute top-0 start-0 m-3">
                                        <i class="fa-solid fa-trophy text-primary"></i>
                                    </div>
                                @endif
                            </div>
                        </div>
                    @endforeach
                </div>

                @desktop

                    <div class="position-absolute top-50 start-100 translate-middle-y">
                        <button class="main_more_products_button bg-body-secondary ms-4 link-secondary">
                            <i class="fa-solid fa-angle-right fa-lg"></i>
                        </button>
                    </div>

                @enddesktop

            </div>
        </div>
    </div>
</div>
