<div class="card card-flush h-xl-100 w-100">
    <div class="d-flex align-items-center w-100 text-center">
        <h3 class="fw-bold text-gray-800 me-2 m-4">Blood Bags</h3>
    </div>

    <!--begin::Accordion-->
    <div class="accordion" id="kt_accordion_1">
        @foreach ($bloodBags as $index => $bloodBag)
            <!--begin::Item-->
            <div class="accordion-item">
                <h2 class="accordion-header" id="kt_accordion_1_header_{{ $index }}">
                    <button class="accordion-button fs-4 fw-semibold" type="button" data-bs-toggle="collapse"
                        data-bs-target="#kt_accordion_1_body_{{ $index }}" aria-expanded="true"
                        aria-controls="kt_accordion_1_body_{{ $index }}">
                        <span class="card-label fw-bold text-gray-900">{{ $bloodBag->serial_no ?? '' }}</span>
                    </button>
                </h2>
                <div id="kt_accordion_1_body_{{ $index }}" class="accordion-collapse collapse"
                    aria-labelledby="kt_accordion_1_header_{{ $index }}" data-bs-parent="#kt_accordion_1">
                    <div class="accordion-body">
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Name</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ $bloodBag->first_name ?? '' }}
                                    {{ $bloodBag->middle_name ?? '' }} {{ $bloodBag->last_name ?? '' }}</span>
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Donor #</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ $bloodBag->donor_number ?? '' }}</span>
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Blood Type</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ $bloodBag->blood_type ?? '' }}</span>
                            </div>
                            <!--end::Col-->
                        </div>

                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Date Donated</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ $bloodBag->date_donated ?? '' }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                    </div>
                </div>
            </div>
            <!--end::Item-->
        @endforeach
    </div>
    <!--end::Accordion-->
</div>

