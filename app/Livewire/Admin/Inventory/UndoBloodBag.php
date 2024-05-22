<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
use App\Models\AuditTrail;

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

        $ip = file_get_contents('https://api.ipify.org');
        $ch = curl_init('http://ipwho.is/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $ipwhois = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $authUser = auth()->user();
        AuditTrail::create([
            'user_id' => $authUser->id,
            'module_category_id' => 3,
            'action' => 'Moved back to collected blood_bag_id = ' . $this->bagId,
            'status' => 'Success',
            'ip_address' => $ipwhois['ip'],
            'region'     => $ipwhois['region'],
            'city'       => $ipwhois['city'],
            'postal'     => $ipwhois['postal'],
            'latitude'   => $ipwhois['latitude'],
            'longitude'  => $ipwhois['longitude'],
        ]);
    }
}
