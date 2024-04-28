<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="12,0" class="menu-item menu-lg-down-accordion me-0 me-lg-2">
    <!--begin:Menu link-->
    <span class="menu-link">
        <span class="menu-title">Orders</span>
        <span class="menu-arrow d-lg-none"></span>
    </span>
    <!--end:Menu link-->
    <!--begin:Menu sub-->
    <div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0">
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="ki-outline ki-rocket fs-2"></i>
                </span>
                <a href="#" class="{{request()->is('transactions')?'menu-link active':'menu-link'}}" wire:navigate>Transaction List</a></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
        <!--begin:Menu item-->
        <div data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-placement="right-start" class="menu-item menu-lg-down-accordion">
            <!--begin:Menu link-->
            <span class="menu-link">
                <span class="menu-icon">
                    <i class="ki-outline ki-rocket fs-2"></i>
                </span>
                <a href="#" class="{{request()->is('shipping')?'menu-link active':'menu-link'}}" wire:navigate>Shipping Details</a></span>
            </span>
            <!--end:Menu link-->
            <!--begin:Menu sub-->
            <!--end:Menu sub-->
        </div>
        <!--end:Menu item-->
    </div>
    <!--end:Menu sub-->
</div>
