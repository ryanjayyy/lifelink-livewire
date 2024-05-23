<div class="app-navbar flex-shrink-0">
    <!--begin::User menu-->
    <div class="app-navbar-item me-3" id="kt_header_user_menu_toggle">
        <!--begin::Menu wrapper-->
        <div class="btn btn-icon btn-icon-gray-600 border border-dashed border-gray-300 w-35px h-35px w-md-40px h-md-40px" data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-attach="parent" data-kt-menu-placement="bottom-end">
            <i class="ki-outline ki-user fs-3"></i>
        </div>
        <!--begin::User account menu-->
        @include('admin.includes.user-account-menu')
        <!--end::User account menu-->
        <!--end::Menu wrapper-->
    </div>
    <!--end::User menu-->
    {{-- <!--begin::Chat-->
    @include('members.includes.chat')
    <!--end::Chat-->
    <!--begin::Notifications-->
    @include('members.includes.notification')
    <!--end::Notifications-->
    <!--begin::Quick links-->
    @include('members.includes.quick-links')
    <!--end::Quick links-->
    <!--begin::Action-->
    @include('members.includes.action')
    <!--end::Action--> --}}
    <!--begin::Sidebar menu toggle-->
    <div class="app-navbar-item d-flex align-items-center d-lg-none ms-1 me-n3">
        <a href="#" class="btn btn-icon btn-color-gray-500 btn-active-color-primary w-35px h-35px" id="kt_app_header_menu_toggle">
            <i class="ki-outline ki-text-align-left fs-1"></i>
        </a>
    </div>
    <!--end::Sidebar menu toggle-->
</div>
