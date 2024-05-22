<?php

namespace App\Livewire\Admin\DisposeBloodBags;

use App\Models\DisposedBloodBag;
use App\Models\AuditTrail;
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

        $ip = file_get_contents('https://api.ipify.org');
        $ch = curl_init('http://ipwho.is/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $ipwhois = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $authUser = auth()->user();
        AuditTrail::create([
            'user_id' => $authUser->id,
            'module_category_id' => 6,
            'action' => 'Permanently Disposed blood bag blood_bag_id = ' . $this->disposeBagId,
            'status' => 'Success',
            'ip_address' => $ipwhois['ip'],
            'region'     => $ipwhois['region'],
            'city'       => $ipwhois['city'],
            'postal'     => $ipwhois['postal'],
            'latitude'   => $ipwhois['latitude'],
            'longitude'  => $ipwhois['longitude'],
        ]);

        dd('save');
    }
}
