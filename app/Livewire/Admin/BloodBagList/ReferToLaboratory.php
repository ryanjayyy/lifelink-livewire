<?php

namespace App\Livewire\Admin\BloodBagList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;

class ReferToLaboratory extends Component
{

    public $bagId;

    public function render()
    {
        return view('admin.partials.bloodbags.refer-to-laboratory');
    }

    #[On('openModal')]
    public function referToLaboratoryModal($bag_id)
    {
        $this->bagId = $bag_id;
    }

    public function referToLaboratory()
    {
        $bag = BloodBag::where('id', $this->bagId)->first();
        $bag->isTested = true;
        $bag->save();

        dd("saved");
    }
}
