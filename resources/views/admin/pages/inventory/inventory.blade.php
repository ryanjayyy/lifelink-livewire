@section('title')
    {{ 'Blood Bag List' }}
@endsection

<div class="w-100">
    @include('admin.includes.inventory.inventory-navigation')
    <div class="d-flex justify-content-between align-items-center w-100">
        <div>
            <h1 class="fw-bold text-gray-800 mt-8 mx-4">Inventory</h1>
        </div>
    </div>

    <div class="d-flex justify-content-between gap-4">
        {{-- <div class="card-header pt-5">
            <!--begin::Title-->
            <div class="card-title d-flex flex-column">
                <!--begin::Info-->
                <div class="d-flex align-items-center">
                    <!--begin::Amount-->
                    <span
                        class="fs-2hx fw-bold text-gray-900 me-2 lh-1 ls-n2 badge badge-light-success fs-base">{{ $stockCount }}</span>
                    <!--end::Amount-->
                </div>
                <!--end::Info-->

                <!--begin::Subtitle-->
                <span class="text-gray-500 pt-1 fw-semibold fs-6">Stock Count</span>
                <!--end::Subtitle-->
            </div>
            <!--end::Title-->
        </div> --}}
        <div>

            @if(session()->has('displayButton') && session('displayButton') == true)
                <button type="button" class="btn btn-primary">Button Text</button>
            @endif
        </div>
        <div class="d-flex justify-content-end gap-4">
            <button type="button" class="btn btn-primary mt-8">Export PDF</button>
        </div>

    </div>
    <input type="text" wire:model.lazy="selectedIds" id="selected_ids" name="selected_ids" value="">

    @include('livewire.table')
    @livewire('Admin\Inventory\UndoBloodBag')
    @livewire('Admin\Inventory\DispenseBlood')
    <script>
        function updateSelectedIds(checkbox) {
            let selectedIds;

            try {
                selectedIds = JSON.parse(document.getElementById('selected_ids').value);
            } catch (e) {
                selectedIds = [];
            }

            selectedIds = Array.isArray(selectedIds) ? selectedIds : [];

            const value = checkbox.value;

            if (checkbox.checked) {
                if (!selectedIds.includes(value)) {
                    selectedIds.push(value);
                }
            } else {
                selectedIds = selectedIds.filter(id => id !== value);
            }

            document.getElementById('selected_ids').value = JSON.stringify(selectedIds);

            console.log('Checkbox ID:', value);
            console.log('Selected IDs:', selectedIds);

            Livewire.dispatch('updateSelectedIds', {ids:selectedIds});
        }
    </script>
</div>


@section('page-scripts')
@endsection
