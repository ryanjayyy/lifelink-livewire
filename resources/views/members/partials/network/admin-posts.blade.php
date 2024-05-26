<!--begin::Table Widget 5-->
<div class="card card-flush h-xl-100">
    <!--begin::Card header-->
    <div class="card-header pt-7">
        <!--begin::Title-->
        <h3 class="card-title align-items-start flex-column">
            <span class="card-label fw-bold text-gray-900">Donate </span>
        </h3>
        <!--end::Title-->
    </div>
    <!--end::Card header-->

    <!--begin::Card body-->
    <div class="card-body">
        <div class="row gx-3 gy-4">
            @foreach ($adminPosts as $post)
                <!--begin::Col-->
                <div class="col-xl-6">
                    <!--begin::Card-->
                    <div class="card card-custom card-stretch gutter-b">
                        <!--begin::Header-->
                        <div class="card-header">
                            <h3 class="card-title fw-bold text-dark">
                                Red Cross Valenzuela City Chapters
                            </h3>
                            <span class="badge badge-light-success fs-7">Logo</span>
                        </div>
                        <!--end::Header-->

                        <!--begin::Body-->
                        <div class="card-body">
                            <!--begin::Details-->
                            <div class="mb-4">
                                <p class="fs-6 fw-semibold text-muted mb-2">Venue:</p>
                                <p class="fs-6 fw-semibold text-gray-800">{{ $post->venue }}</p>
                            </div>
                            <div class="mb-4">
                                <p class="fs-6 fw-semibold text-muted mb-2">Donation Date:</p>
                                <p class="fs-6 fw-semibold text-gray-800">{{ $post->donation_date }}</p>
                            </div>
                            <div class="mb-4">
                                <p class="fs-6 fw-semibold text-muted mb-2">Blood Type Needed:</p>
                                <p class="fs-6 fw-semibold text-gray-800">{{ $post->blood_type }}</p>
                            </div>
                            <div class="mb-4">
                                <p class="fs-6 fw-semibold text-muted mb-2">Message:</p>
                                <p class="fs-6 fw-semibold text-gray-800">{{ $post->message }}
                                </p>
                            </div>
                            <!--end::Details-->
                        </div>
                        <!--end::Body-->

                        <!--begin::Footer-->
                        <div class="card-footer d-flex justify-content-end">
                            <button type="button" {{ $isCanInterested ? '' : 'disabled' }} class="btn btn-sm btn-primary me-3" wire:click='imInterested({{ $post->id }}, {{ $post->blood_request_id }})'>
                                <span class="indicator-label">I'm Interested</span>
                            </button>
                        </div>
                        <!--end::Footer-->
                    </div>
                    <!--end::Card-->
                </div>
                <!--end::Col-->
            @endforeach

        </div>
    </div>
    <!--end::Card body-->
</div>
<!--end::Table Widget 5-->
