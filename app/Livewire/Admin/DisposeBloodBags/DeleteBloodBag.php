<?php

namespace App\Livewire\Admin\DisposeBloodBags;

use App\Models\DisposedBloodBag;
use Livewire\Component;
use Livewire\Attributes\On;

class DeleteBloodBag extends Component
{
    public $disposeBagId;
    public function render()
    {
        return view('admin.partials.dispose.dispose');
    }

    #[On('openModal')]
    public function diposeModal($dispose_bag_id)
    {
        $this->disposeBagId = $dispose_bag_id;
    }

    public function dispose()
    {
        DisposedBloodBag::findOrFail($this->disposeBagId)->update([
            'status' => false
        ]);

        dd('save');
    }
}
