<?php

namespace App\Livewire\Admin\BloodBagList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
use App\Models\UnsafeBloodBags;
use App\Models\UnsafeReason;

class MarkUnsafe extends Component
{
    public $bagId;

    public $reason;
    public $remarks;

    public $unsafeReasons;
    public function mount()
    {
        $this->unsafeReasons = UnsafeReason::where('status', 1)->get();
    }
    public function render()
    {
        return view('admin.partials.bloodbags.mark-unsafe-modal');
    }

    #[On('openModal')]
    public function markUnsafeModal($bag_id)
    {
        $this->bagId = $bag_id;
    }

    public function messages(): array
    {
        return [
            'reason.required' => 'Reason is required.',
        ];
    }

    public function markUnsafe()
    {
        $this->validate([
            'reason' => 'required',
        ]);

        $bag = BloodBag::where('id', $this->bagId)->first();
        $bag->isUnsafe = true;
        $bag->save();

        UnsafeBloodBags::create([
            'blood_bag_id' => $this->bagId,
            'reason_id' => $this->reason,
            'remarks' => $this->remarks,
        ]);

        dd("saved");
    }
}
