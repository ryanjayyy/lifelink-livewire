<?php

namespace App\Livewire\Admin\BloodBagList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BloodBag;
use App\Models\DonorList;
use App\Models\User;

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
        dd("saved");
    }
}
