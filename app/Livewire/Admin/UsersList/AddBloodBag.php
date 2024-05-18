<?php

namespace App\Livewire\Admin\UsersList;

use Livewire\Component;
use Livewire\Attributes\On;
use Carbon\Carbon;

use App\Models\BledBy;
use App\Models\Venue;
use App\Models\DonationType;
use App\Models\MemberDetail;
use App\Models\BloodBag;
use App\Models\User;
use App\Models\DonorList;
use App\Models\BadgeType;

class AddBloodBag extends Component
{
    public $fullName;
    public $canDonated = false;
    public $donorLastDonated;

    public $userId;
    public $serialOne;
    public $serialTwo;
    public $serialThree;
    public $bledBy;
    public $venue;
    public $dateDonated;
    public $donationType;

    public $bledByList;
    public $venueList;
    public $donationTypeList;

    public function mount()
    {
        $this->bledByList = BledBy::all();
        $this->venueList = Venue::all();
        $this->donationTypeList = DonationType::all();
    }

    public function render()
    {
        return view('admin.partials.users.add-bloodbag-modal');
    }

    #[On('openModal')]
    public function addBloodBagModal($user_id)
    {
        $this->userId = $user_id;
        $donor = MemberDetail::where('id', $user_id)->first();
        $this->checkLastDateDonated($user_id);

        $this->fullName = $donor->first_name . ' ' . $donor->middle_name . ' ' . $donor->last_name;
    }

    public function checkLastDateDonated($user_id)
    {
        $donor = BloodBag::where('user_id', $user_id)->latest()->first();
        $dateDonated = $donor ? $donor->date_donated : null;

        if (!$dateDonated || (\Carbon\Carbon::parse($dateDonated)->diffInDays(\Carbon\Carbon::today()) >= 90)) {
            $this->canDonated = true;
        }else{
            $this->canDonated = false;
            $this->donorLastDonated = $dateDonated;
        }
    }
    public function messages(): array
    {
        return [
            'serialOne.digits' => 'Serial Number must be 4 digits.',
            'serialOne.digits' => 'This field must be 4 digits.',
            'serialOne.required' => 'This field is required.',
            'serialTwo.digits' => 'Serial Number must be 6 digits.',
            'serialTwo.digits' => 'This field must be 6 digits.',
            'serialTwo.required' => 'This field is required.',
            'serialThree.digits' => 'Serial Number must be 1 digit.',
            'serialThree.digits' => 'This field must be 1 digit.',
            'serialThree.required' => 'This field is required.',
            'bledBy.required' => 'This field is required.',
            'venue.required' => 'This field is required.',
            'dateDonated.required' => 'This field is required.',
            'dateDonated.before_or_equal' => 'Date must not be in the future.',
            'donationType.required' => 'This field is required.',

        ];
    }
    public function saveBloodBag()
    {
        $validatedData = $this->validate([
            'serialOne' => ['required', 'digits:4'],
            'serialTwo' => ['required', 'digits:6'],
            'serialThree' => ['required', 'digits:1'],
            'bledBy' => 'required',
            'venue' => 'required',
            'dateDonated' => [
                'required',
                'date',
                'before_or_equal:today',
                function($attribute, $value, $fail) {
                    $expiryDate = \Carbon\Carbon::parse($value)->addDays(30); //days of expiration
                    if ($expiryDate->isBefore(\Carbon\Carbon::now())) {
                        $fail('The blood has already expired.');
                    }
                }
            ],
            'donationType' => 'required',
        ]);


        $serialNumber = $this->serialOne . '-' . $this->serialTwo . '-' . $this->serialThree;
        $donateQty = BloodBag::where('user_id', $this->userId)->count();


        User::where('id', $this->userId)->update(['isDonor' => true]);

        $donorType = 0;

        if(!$donateQty || $donateQty == 0) {

            $donorType = 1;

        }elseif($donateQty >= 1){

            $lastDateDonated = BloodBag::where('user_id', $this->userId)->latest('date_donated')->first();
            $currentDonationDate = Carbon::parse($this->dateDonated);
            $daysDifference = intval($currentDonationDate->diffInDays($lastDateDonated ? $lastDateDonated->date_donated : null));
            $daysDifference = abs($daysDifference);
            $oneYearDays = intval(Carbon::parse($this->dateDonated)->diffInDays(Carbon::parse($this->dateDonated)->subYear(1)));
            if ($daysDifference == $oneYearDays) {
                $donorType = 3;
            }else{
                $donorType = 4;
            }


        }elseif($donateQty >= 8){
            $donorType = 4;
        }

        $badgeType = $this->getBadgeType($donateQty);

        $donorList = DonorList::where('user_id', $this->userId)->first();

        BloodBag::create([
            'user_id' => $this->userId,
            'serial_no' => $serialNumber,
            'bled_by_id' => $this->bledBy,
            'venue_id' => $this->venue,
            'date_donated' => \Carbon\Carbon::parse($this->dateDonated),
            'expiration_date' => \Carbon\Carbon::parse($this->dateDonated)->addDays(37),
            'donation_type_id' => $this->donationType,
        ]);

        if (!$donorList) {
            DonorList::create([
                'user_id' => $this->userId,
                'donate_qty' => 1,
                'badge_type_id' => $badgeType,
                'donor_type_id' => $donorType
            ]);
        } else {
            DonorList::where('user_id', $this->userId)->update([
                'donate_qty' => $donorList->donate_qty + 1,
                'badge_type_id' => $badgeType,
                'donor_type_id' => $donorType
            ]);
        }

        dd("saved");
    }

    public function getBadgeType($donaQty)
    {
        $totalDonation = $donaQty + 1;
        $bronze = BadgeType::where('type', 'bronze')->value('min_donated');
        $silver = BadgeType::where('type', 'silver')->value('min_donated');
        $gold = BadgeType::where('type', 'gold')->value('min_donated');

        if($totalDonation >= $gold) {
            return 3;
        }elseif($totalDonation >= $silver) {
            return 2;
        }elseif($totalDonation >= $bronze) {
            return 1;
        }else{
            return 0;
        }
    }
}
