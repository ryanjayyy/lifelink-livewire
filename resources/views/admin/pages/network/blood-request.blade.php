@section('title')
    {{ 'Blood Bag List' }}
@endsection

<div class="w-100">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Blood Requests</h1>
        </div>
    </div>

    @include('admin.includes.network.network-navigation')

    <div id="kt_billing_payment_tab_content" class="card-body tab-content m-4 p-4">
        <!--begin::Tab panel-->
        <div id="kt_billing_creditcard" class="tab-pane fade show active" role="tabpanel"
            aria-labelledby="kt_billing_creditcard_tab">
            <!--begin::Title-->
            <h3 class="mb-5">My Cards</h3>
            <!--end::Title-->

            <!--begin::Row-->
            <div class="row gx-9 gy-6">
                <!--begin::Col-->
                <div class="col-xl-6" data-kt-billing-element="card">
                    <!--begin::Card-->
                    <div class="card card-dashed h-xl-100 flex-row flex-stack flex-wrap p-6">
                        <!--begin::Info-->
                        <div class="d-flex flex-column py-2">
                            <!--begin::Owner-->
                            <div class="d-flex align-items-center fs-4 fw-bold mb-5">
                                Marcus Morris
                                <span class="badge badge-light-success fs-7 ms-2">Primary</span>
                            </div>
                            <!--end::Owner-->

                            <!--begin::Wrapper-->
                            <div class="d-flex align-items-center">
                                <!--begin::Icon-->
                                <img src="/metronic8/demo51/assets/media/svg/card-logos/visa.svg" alt=""
                                    class="me-4">
                                <!--end::Icon-->

                                <!--begin::Details-->
                                <div>
                                    <div class="fs-4 fw-bold">Visa **** 1679</div>
                                    <div class="fs-6 fw-semibold text-gray-500">Card expires at 09/24</div>
                                </div>
                                <!--end::Details-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Info-->

                        <!--begin::Actions-->
                        <div class="d-flex align-items-center py-2">
                            <button class="btn btn-icon btn-sm btn-active-light-primary me-3" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Accommodated" data-kt-billing-action="card-delete">
                                <i class="ki-duotone ki-check-circle fs-2x">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </button>
                            <button class="btn btn-icon btn-sm btn-active-light-primary ms-3" data-bs-toggle="tooltip"
                                data-bs-placement="top" title="Referred" data-bs-toggle="modal"
                                data-bs-target="#kt_modal_new_card">
                                <i class="ki-duotone ki-arrow-up-right fs-2x">
                                    <span class="path1"></span>
                                    <span class="path2"></span>
                                </i>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
            </div>
            <!--end::Row-->
        </div>
        <!--end::Tab panel-->


    </div>

</div>


@section('page-scripts')
@endsection
