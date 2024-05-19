<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
use App\Models\DisposedBloodBag;

class DisposeBlood extends Component
{
    public $bagId;

    public function render()
    {
        return view('admin.partials.inventory.dispose');
    }

    #[On('openModal')]
    public function diposeModal($bag_id)
    {
        $this->bagId = $bag_id;
    }

    public function dispose()
    {
        $bloodbag = Bloodbag::where('id', $this->bagId)->first();
        $bloodbag->isDisposed = true;
        $bloodbag->save();

        DisposedBloodBag::create([
            'blood_bag_id' => $this->bagId,
            'disposed_date' => now(),
            'dispose_by' => 1,
        ]);

        dd("save");
    }
}
