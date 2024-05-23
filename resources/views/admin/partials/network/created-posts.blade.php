<div class="card card-bordered w-100 m-4">
    <!--begin::Body-->
    <div class="card-body">
        <!--begin::Wrapper-->
        <div class="w-100 d-flex justify-content-between align-items-center mb-8">
            <!--begin::Container-->
            <div class="d-flex align-items-center">
                <!--begin::Author-->
                <div class="symbol symbol-50px me-5">
                    <div class="symbol-label fs-1 fw-bold bg-light-success text-success">
                        S
                    </div>
                </div>
                <!--end::Author-->

                <!--begin::Info-->
                <div class="d-flex flex-column fw-semibold fs-5 text-gray-800">
                    <!--begin::Text-->
                    <div class="d-flex align-items-center mb-2">
                        <!--begin::Username-->
                        <a href="/metronic8/demo51/pages/user-profile/overview.html"
                            class="text-gray-800 fw-bold text-hover-primary fs-5 me-3">Philippine Red Cross
                            Valenzuela City Chapter</a>
                        <!--end::Username-->
                    </div>
                    <!--end::Text-->

                    <!--begin::Date-->
                    <span class="text-muted fw-semibold fs-6">{{ $posts->created_at }}</span>
                    <!--end::Date-->
                </div>
                <!--end::Info-->
            </div>
            <!--end::Container-->

            <div class="d-flex align-items-center">
                <button class="btn btn-icon btn-sm btn-light-primary mx-2" wire:click='edit({{ $posts->id }})' data-bs-toggle="modal" data-bs-target="#edit-post-modal">
                    <i class="ki-duotone ki-pencil fs-2x">
                        <span class="path1"></span>
                        <span class="path2"></span>
                    </i>
                </button>
                <button class="btn btn-icon btn-sm btn-light-danger mx-2">
                    <i class="ki-duotone ki-trash fs-2x">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                        <span class="path4"></span>
                        <span class="path5"></span>
                    </i>
                </button>
            </div>
        </div>
        <!--end::Wrapper-->

        <div class="d-flex justify-content-between mb-4">
            <div class="fs-6 fw-semibold text-gray-600">
                <span class="text-gray-800">Donation Date:</span> {{ $posts->donation_date }} <br>
                <span class="text-gray-800">Venue:</span> {{ $posts->name}}
            </div>
            <div class="fs-6 fw-semibold text-gray-600">
                <span class="text-gray-800">Blood Type Need:</span> {{ $posts->blood_type }}
            </div>
        </div>

        <!--begin::Desc-->
        <p class="fw-normal fs-5 text-gray-700">
            {{ $posts->message }}
        </p>
        <!--end::Desc-->
    </div>

    <!--end::Body-->
</div>
