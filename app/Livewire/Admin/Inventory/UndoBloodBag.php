<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;

class UndoBloodBag extends Component
{
    public $isDeletable = true;
    public $bagId;
    public $dueDate;
    public $updatedAt;

    public function render()
    {
        return view('admin.partials.inventory.undo-modal');
    }

    #[On('openModal')]
    public function undoModal($bag_id)
    {
        $this->bagId = $bag_id;
        $bag = BloodBag::where('id', $bag_id)->first();
        $this->updatedAt = $bag->updated_at;
        $this->checkDeletable($this->updatedAt);
    }

    public function checkDeletable($date)
    {
        $date =\Carbon\Carbon::parse($date);

        $nonEditableDate = $date->addDays(3);

        $this->isDeletable = \Carbon\Carbon::now()->lessThanOrEqualTo($nonEditableDate);
        $this->dueDate = $nonEditableDate->format('F j, Y');

        return $this->isDeletable ;
    }

    public function moveBacktoCollected()
    {
        BloodBag::where('id', $this->bagId)->update(['isStored' => false]);

    }
}
