<!--begin::List widget 5-->
<div class="card card-flush " style="height: 500px;">
    <!--begin::Header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-900">Recent Blood Request</span>
            <span class="text-gray-500 mt-1 fw-semibold fs-6"></span>
        </h3>
        <!--end::Title-->

        <!--begin::Toolbar-->
        <div class="card-toolbar">
            <button
                class="btn btn-sm btn-{{ $latestRequest && $latestRequest->request_status_id == 1 ? 'danger disabled' : 'primary' }}"
                data-bs-toggle="modal" data-bs-target="#blood-request-form">Create
                Request</button>
        </div>
        <!--end::Toolbar-->
    </div>
    <!--end::Header-->

    <!--begin::Body-->
    <div class="card-body">
        @if ($latestRequest)
            <div class="mb-5 mb-xl-10">
                <!--begin::List widget 1-->
                <div class="card card-flush h-lg-100">
                    <!--begin::Header-->
                    <div class="card-header pt-5">
                        <!--begin::Title-->
                        <h3 class="card-title align-items-start flex-column">
                            <span class="card-label fw-bold text-gray-900">{{ $latestRequest->created_at }}</span>
                            <span class="text-gray-500 mt-1 fw-semibold fs-6">Requested Date</span>
                        </h3>
                        <!--end::Title-->
                    </div>
                    <!--end::Header-->

                    <!--begin::Body-->
                    <div class="card-body pt-5">
                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Section-->
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Blood Units Needed</div>
                            <!--end::Section-->

                            <!--begin::Statistics-->
                            <div class="d-flex align-items-senter">
                                <!--begin::Number-->
                                <span class="text-gray-900 fw-bolder fs-6">{{ $latestRequest->blood_units }}</span>
                                <!--end::Number-->
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--end::Separator-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Section-->
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Blood Component</div>
                            <!--end::Section-->

                            <!--begin::Statistics-->
                            <div class="d-flex align-items-senter">
                                <!--begin::Number-->
                                <span class="text-gray-900 fw-bolder fs-6">{{ $latestRequest->name }}</span>
                                <!--end::Number-->

                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--end::Separator-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Section-->
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Diagnosis</div>
                            <!--end::Section-->

                            <!--begin::Statistics-->
                            <div class="d-flex align-items-senter">
                                <!--begin::Number-->
                                <span class="text-gray-900 fw-bolder fs-6">{{ $latestRequest->diagnosis }}</span>
                                <!--end::Number-->
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--end::Separator-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Section-->
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Hospital</div>
                            <!--end::Section-->

                            <!--begin::Statistics-->
                            <div class="d-flex align-items-senter">
                                <!--begin::Number-->
                                <span class="text-gray-900 fw-bolder fs-6">{{ $latestRequest->hospital }}</span>
                                <!--end::Number-->
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--end::Separator-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Section-->
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Transfusion Date</div>
                            <!--end::Section-->

                            <!--begin::Statistics-->
                            <div class="d-flex align-items-senter">
                                <!--begin::Number-->
                                <span class="text-gray-900 fw-bolder fs-6">{{ $latestRequest->transfusion_date }}</span>
                                <!--end::Number-->
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Item-->

                        <!--begin::Separator-->
                        <div class="separator separator-dashed my-3"></div>
                        <!--end::Separator-->

                        <!--begin::Item-->
                        <div class="d-flex flex-stack">
                            <!--begin::Section-->
                            <div class="text-gray-700 fw-semibold fs-6 me-2">Request Status</div>
                            <!--end::Section-->

                            <!--begin::Statistics-->
                            <div class="d-flex align-items-senter">
                                <!--begin::Number-->
                                <span class="text-gray-900 fw-bolder fs-6">{{ $latestRequest->status }}</span>
                                <!--end::Number-->
                            </div>
                            <!--end::Statistics-->
                        </div>
                        <!--end::Item-->

                    </div>
                    <!--end::Body-->
                </div>
                <!--end::LIst widget 1-->
            </div>
        @else
            <p class="fs-6 text-gray-600 fw-semibold mb-6 mb-lg-15">No recent blood request.</p>
        @endif
    </div>
    <!--end::Body-->
</div>
<!--end::List widget 5-->

@include('members.partials.network.blood-request-form-modal')
