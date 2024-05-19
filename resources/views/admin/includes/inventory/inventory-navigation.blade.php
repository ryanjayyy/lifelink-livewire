<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('admin.inventory.list') ? 'active' : 'nav-item' }}" href="{{ route('admin.inventory.list') }}">
            Stocks
        </a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('admin.inventory.expired') ? 'active' : 'nav-item' }}" href="{{ route('admin.inventory.expired') }}">
            Expired Blood Bags </a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('admin.inventory.secure.reactive') ? 'active' : 'nav-item' }}" href="{{ route('admin.inventory.secure.pin') }}/reactive">
            Reactive Blood Bags </a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('admin.inventory.secure.spoiled') ? 'active' : 'nav-item' }}" href="{{ route('admin.inventory.secure.pin') }}/spoiled">
            Spoiled Blood Bags </a>
    </li>
    <!--end::Nav item-->
</ul>
