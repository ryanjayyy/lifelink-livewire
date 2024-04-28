<div id="kt_app_sidebar" class="app-sidebar flex-column flex-shrink-0" data-kt-drawer="true"
    data-kt-drawer-name="app-sidebar" data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
    data-kt-drawer-width="auto" data-kt-drawer-direction="start" data-kt-drawer-toggle="#kt_app_sidebar_mobile_toggle">
    <!--begin::Wrapper-->
    <div class="hover-scroll-overlay-y me-lg-4 mb-5" data-kt-sticky="true" data-kt-sticky-name="app-sidebar-menu-sticky"
        data-kt-sticky-offset="{default: false, xl: '400px'}" data-kt-sticky-release="#kt_app_stats"
        data-kt-sticky-width="auto" data-kt-sticky-left="auto" data-kt-sticky-top="100px"
        data-kt-sticky-animation="false" data-kt-sticky-zindex="95" data-kt-scroll="true"
        data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
        data-kt-scroll-dependencies="#kt_app_header, #kt_app_footer" data-kt-scroll-wrappers="#kt_app_sidebar_nav"
        data-kt-scroll-offset="0px">
        <!--begin::Nav-->
        <ul class="nav flex-column w-lg-100" id="kt_app_sidebar_nav">
            <div>
                <!--begin::Nav item-->
                <li class="nav-item mb-2">
                    <!--begin::Nav link-->
                    <a href="#"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ request()->is('home') ? 'nav active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-outline ki-home-2 fs-2"></i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover"
                    title="Create Customer Invoice">
                    <!--begin::Nav link-->
                    <a href="#"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ request()->is('supplier.create.invoice') ? 'nav active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-outline ki-notepad-edit fs-2"></i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover"
                    title="Create Supplier Invoice">
                    <!--begin::Nav link-->
                    <a href="#"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ request()->is('history.create') ? 'nav active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-outline ki-notepad-edit fs-2"></i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover"
                    title="Create Supplier Invoice">
                    <!--begin::Nav link-->
                    <a href="#"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ request()->is('history.create') ? 'nav active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-outline ki-notepad-edit fs-2"></i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover"
                    title="Create Supplier Invoice">
                    <!--begin::Nav link-->
                    <a href="#"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ request()->is('history.create') ? 'nav active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-outline ki-notepad-edit fs-2"></i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover"
                    title="Create Supplier Invoice">
                    <!--begin::Nav link-->
                    <a href="#"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ request()->is('history.create') ? 'nav active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-outline ki-notepad-edit fs-2"></i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover"
                    title="Create Supplier Invoice">
                    <!--begin::Nav link-->
                    <a href="#"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ request()->is('history.create') ? 'nav active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-outline ki-notepad-edit fs-2"></i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
            </div>
            <div>
                <!--begin::Nav item-->
                <li class="nav-item mb-2">
                    <!--begin::Nav link-->
                    <a href="#"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ request()->is('home') ? 'nav active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-outline ki-home-2 fs-2"></i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
            </div>
        </ul>
        <!--end::Tabs-->
    </div>
    <!--end::Nav-->
</div>
