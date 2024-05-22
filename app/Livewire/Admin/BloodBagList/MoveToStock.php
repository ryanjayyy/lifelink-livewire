<?php

namespace App\Livewire\Admin\BloodBagList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
use App\Models\AuditTrail;

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

            $ip = file_get_contents('https://api.ipify.org');
            $ch = curl_init('http://ipwho.is/' . $ip);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($ch, CURLOPT_HEADER, false);
            $ipwhois = json_decode(curl_exec($ch), true);
            curl_close($ch);

            $authUser = auth()->user();
            AuditTrail::create([
                'user_id' => $authUser->id,
                'module_category_id' => 2,
                'action' => 'Moved to stock blood_bag_id = ' . $id,
                'status' => 'Success',
                'ip_address' => $ipwhois['ip'],
                'region'     => $ipwhois['region'],
                'city'       => $ipwhois['city'],
                'postal'     => $ipwhois['postal'],
                'latitude'   => $ipwhois['latitude'],
                'longitude'  => $ipwhois['longitude'],
            ]);
        }


        dd('saved');
    }
}
