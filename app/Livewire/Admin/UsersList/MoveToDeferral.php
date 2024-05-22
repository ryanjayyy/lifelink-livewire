<?php

namespace App\Livewire\Admin\UsersList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BledBy;
use App\Models\Venue;
use App\Models\DonationType;
use App\Models\MemberDetail;
use App\Models\BloodBag;
use App\Models\DeferralType;
use App\Models\DeferralCategory;
use App\Models\DeferralList;
use App\Models\User;

class MoveToDeferral extends Component
{
    public $userId;
    public $fullName;
    public $selectedDeferralType;
    public $isDuration = false;
    public $isOtherReason = false;

    public $venue;
    public $dateDeferred;
    public $deferralType;
    public $deferralCategory;
    public $donationType;
    public $duration = 0;
    public $otherReason;
    public $endDate;

    public $venueList;
    public $donationTypeList;
    public $deferralTypeList;
    public $deferralCategoryList = [];

    public function mount()
    {
        $this->venueList = Venue::all();
        $this->donationTypeList = DonationType::all();
        $this->deferralTypeList = DeferralType::all();
    }

    public function render()
    {
        return view('admin.partials.users.move-to-deferral');
    }

    public function getCategoryList()
    {
        $this->deferralCategoryList = DeferralCategory::where('deferral_type_id', $this->deferralType)->get();
        $this->isDuration = $this->deferralType == 1 ? true : false;
    }

    public function inputOtherReason()
    {
        $this->isOtherReason = $this->deferralCategory == 3 ? true : false;
    }

    #[On('openModal')]
    public function addBloodBagModal($user_id)
    {
        $this->userId = $user_id;
        $donor = MemberDetail::where('id', $user_id)->first();

        $this->fullName = $donor->first_name . ' ' . $donor->middle_name . ' ' . $donor->last_name;
    }

    public function decrementDuration()
    {
        if ($this->duration > 0) {
            $this->duration--;
        }
    }
    public function incrementDuration()
    {
        $this->duration++;
    }

    public function addToDeferralList()
    {

        $this->validate([
            'venue' => 'required',
            'dateDeferred' => 'required',
            'deferralType' => 'required',
            'deferralCategory' => 'required',
            'donationType' => 'required',
            'duration' => $this->deferralType == 1 ? 'required' : 'nullable',
            'otherReason' => $this->deferralCategory == 3 ? 'required' : 'nullable',
        ]);

        $this->endDate = date('Y-m-d', strtotime($this->dateDeferred . ' + ' . $this->duration . ' days'));


        DeferralList::create([
            'user_id' => $this->userId,
            'date_deffered' => $this->dateDeferred,
            'deferral_type_id' => $this->deferralType,
            'deferral_category_id' => $this->deferralCategory,
            'donation_type_id' => $this->donationType,
            'duration' => $this->duration,
            'other_reason' => $this->otherReason,
            'deferral_duration' => $this->duration,
            'end_date' => $this->deferralType == 1 ? $this->endDate : null,
        ]);

        User::where('id', $this->userId)->update([
            'isDeferred' => true,
        ]);

        dd('saved');
    }
}
