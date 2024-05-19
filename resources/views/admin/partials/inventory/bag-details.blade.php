<div class="card card-flush h-xl-100 w-100">
    <!--begin::Header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bolder text-gray-700 fs-1">Blood Bag Details</span>
        </h3>
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-900">{{ $bloodBag->serial_no ?? 'N/A' }}</span>
            <span class="text-gray-500 mt-1 fw-semibold fs-6">serial number</span>
        </h3>
        <!--end::Title-->
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body">
        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Name</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $bloodBag->first_name ?? 'N/A' }} {{ $bloodBag->middle_name ?? 'N/A' }} {{ $bloodBag->last_name ?? 'N/A'}}</span>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Donor #</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $bloodBag->donor_number ?? 'N/A' }}</span>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Blood Type</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $bloodBag->blood_type ?? 'N/A'}}</span>
            </div>
            <!--end::Col-->
        </div>

        <div class="row mb-7">
            <!--begin::Label-->
            <label class="col-lg-4 fw-semibold text-muted">Date Donated</label>
            <!--end::Label-->

            <!--begin::Col-->
            <div class="col-lg-8">
                <span class="fw-bold fs-6 text-gray-800">{{ $bloodBag->date_donated ?? 'N/A'}}</span>
            </div>
            <!--end::Col-->
        </div>
    </div>
    <!--end::Body-->
</div>
