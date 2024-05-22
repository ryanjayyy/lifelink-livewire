<?php

namespace App\Livewire\Admin\BloodBagList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
use App\Models\UnsafeBloodBags;
use App\Models\UnsafeReason;
use App\Models\AuditTrail;


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
            'action' => 'Marked unsafe blood_bag_id = ' . $this->bagId,
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
