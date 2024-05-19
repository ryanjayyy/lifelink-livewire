@section('title')
    {{ 'Blood Bag List' }}
@endsection

<div class="w-100">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Inventory</h1>
        </div>
    </div>
    @include('livewire.table')
    @livewire('Admin\Inventory\UndoBloodBag')
    @livewire('Admin\Inventory\DispenseBlood')

</div>


@section('page-scripts')
@endsection
