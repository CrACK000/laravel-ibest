<div class="bg-transparent rounded-4 d-flex flex-row align-items-center mb-2 mb-md-4 mt-3 ps-3">

    <div>
        <span class="text-muted opacity-75 me-2 mini text-nowrap">
            Zoradiť podľa:
        </span>
    </div>

    <div class="me-auto small d-flex align-items-center flex-nowrap overflow-x-auto py-3 rounded-end-4 position-relative">
        <a href="{{ route('filter', ['sort_by' => 'top']) }}" @class([
                                                                    'link_sort py-1 px-2 rounded-2 link-secondary mx-1',
                                                                    'link_sort_active' => $getSortBy == 'top' or !$getSortBy ])>
            Najobľúbenejší
        </a>
        <a href="{{ route('filter', ['sort_by' => 'best_seller']) }}" @class([
                                                                    'link_sort py-1 px-2 rounded-2 link-secondary mx-1',
                                                                    'link_sort_active' => $getSortBy == 'best_seller' ])>
            Najpredávanejší
        </a>
        <a href="{{ route('filter', ['sort_by' => 'price_asc']) }}" @class([
                                                                    'link_sort py-1 px-2 rounded-2 link-secondary mx-1',
                                                                    'link_sort_active' => $getSortBy == 'price_asc' ])>
            Najlacnejší
        </a>
        <a href="{{ route('filter', ['sort_by' => 'price_desc']) }}" @class([
                                                                    'link_sort py-1 px-2 rounded-2 link-secondary mx-1',
                                                                    'link_sort_active' => $getSortBy == 'price_desc' ])>
            Najdrahší
        </a>
    </div>

    @desktop

        <div class="d-flex align-items-center pe-3">
            <a class="link-secondary" href="{{ route('filter', ['show' => 'box']) }}">
                <div class="p-2 lh-1">
                    <i class="fa-solid fa-grip fs-5"></i>
                </div>
            </a>

            <div class="vr my-2 mx-3 opacity-25"></div>

            <a class="link-secondary" href="{{ route('filter', ['show' => 'list']) }}">
                <div class="p-2 lh-1">
                    <i class="fa-solid fa-bars fs-5"></i>
                </div>
            </a>
        </div>

    @enddesktop

</div>
