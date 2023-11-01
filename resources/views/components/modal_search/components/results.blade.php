<div class='mt-4'>

    <div class='small text-muted border-bottom border-dark-subtle mb-3 py-1 text-center'>
        Výsledky
    </div>

    @empty($countCategories | $countProducts)

        <div class="text-center text-muted my-3">
            <i class="fa-solid fa-magnifying-glass-minus me-2"></i> Žiadne výsledky pre &#8222;{{ $searchValue }}&#8220;
        </div>

    @endempty

    @if($countCategories)

        @include('components.modal_search.components.result_categories')

    @endif

    @if($countProducts)

        @include('components.modal_search.components.result_products')

    @endif

    <div class='text-center small my-3'>
        <a href='#' class='text-decoration-none'>Zobraziť všetky výsledky</a>
    </div>

</div>
