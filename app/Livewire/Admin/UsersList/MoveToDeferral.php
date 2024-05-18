<?php

namespace App\Livewire\Admin\UsersList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BledBy;
use App\Models\Venue;
use App\Models\DonationType;
use App\Models\MemberDetail;
use App\Models\BloodBag;

class MoveToDeferral extends Component
{
    public $userId;
    public $fullName;

    public $venueList;
    public $donationTypeList;

    public function mount()
    {
        $this->venueList = Venue::all();
        $this->donationTypeList = DonationType::all();
    }

    public function render()
    {
        return view('admin.partials.users.move-to-deferral');
    }

    #[On('openModal')]
    public function addBloodBagModal($user_id)
    {
        $this->userId = $user_id;
        $donor = MemberDetail::where('id', $user_id)->first();

        $this->fullName = $donor->first_name . ' ' . $donor->middle_name . ' ' . $donor->last_name;
    }
}
