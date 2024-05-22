<div class="card-body p-9">
    <!--begin::Row-->
    <div class="row mb-7">
        <div class="col-lg-6">
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Patient Name</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <span class="fw-bold fs-6 text-gray-800">{{ $patientDetails->first_name ?? '' }}
                        {{ $patientDetails->middle_name ?? '' }} {{ $patientDetails->last_name ?? '' }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Blood Type</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6">{{ $patientDetails->blood_type ?? '' }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Sex</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8 fv-row">
                    <span class="fw-semibold text-gray-800 fs-6">{{ $patientDetails->sex ?? '' }}</span>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
        </div>
        <div class="col-lg-6">
            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Date of Birth</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <a href="#"
                        class="fw-semibold fs-6 text-gray-800 text-hover-primary">{{ $patientDetails->dob ?? '' }}</a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->

            <!--begin::Input group-->
            <div class="row mb-7">
                <!--begin::Label-->
                <label class="col-lg-4 fw-semibold text-muted">Age</label>
                <!--end::Label-->

                <!--begin::Col-->
                <div class="col-lg-8">
                    <a href="#" class="fw-semibold fs-6 text-gray-800 text-hover-primary">
                        {{ $searchSerial == '' ? '' : $patientAge ?? '' }}
                    </a>
                </div>
                <!--end::Col-->
            </div>
            <!--end::Input group-->
        </div>
    </div>

    <hr>

    <div class="card my-2 p-6">
        <h3 class="fs-3 fw-bolder mb-4">Donors</h3>
        <!--begin::Table-->
        <table class="table align-middle table-row-dashed fs-6 gy-3 dataTable" id="kt_table_widget_5_table"
            style="width: 1110.66px;">
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
                <tr class="text-start text-gray-500 fw-bold fs-7 text-uppercase gs-0" role="row">
                    <th class="min-w-150px dt-orderable-asc dt-orderable-desc" data-dt-column="0" rowspan="1"
                        colspan="1" aria-label="Serial Number" tabindex="0"><span class="dt-column-title"
                            role="button">Serial Number</span><span class="dt-column-order"></span></th>
                    <th class="text-end pe-3 min-w-100px dt-orderable-none" data-dt-column="1" rowspan="1"
                        colspan="1" aria-label="Donor Name"><span class="dt-column-title">Donor Name</span><span
                            class="dt-column-order"></span></th>
                    <th class="text-end pe-3 min-w-150px dt-orderable-asc dt-orderable-desc" data-dt-column="2"
                        rowspan="1" colspan="1" aria-label="Blood Type" tabindex="0"><span
                            class="dt-column-title" role="button">Blood Type</span><span
                            class="dt-column-order"></span></th>
                    <th class="text-end pe-3 min-w-100px dt-type-numeric dt-orderable-asc dt-orderable-desc"
                        data-dt-column="3" rowspan="1" colspan="1" aria-label="Date Donated" tabindex="0"><span
                            class="dt-column-title" role="button">Date Donated</span><span
                            class="dt-column-order"></span></th>
                    <th class="text-end pe-3 min-w-100px dt-orderable-asc dt-orderable-desc" data-dt-column="4"
                        rowspan="1" colspan="1" aria-label="Venue" tabindex="0"><span class="dt-column-title"
                            role="button">Venue</span><span class="dt-column-order"></span>
                    </th>
                    <th class="text-end pe-0 min-w-75px dt-type-numeric dt-orderable-asc dt-orderable-desc"
                        data-dt-column="5" rowspan="1" colspan="1" aria-label="Bled By: Activate to sort"
                        tabindex="0"><span class="dt-column-title" role="button">Bled By</span><span
                            class="dt-column-order"></span></th>
                </tr>
                <!--end::Table row-->
            </thead>
            <!--end::Table head-->

            <!--begin::Table body-->
            <tbody class="fw-bold text-gray-600 overflow-y-auto">
                @if ($donorDetails && !empty($donorDetails))
                    @foreach ($donorDetails as $collection)
                        @foreach ($collection as $donorDetail)
                            <tr>
                                <!--begin::Item-->
                                <td>
                                    <span
                                        class="text-gray-900 text-hover-primary">{{ $donorDetail->serial_no ?? '' }}</span>
                                </td>
                                <!--end::Item-->

                                <!--begin::Product ID-->
                                <td class="text-end">
                                    {{ $donorDetail->first_name ?? '' }} {{ $donorDetail->last_name ?? '' }}
                                </td>
                                <!--end::Product ID-->

                                <!--begin::Date added-->
                                <td class="text-end" data-order="2024-04-20T00:00:00+08:00">
                                    {{ $donorDetail->blood_type ?? '' }}
                                </td>
                                <!--end::Date added-->

                                <!--begin::Price-->
                                <td class="text-end dt-type-numeric">
                                    {{ $donorDetail->date_donated ?? '' }}
                                </td>
                                <!--end::Price-->

                                <!--begin::Status-->
                                <td class="text-end dt-type-numeric">
                                    {{ $donorDetail->venue ?? '' }}
                                </td>
                                <!--end::Status-->

                                <!--begin::Qty-->
                                <td class="text-end dt-type-numeric" data-order="58">
                                    <span class="text-gray-900 fw-bold">
                                        {{ $donorDetail->bled_by_first_name ?? '' }}
                                        {{ $donorDetail->bled_by_middle_name ?? '' }}
                                        {{ $donorDetail->bled_by_last_name ?? '' }}
                                    </span>
                                </td>
                                <!--end::Qty-->
                            </tr>
                        @endforeach
                    @endforeach

                @endif

            </tbody>
            <!--end::Table body-->
        </table>
    </div>

    <!--end::Table-->
</div>
