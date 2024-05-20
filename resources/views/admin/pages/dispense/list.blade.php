@section('title')
    {{ 'Dispense List' }}
@endsection

<div class="w-100">
    @include('admin.includes.dispense.dispense-navigation')
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Dispense List</h1>
        </div>
    </div>
    <div class="d-flex justify-content-end gap-4">
        <div class="d-flex justify-content-end gap-4">
            <button type="button" class="btn btn-primary mt-8">Export PDF</button>
        </div>

    </div>
    @include('livewire.table')
    @livewire('Admin\DispenseList\ViewPatient')
</div>


@section('page-scripts')
@endsection
