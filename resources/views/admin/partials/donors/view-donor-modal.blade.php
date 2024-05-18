<div wire:ignore.self class="modal fade" tabindex="-1" id="view-donor-modal">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title fw-bold fs-1">{{ $fullName }}</h5>

                <!--begin::Close-->
                <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal">
                    <i class="ki-duotone ki-cross fs-2x"><span class="path1"></span><span class="path2"></span></i>
                </div>
                <!--end::Close-->
            </div>

            <div class="modal-body">

                {{-- member details --}}

                <div class="card bg-light shadow-sm w-100 my-4">

                    <!--begin::Notice-->
                    <div class="notice d-flex bg-light-warning rounded border-warning border border-dashed  py-6 my-2">
                        <!--begin::Icon-->
                        <i class="ki-outline ki-information fs-2tx text-warning me-4"></i> <!--end::Icon-->
                        <!--begin::Wrapper-->
                        <div class="d-flex flex-stack flex-grow-1 ">
                            <!--begin::Content-->
                            <div class=" fw-semibold">
                                <h4 class="text-gray-900 fw-bold">Last Date Donated</h4>
                                <div class="fs-6 text-gray-700 ">This donor last donated on {{ $lastDateDonated }} <span
                                        class="fw-bold"> Only {{ $daysLeft > 0 ? $daysLeft : '0' }} days</span> left to
                                    eligible to donate again.</div>
                            </div>
                            <!--end::Content-->

                        </div>
                        <!--end::Wrapper-->
                    </div>
                    <!--end::Notice-->
                    <div class="card-body p-9">
                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">donor #</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8 fv-row">
                                <span class="fw-semibold text-gray-800 fs-6">{{ $donorNumber }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">
                                Badge
                            </label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bold fs-6 text-gray-800 me-2">{{ $badge }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">
                                Mobile Number
                            </label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8 d-flex align-items-center">
                                <span class="fw-bold fs-6 text-gray-800 me-2">09683104353</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">Email</label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800 me-2">ryanjayantonio304@gmail.com</span>
                                @if ($isVerifiedEmail)
                                    <span class="badge badge-success">Verified</span>
                                @else
                                    <span class="badge badge-danger">Not Verified</span>
                                @endif

                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->

                        <!--begin::Input group-->
                        <div class="row mb-7">
                            <!--begin::Label-->
                            <label class="col-lg-4 fw-semibold text-muted">
                                Sex
                            </label>
                            <!--end::Label-->

                            <!--begin::Col-->
                            <div class="col-lg-8">
                                <span class="fw-bold fs-6 text-gray-800">{{ $sex }}</span>
                            </div>
                            <!--end::Col-->
                        </div>
                        <!--end::Input group-->
                    </div>

                    <div class="d-flex justify-content-between w-100 ">
                        <div class="card bg-light shadow-sm w-100 mx-3">
                            <div class="card-header">
                                <h3 class="card-title">Donated Blood</h3>
                            </div>
                            <div class="card-body card-scroll h-200px">
                                <div id="kt_table_widget_5_table_wrapper"
                                    class="dt-container dt-bootstrap5 dt-empty-footer">
                                    <div id="" class="table-responsive">
                                        <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable"
                                            id="kt_table_widget_5_table" style="width: 1110.66px;">
                                            <colgroup>
                                                <col style="width: 239.734px;">
                                                <col style="width: 159.828px;">
                                                <col style="width: 239.734px;">
                                                <col style="width: 159.828px;">
                                                <col style="width: 191.609px;">
                                                <col style="width: 119.922px;">
                                            </colgroup>
                                            <!--begin::Table head-->
                                            <thead>
                                                <!--begin::Table row-->
                                                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0"
                                                    role="row">
                                                    <th class="min-w-150px dt-orderable-asc dt-orderable-desc"
                                                        data-dt-column="0" rowspan="1" colspan="1"
                                                        aria-label="Item: Activate to sort" tabindex="0"><span
                                                            class="dt-column-title" role="button">Serial #</span><span
                                                            class="dt-column-order"></span></th>
                                                    <th class="text-end pe-3 min-w-100px dt-orderable-none"
                                                        data-dt-column="1" rowspan="1" colspan="1"
                                                        aria-label="Product ID"><span class="dt-column-title">Date
                                                            </span><span class="dt-column-order"></span>
                                                    </th>
                                                </tr>
                                                <!--end::Table row-->
                                            </thead>
                                            <!--end::Table head-->

                                            <!--begin::Table body-->
                                            <tbody class="fw-bold text-gray-600">
                                                @foreach($donatedBloods as $donatedBlood)
                                                    <tr>
                                                        <!--begin::Item-->
                                                        <td>
                                                            <a href="/metronic8/demo51/apps/ecommerce/catalog/edit-product.html"
                                                               class="text-gray-900 text-hover-primary">{{ $donatedBlood->serial_no }}</a>
                                                        </td>
                                                        <!--end::Item-->

                                                        <!--begin::Product ID-->
                                                        <td class="text-end">
                                                            {{ \Carbon\Carbon::parse($donatedBlood->date_donated)->format('F j, Y') }}
                                                        </td>
                                                        <!--end::Product ID-->
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                            <!--end::Table body-->
                                            <tfoot></tfoot>
                                        </table>
                                    </div>
                                    <div id="" class="row">
                                        <div id=""
                                            class="col-sm-12 col-md-5 d-flex align-items-center justify-content-center justify-content-md-start dt-toolbar">
                                        </div>
                                        <div id=""
                                            class="col-sm-12 col-md-7 d-flex align-items-center justify-content-center justify-content-md-end">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card bg-light shadow-sm w-100 mx-3">
                            <div class="card-header">
                                <h3 class="card-title">Received Blood</h3>
                            </div>
                            <div class="card-body card-scroll h-200px">
                                Lorem Ipsum is simply dummy text...
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
