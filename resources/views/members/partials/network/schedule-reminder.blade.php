<div class="notice bg-light-primary rounded border-primary border border-dashed p-4 m-4"
    style="align-items: center; height: auto;">
    <!--begin::Wrapper-->
    <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
        <!--begin::Content-->
        <div class="fw-semibold">
            <h4 class="text-gray-900 fw-bold mb-2">Donation Schedule Reminder</h4>
            @if ($scheduleReminder && $latestRequest->request_status_id !== 1)
                <div class="fs-6 text-gray-700">
                    <h4 class="text-muted">You have an upcoming scheduled donation.</h4>
                    <span class="text-muted fw-bolder">Venue: {{ $scheduleReminder->name }} ({{ $venueAddress }})</span>
                    <br>
                    <span class="text-muted fw-bolder">Schedule:
                        {{ \Carbon\Carbon::parse($scheduleReminder->donation_date)->format('F d, Y \a\\t g:i A') }}</span>

                </div>
            @else
                <div class="fs-6 text-gray-700">
                    You currently don't have any upcoming scheduled donations. Thank you for considering to contribute
                    to this life-saving cause.
                </div>
            @endif

        </div>
        <!--end::Content-->
    </div>
    <!--end::Wrapper-->
</div>
