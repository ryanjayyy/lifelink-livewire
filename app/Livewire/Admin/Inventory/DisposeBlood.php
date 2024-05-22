<?php

namespace App\Livewire\Admin\Inventory;

use Livewire\Component;
use Livewire\Attributes\On;
use Illuminate\Support\Facades\Request;

use App\Models\BloodBag;
use App\Models\DisposedBloodBag;
use App\Models\AuditTrail;

class DisposeBlood extends Component
{
    public $bagId;
    public $lastSegment;

    public function mount()
    {
        $this->lastSegment = collect(Request::segments())->last();
    }

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
        $classification = match ($this->lastSegment) {
            'reactive' => 2,
            'spoiled' => 3,
            'expired' => 1,
            default => 0,
        };

        $bloodbag = Bloodbag::where('id', $this->bagId)->first();
        $bloodbag->isDisposed = true;
        $bloodbag->save();

        DisposedBloodBag::create([
            'blood_bag_id' => $this->bagId,
            'disposed_date' => now(),
            'dispose_by' => 1,
            'dispose_classification_id' => $classification,
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
            'module_category_id' => 3,
            'action' => 'Disposed blood bag blood_bag_id = ' . $this->bagId,
            'status' => 'Success',
            'ip_address' => $ipwhois['ip'],
            'region'     => $ipwhois['region'],
            'city'       => $ipwhois['city'],
            'postal'     => $ipwhois['postal'],
            'latitude'   => $ipwhois['latitude'],
            'longitude'  => $ipwhois['longitude'],
        ]);

        dd("save");
    }
}
