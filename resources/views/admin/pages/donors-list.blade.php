@section('title')
    {{ 'Donor List' }}
@endsection

<div class="w-100">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Donor List</h1>
        </div>
    </div>
    <div class="d-flex justify-content-between gap-4">
        <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <!--begin::Amount-->
                    <span
                        class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2 badge badge-light-success fs-base">{{ $donorsCount }}</span>
                    <!--end::Amount-->
                </div>
                <!--end::Info-->

                <!--begin::Subtitle-->
                <span class="text-gray-500 pt-1 fw-semibold fs-6">Donors Count</span>
                <!--end::Subtitle-->
            </div>
            <!--end::Title-->
        </div>
        <div class="d-flex justify-content-end gap-4">
            <button type="button" class="btn btn-primary mt-8">Export PDF</button>
        </div>
    </div>

    @include('livewire.table')
    @livewire('Admin\DonorList\ViewDonor')

</div>


@section('page-scripts')
@endsection
