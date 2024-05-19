<?php

namespace App\Livewire\Admin\BloodBagList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
class MoveToStock extends Component
{
    public $bagId;

    public function render()
    {
        return view('admin.partials.bloodbags.move-to-stock');
    }

    #[On('openModal')]
    public function moveToStockModal($bag_id)
    {
        $this->bagId = $bag_id;
    }

    public function moveToStock()
    {
        $bag = BloodBag::where('id', $this->bagId)->first();
        $bag->isStored = true;
        $bag->save();

        dd("saved");
    }
}
