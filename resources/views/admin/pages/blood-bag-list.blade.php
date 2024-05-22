@section('title')
    {{ 'Blood Bag List' }}
@endsection

<div class="w-100">
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Collected Blood Bags</h1>
        </div>
    </div>
    <div class="d-flex justify-content-between gap-4">
        <div class="d-flex justify-content-start w-100">
            <button type="button" wire:click='bulkMove' data-bs-toggle="modal"
                data-bs-target="#blood-bag-move-to-stock-modal" class="btn btn-primary mt-8">Move to stock</button>

        </div>
        <div class="d-flex justify-content-end w-100">
            @livewire('Admin\UsersList\AddUser')
            <button type="button" class="btn btn-primary mt-8">Export PDF</button>
        </div>
    </div>

    @include('livewire.table')
    @livewire('Admin\BloodBagList\EditBloodBag')
    @livewire('Admin\BloodBagList\RemoveBloodBag')
    @livewire('Admin\BloodBagList\ReferToLaboratory')
    @livewire('Admin\BloodBagList\MoveToStock')
    @livewire('Admin\BloodBagList\MarkUnsafe')

</div>


@section('page-scripts')
@endsection
