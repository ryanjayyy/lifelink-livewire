<?php

namespace App\Livewire\Admin\BloodBagList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
use App\Models\AuditTrail;

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
            'action' => 'Refered to laboratory blood_bag_id = ' . $this->bagId,
            'status' => 'Success',
            'ip_address' => $ipwhois['ip'],
            'region'     => $ipwhois['region'],
            'city'       => $ipwhois['city'],
            'postal'     => $ipwhois['postal'],
            'latitude'   => $ipwhois['latitude'],
            'longitude'  => $ipwhois['longitude'],
        ]);

        dd("saved");
    }
}
