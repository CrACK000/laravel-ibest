@php

    use App\Http\Controllers\ProductDetails;
    use App\Http\Controllers\ProductRating;
    use Illuminate\Support\Str;

@endphp

<div class="container-fluid col-md-8 mb-5 mt-5">

    <div class="d-flex flex-md-row flex-column justify-content-center align-items-start pt-5">
        <div class="col-md-5 me-0 me-md-5">
            <div class="d-flex flex-column text-center text-md-end mt-3">
                <div class="fs-3 lh-1 fw-semibold">Najpredávanejšie produkty</div>
                <div class="small text-muted mt-4">
                    Najviac predávané produkty v našej databáze. Meradlo je nastavené podľa záujmu ľudí a objednávania produktu z obchodu.
                </div>
            </div>
        </div>
        <div class="col-md-7 mt-5 mt-md-0">
            <div class="bg-body-tertiary rounded-5 mw-100 p-4 pt-0">

                <div class="row g-3 g-md-4 flex-wrap">

                    @foreach($best_seller as $key => $product)

                        <div class="col-auto ps-3">
                            <a href="{{ route('product', ['productId' => $product->id]) }}" class="best_product_pill bg-body-secondary py-2 px-3 rounded-4 d-flex align-items-center link-secondary text-decoration-none shadow-hover position-relative">

                                <img src="{{ ProductDetails::main_img_product($product->id, '130x130') }}" alt="{{ $product->title }}" class="remove-bg-img me-3" style="max-height: 38px;">

                                <div class="lh-1">
                                    {{ Str::words($product->title, '4', '') }}
                                </div>

                                <div class="position-absolute top-50 start-0 translate-middle mini text-muted">
                                    @if($loop->first)
                                        <i class="fa-solid fa-trophy text-primary"></i>
                                    @else
                                        {{ $key + 1 }}
                                    @endif
                                </div>

                            </a>
                        </div>

                    @endforeach

                </div>

            </div>
        </div>
    </div>
</div>
