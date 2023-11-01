@section('others_button')

    @mobile
        <div class="button_flat_group me-1" role="presentation">
            <button type="button" id="others-products-tab" data-bs-toggle="tab" data-bs-target="#others-products-tab-pane" role="tab" class="btn btn-link p-3 rounded-3 button_flat link-secondary w-100">
                <div class="text-center">
                    <i class="fa-solid fs-4 fa-sitemap"></i>
                </div>
                <span class="mini fw-medium opacity-75 lh-1 text-nowrap">Podobné produkty</span>
            </button>
        </div>
    @elsemobile
        <div class="button_flat_group mb-1" role="presentation">
            <button type="button" id="others-products-tab" data-bs-toggle="tab" data-bs-target="#others-products-tab-pane" role="tab" class="btn btn-link p-3 rounded-3 button_flat text-start link-secondary w-100">
                <div class="d-inline-block text-center" style="width: 28px;">
                    <i class="fa-solid fa-sitemap me-2"></i>
                </div>
                Podobné produkty
            </button>
        </div>
    @endmobile

@endsection

@section('others_table')
    osattne prod
@endsection
