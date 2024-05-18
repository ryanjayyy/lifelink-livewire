<?php

namespace App\Livewire\Admin\UsersList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BledBy;
use App\Models\Venue;
use App\Models\DonationType;
use App\Models\MemberDetail;
use App\Models\BloodBag;

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

        BloodBag::create([
            'user_id' => $this->userId,
            'serial_no' => $serialNumber,
            'bled_by_id' => $this->bledBy,
            'venue_id' => $this->venue,
            'date_donated' => \Carbon\Carbon::parse($this->dateDonated),
            'expiration_date' => \Carbon\Carbon::parse($this->dateDonated)->addDays(37),
            'donation_type_id' => $this->donationType,
        ]);

        dd("saved");
    }

}
