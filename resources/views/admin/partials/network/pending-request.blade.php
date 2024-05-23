<div id="kt_billing_payment_tab_content" class="card-body  m-4 p-4">
    <!--begin::Tab panel-->
    <div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel"
        aria-labelledby="kt_billing_creditcard_tab">
        <!--begin::Title-->
        <h3 class="mb-5">Blood Requests</h3>
        <!--end::Title-->

        @foreach ($bloodRequests as $request)
            <!--begin::Row-->
            <div class="row gy-4 my-4">
                <!--begin::Col-->
                <div class="col-xl-6">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch">
                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Info-->
                            <div class="d-flex flex-column py-2">
                                <div class="d-flex justify-content-between align-items-center w-100">
                                    <!--begin::Owner-->
                                    <div class="d-flex align-items-center fs-5 fw-bold mb-4">
                                        {{ $request->full_name }}
                                        <span
                                            class="badge
                                        @if ($request->request_status_id == 1) badge-light-warning
                                        @elseif($request->request_status_id == 2) badge-light-success
                                        @elseif($request->request_status_id == 3) badge-light-danger @endif
                                        fs-7 ms-2">
                                            {{ $request->status }}
                                        </span>
                                    </div>
                                    <!--end::Owner-->
                                    <div>
                                        <div class="fs-6 fw-semibold text-gray-600">#{{ $request->request_no }}</div>
                                    </div>
                                </div>


                                <!--begin::Details-->
                                <div class="row row-cols-2 g-4">
                                    <div class="col">
                                        <div class="fs-6 fw-semibold text-gray-600">{{ $request->email }}</div>
                                        <div class="fs-5 fw-semibold text-gray-600">{{ $request->mobile }}</div>
                                        <div class="fs-6 fw-semibold text-gray-600">Blood Type:
                                            {{ $request->blood_type }}</div>
                                    </div>
                                    <div class="col">
                                        <div class="fs-6 fw-semibold text-gray-600">Blood Units Need:
                                            {{ $request->blood_units }}</div>
                                        <div class="fs-6 fw-semibold text-gray-600">Blood Components:
                                            {{ $request->blood_components }}</div>
                                    </div>
                                </div>
                                <!--end::Details-->

                                <hr>

                                <!--begin::Details-->
                                <div class="row row-cols-2 g-4">
                                    <div class="col">
                                        <div class="fs-6 fw-semibold text-gray-600">Diagnosis:
                                            {{ $request->diagnosis }}</div>
                                    </div>
                                    <div class="col">
                                        <div class="fs-6 fw-semibold text-gray-600">Hospital:
                                            {{ $request->hospital }}</div>
                                    </div>
                                </div>
                                <!--end::Details-->

                                <!--begin::Details-->
                                <div class="fs-6 fw-semibold text-gray-600 mt-3">Transfusion Date:
                                    {{ $request->transfusion_date }}</div>
                                <!--end::Details-->
                            </div>
                            <!--end::Info-->
                        </div>
                        <!--end::Body-->

                        <!--begin::Footer-->
                        <div class="card-footer d-flex justify-content-between">

                            <div class="fs-6 fw-semibold text-gray-600">Total Interested Donor:
                                {{ $totalInterestedDonor ? $totalInterestedDonor : 0 }}
                            </div>

                            <div>
                                <button class="btn btn-icon btn-sm btn-active-light-primary me-3"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Accommodated">
                                    <i class="ki-duotone ki-check-circle fs-2x">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                                <button class="btn btn-icon btn-sm btn-active-light-primary ms-3"
                                    data-bs-toggle="tooltip" data-bs-placement="top" title="Referred">
                                    <i class="ki-duotone ki-arrow-up-right fs-2x">
                                        <span class="path1"></span>
                                        <span class="path2"></span>
                                    </i>
                                </button>
                            </div>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
            </div>

            <!--end::Row-->
        @endforeach

    </div>
    <!--end::Tab panel-->


</div>
