<?php

namespace App\Livewire\Admin\BloodBagList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
use App\Models\DonorList;
use App\Models\User;
use App\Models\AuditTrail;

class RemoveBloodBag extends Component
{
    public $createAt;
    public $isDeletable = true;
    public $dueDate;
    public $bagId;

    public function render()
    {
        return view('admin.partials.bloodbags.remove-blood-bag-modal');
    }

    #[On('openModal')]
    public function editBloodBagModal($bag_id)
    {
        $this->bagId = $bag_id;
        $bag = BloodBag::where('id', $bag_id)->first();
        $this->createAt = $bag->created_at;
        $this->checkDeletable($this->createAt);
    }

    public function checkDeletable($date)
    {
        $date =\Carbon\Carbon::parse($date);

        $nonEditableDate = $date->addDays(3);

        $this->isDeletable = \Carbon\Carbon::now()->lessThanOrEqualTo($nonEditableDate);
        $this->dueDate = $nonEditableDate->format('F j, Y');

        return $this->isDeletable ;
    }

    public function removeBloodBag()
    {
        $bag = BloodBag::where('id', $this->bagId)->first();
        $userId = $bag->user_id;
        $donor = DonorList::where('user_id', $userId)->first();
        $donor->donate_qty = $donor->donate_qty - 1;
        $donor->save();
        if($donor->donate_qty == 0){
            User::where('id', $userId)->update(['isDonor' => false]);
            $donor->delete();
        }
        $bag->delete();

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
            'action' => 'Removed blood bag blood_bag_id = ' . $this->bagId,
            'status' => 'Success',
            'ip_address' => $ipwhois['ip'],
            'region'     => $ipwhois['region'],
            'city'       => $ipwhois['city'],
            'postal'     => $ipwhois['postal'],
            'latitude'   => $ipwhois['latitude'],
            'longitude'  => $ipwhois['longitude'],
        ]);

        dd('saved');
    }
}
