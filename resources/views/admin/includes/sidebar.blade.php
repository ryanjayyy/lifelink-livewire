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
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Dashboard">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.dashboard.dashboard') }}"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ Route::is('admin.dashboard.dashboard') ? 'active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-home fs-2qx"></i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Users List">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.users.list') }}"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ Route::is('admin.users.list') ? 'active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-profile-user fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Donors List">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.donors.list') }}"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ Route::is('admin.donors.list') ? 'active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-emoji-happy fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Blood Bags">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.blood-bag.list') }}"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ Route::is('admin.blood-bag.list') ? 'active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-office-bag fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                        </i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Inventory">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.inventory.list') }}"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600
                                {{ Route::is('admin.inventory.list') || Route::is('admin.inventory.secure.reactive') || Route::is('admin.inventory.secure.spoiled') || Route::is('admin.inventory.expired') || Route::is('admin.inventory.secure.pin') ? 'active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-external-drive fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Deferral List">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.deferral.secure.pin') }}/temporary"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ Route::is('admin.deferral.secure.temporary') || Route::is('admin.deferral.secure.permanent') ? 'active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-shield-cross fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                        </i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Dispense">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.dispense.blood-finder') }}"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ Route::is('admin.dispense.blood-finder') ? 'active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-heart fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover"
                    title="Dispose Blood Bags">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.dispose.blood-bag') }}"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ Route::is('admin.dispose.blood-bag') ? 'active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-trash fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                            <span class="path3"></span>
                            <span class="path4"></span>
                            <span class="path5"></span>
                        </i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Blood Network">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.network.blood-request') }}"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ Route::is('admin.network.blood-request') ? 'active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-heart fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="Activity Log">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.activity-log.list') }}"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ Route::is('admin.activity-log.list') ? 'active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-heart fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
                <!--begin::Nav item-->
                <li class="nav-item mb-2" data-bs-toggle="tooltip" data-bs-trigger="hover" title="MBD Report">
                    <!--begin::Nav link-->
                    <a href="{{ route('admin.dispense.blood-finder') }}"
                        class="nav-link btn btn-icon btn-active-info btn-color-gray-600 {{ request()->is('history.create') ? 'nav active' : 'nav-item' }}"
                        wire:navigate data-bs-toggle="tab">
                        <i class="ki-duotone ki-heart fs-2qx">
                            <span class="path1"></span>
                            <span class="path2"></span>
                        </i>
                    </a>
                    <!--end::Nav link-->
                </li>
                <!--end::Nav item-->
            </div>
        </ul>
        <!--end::Nav-->
    </div>
    <!--end::Nav-->
</div>
