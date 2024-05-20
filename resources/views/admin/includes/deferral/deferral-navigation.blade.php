<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('admin.deferral.secure.temporary') ? 'active' : 'nav-item' }}" href="{{ route('admin.deferral.secure.pin') }}/temporary">
            Temporary Deferral
        </a>
    </li>
    <!--end::Nav item-->
    <!--begin::Nav item-->
    <li class="nav-item mt-2">
        <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('admin.deferral.secure.permanent') ? 'active' : 'nav-item' }}" href="{{ route('admin.deferral.secure.pin') }}/permanent">
            Permanent Deferral </a>
    </li>
    <!--end::Nav item-->
</ul>
