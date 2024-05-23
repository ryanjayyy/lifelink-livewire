@section('title')
    {{ 'Blood Request List' }}
@endsection

<div class="w-100">
    <div class="p-4">
        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('members.blood-network.request') ? 'active' : 'nav-item' }}"
                    href="{{ route('members.blood-network.request') }}">
                    Network
                </a>
            </li>
            <!--end::Nav item-->
            <!--begin::Nav item-->
            <li class="nav-item mt-2">
                <a class="nav-link text-active-primary ms-0 me-10 py-5 {{ Route::is('admin.dispense.list') ? 'active' : 'nav-item' }}"
                    href="#">
                    Request History
                </a>
            </li>
            <!--end::Nav item-->
        </ul>
    </div>

    @include('members.partials.network.schedule-reminder')

    <div class="row gy-5 g-xl-10">
        <!--begin::Col-->
        <div class="col-xl-4">
            @include('members.partials.network.blood-request')
        </div>
        <!--end::Col-->

        <!--begin::Col-->
        <div class="col-xl-8">
            @include('members.partials.network.admin-posts')
        </div>
        <!--end::Col-->
    </div>

</div>


@section('page-scripts')
@endsection
