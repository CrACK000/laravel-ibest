@section('parameters_button')

    @mobile
        <div class="button_flat_group me-1" role="presentation">
            <button type="button" id="parameters-tab" data-bs-toggle="tab" data-bs-target="#parameters-tab-pane" role="tab" class="btn btn-link p-3 rounded-3 button_flat link-secondary w-100">
                <div class="text-center">
                    <i class="fa-solid fs-4 fa-list"></i>
                </div>
                <span class="mini fw-medium opacity-75 lh-1">Parametre</span>
            </button>
        </div>
    @elsemobile
        <div class="button_flat_group mb-1" role="presentation">
            <button type="button" id="parameters-tab" data-bs-toggle="tab" data-bs-target="#parameters-tab-pane" role="tab" class="btn btn-link p-3 rounded-3 button_flat text-start link-secondary w-100">
                <div class="d-inline-block text-center" style="width: 28px;">
                    <i class="fa-solid fa-list me-2"></i>
                </div>
                Parametre
            </button>
        </div>
    @endmobile

@endsection


@section('parameters_table')

    <div class="bg-body-secondary p-3 p-md-5 rounded-5 ">

        @forelse($parameters as $parameter)

            <div class="row border-bottom mb-2">
                <div class="col-5 p-3">
                    {{ $parameter->title }}
                </div>
                <div class="col-7 p-3">
                    <span class="fw-normal text-muted">
                        {{ $parameter->value }}
                    </span>
                </div>
            </div>

        @empty

            Žiadne parametre sa nenašli.

        @endforelse

    </div>

@endsection
