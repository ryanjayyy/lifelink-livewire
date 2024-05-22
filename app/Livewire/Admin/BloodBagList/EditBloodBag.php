<?php

namespace App\Livewire\Admin\BloodBagList;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\BledBy;
use App\Models\Venue;
use App\Models\DonationType;
use App\Models\BloodBag;
use Illuminate\Support\Facades\Session;

class EditBloodBag extends Component
{
    public $createAt;
    public $isEditable = true;
    public $dueDate;

    public $bloodBagId;
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
        return view('admin.partials.bloodbags.edit-blood-bag-modal');
    }

    #[On('openModal')]
    public function editBloodBagModal($bag_id)
    {
        $bag = BloodBag::where('id', $bag_id)->first();
        list($this->serialOne, $this->serialTwo, $this->serialThree) = explode('-', $bag->serial_no);
        $this->bloodBagId = $bag_id;
        $this->bledBy = $bag->bled_by_id;
        $this->venue = $bag->venue_id;
        $this->dateDonated = $bag->date_donated;
        $this->donationType = $bag->donation_type_id;
        $this->createAt = $bag->created_at;
        $this->checkEditable($this->createAt);
    }

    public function checkEditable($date)
    {
        $date =\Carbon\Carbon::parse($date);

        $nonEditableDate = $date->addDays(3);

        $this->isEditable = \Carbon\Carbon::now()->lessThanOrEqualTo($nonEditableDate);
        $this->dueDate = $nonEditableDate->format('F j, Y');

        return $this->isEditable ;
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
        BloodBag::where('id', $this->bloodBagId)->update([
            'serial_no' => $serialNumber,
            'bled_by_id' => $this->bledBy,
            'venue_id' => $this->venue,
            'date_donated' => $this->dateDonated,
            'donation_type_id' => $this->donationType,
        ]);

        dd('saved');
    }
}
