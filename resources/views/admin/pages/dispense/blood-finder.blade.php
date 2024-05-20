@section('title')
    {{ 'Permanent Deferral' }}
@endsection

<div class="w-100">
    @include('admin.includes.dispense.dispense-navigation')

    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bolder text-gray-800 mt-8 mx-4">Blood Finder</h1>
        </div>
    </div>

    <div class="d-flex justify-content-between">
        <div class="card shadow-sm border" style="width: 500px; height:670px">
            <div class="card-header">
                <h5 class="card-title fw-bolder">Search by Serial Number</h5>
            </div>
            <div class="card-body">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" wire:model="searchSerial" wire:input="serialInput"
                        placeholder="Search by Serial Number">
                </div>
                <div class="list-group overflow-y-auto" style="height: 500px;">
                    @if ($serialNumberList->isEmpty())
                        <p class="text-muted text-center">No serial numbers found</p>
                    @else
                        @foreach ($serialNumberList as $serialNumber)
                            <a wire:click="findSerial('{{ $serialNumber->serial_no }}')" class="list-group-item list-group-item-action">
                                <div class="d-flex w-100 justify-content-between">
                                    <h5 class="mb-1">{{ $serialNumber->serial_no }}</h5>
                                </div>
                            </a>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <div class="card shadow-sm border mx-12 w-100" style="height:670px">
            <div class="card-header">
                <h5 class="card-title fw-bolder">Dispensed Blood Record</h5>
            </div>
            <div class="card-body h-auto">
                @include('admin.partials.dispense.blood-record')
            </div>

            <div class="card-footer d-flex justify-content-evenly">
                <div class="text-center">
                    <h3 class=" align-items-start">
                        <span class="card-label fw-bold text-gray-800">{{ $patientDetails->name ?? '' }}</span>
                    </h3>
                    <span class="text-gray-500 mt-1 fw-semibold fs-6">Hospital</span>
                </div>

                <div class="text-center">
                    <h3 class="card-title align-items-start flex-column">
                        <span class="card-label fw-bold text-gray-800">January 12, 2001</span>
                    </h3>
                    <span class="text-gray-500 mt-1 fw-semibold fs-6">Date Received</span>
                </div>
            </div>
        </div>
    </div>
</div>



@section('page-scripts')
@endsection
