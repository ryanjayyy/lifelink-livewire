<div wire:ignore.self class="modal fade" tabindex="-1" id="dispense-modal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Dispense Blood</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>
            <div class="modal-body">
                @if (!empty($selectedIds))
                    <form wire:submit='dispense'>
                        @csrf
                        <div class="row gy-5 g-xl-10">
                            <div class="col-xl-4">
                                @include('admin.partials.inventory.bag-details')
                            </div>
                            <div class="col-xl-8">
                                @include('admin.partials.inventory.dispense-form')
                            </div>
                        </div>

                        <div class="d-flex justify-content-end my-4">
                            <a href="{{ route('admin.inventory.list') }}" class="btn btn-light-primary me-2">Cancel</a>
                            <button type="submit" class="btn btn-primary">Dispense</button>
                        </div>
                    </form>
                @else
                    <!--begin::Alert-->
                        <div
                            class="alert alert-dismissible bg-light-danger d-flex flex-center flex-column py-10 px-10 px-lg-20 mb-10">

                            <!--begin::Icon-->
                            <i class="ki-duotone ki-information-5 fs-5tx text-danger mb-5"><span
                                    class="path1"></span><span class="path2"></span><span class="path3"></span></i>
                            <!--end::Icon-->

                            <!--begin::Wrapper-->
                            <div class="text-center">
                                <!--begin::Title-->
                                <h1 class="fw-bold mb-5">No Bag Selected</h1>
                                <!--end::Title-->

                                <!--begin::Separator-->
                                <div class="separator separator-dashed border-danger opacity-25 mb-5"></div>
                                <!--end::Separator-->

                                <!--begin::Content-->
                                <div class="mb-9 text-gray-900">
                                    <span class="text-gray-600">You are not selecting any blood bag. Please select blood
                                        bag to dispense</span>
                                </div>
                                <!--end::Content-->
                            </div>
                            <!--end::Wrapper-->
                        </div>
                        <!--end::Alert-->
                        <div class="d-flex justify-content-end my-4">
                            <a href="{{ route('admin.inventory.list') }}"
                                class="btn btn-outline btn-outline-danger btn-active-danger m-2">Close</a>
                        </div>
                @endif


            </div>
        </div>
    </div>
</div>
