<?php

namespace App\Livewire\Admin\BloodBagList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
class MoveToStock extends Component
{
    public $selectedBagIds = [];

    public $bagId;

    public function render()
    {
        return view('admin.partials.bloodbags.move-to-stock');
    }

    #[On('openModal')]
    public function moveToStockModal($bag_id)
    {
        $this->selectedBagIds[] = $bag_id;
    }

    #[On('moveSelectedBloodBags')]
    public function setSelectedIds($ids)
    {
        $this->selectedBagIds = $ids;

    }


    public function moveToStock()
    {
        foreach ($this->selectedBagIds as $id) {
            $bag = BloodBag::where('id', $id)->first();
            $bag->isStored = true;
            $bag->save();
        }

        dd('saved');
    }
}
