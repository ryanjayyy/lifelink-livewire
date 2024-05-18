<?php

namespace App\Livewire\Admin\DonorList;

use Livewire\Component;
use Livewire\Attributes\On;
use Carbon\Carbon;

use App\Models\BloodBag;
use App\Models\MemberDetail;
use App\Models\DonorList;
use App\Models\User;

class ViewDonor extends Component
{
    public $userId;
    public $fullName;
    public $lastDateDonated;
    public $daysLeft;
    public $donorNumber;
    public $badge;
    public $isVerifiedEmail;
    public $sex;
    public $donatedBloods = [];

    public function render()
    {
        return view('admin.partials.donors.view-donor-modal');
    }

    #[On('openModal')]
    public function viewDonor($user_id)
    {
        $this->userId = $user_id;

        $donor = MemberDetail::where('user_id', $user_id)->first();
        $bloodBag = BloodBag::where('user_id', $user_id)->orderBy('date_donated', 'desc')->get();
        $donorList = DonorList::where('user_id', $user_id)
            ->leftJoin('badge_types', 'donor_lists.badge_type_id', '=', 'badge_types.id')
            ->select('badge_types.*', 'donor_lists.*')
            ->get();

        $lastBloodBag = $bloodBag->first();
        $this->lastDateDonated = $lastBloodBag ? Carbon::parse($lastBloodBag->date_donated)->format('F j, Y') : null;

        if ($this->lastDateDonated) {
            $nextEligibleDate = Carbon::parse($lastBloodBag->date_donated)->addDays(90);
            $this->daysLeft = number_format(Carbon::now()->diffInDays($nextEligibleDate, false), 0, '.', ',');
        } else {
            $this->daysLeft = 'N/A';
        }

        $this->donorNumber = $donor->donor_number;
        $this->fullName = $donor->first_name . ' ' . $donor->middle_name . ' ' . $donor->last_name;
        $this->badge = $donorList->first()->badge_type ?? 'No badge yet';
        $this->isVerifiedEmail = User::where('id', $user_id)->first()->email_verified_at ? true : false;
        $this->sex = $donor->sex_id == 1 ? 'Male' : 'Female';

        $this->donatedBloods = $bloodBag;
    }
}
