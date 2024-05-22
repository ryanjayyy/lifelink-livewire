<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('admin.network.blood-request') ? 'active' : 'nav-item' }}" href="{{ route('admin.network.blood-request') }}">
            Blood Request
        </a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('admin.dispense.list') ? 'active' : 'nav-item' }}" href="#">
            Created Posts
        </a>
    </li>
    <!--end::Nav item-->
</ul>
