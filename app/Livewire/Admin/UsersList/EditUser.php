<?php

namespace App\Livewire\Admin\UsersList;

use Livewire\Component;
use App\Models\Region;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\Barangay;
use App\Models\User;
use App\Models\MemberDetail;
use Livewire\Attributes\On;

use function Laravel\Prompts\select;

class EditUser extends Component
{
    public $userId;
    public $email;
    public $mobile;
    public $first_name;
    public $middle_name;
    public $last_name;
    public $occupation;
    public $dob;
    public $sex;
    public $blood_type;
    public $region;
    public $province;
    public $municipality;
    public $barangay;
    public $street;
    public $zip_code;

    public $regionList = [];
    public $provinceList = [];
    public $municipalityList = [];
    public $barangayList = [];

    public function render()
    {
        return view('admin.partials.users.edit-user-modal');
    }

    public function mount()
    {
        $this->regionList = Region::get();
    }

    #[On('openModal')]
    public function editAction($user_id)
    {
        $this->userId = $user_id;
        $user = User::find($user_id);
        $member = MemberDetail::where('user_id', $user_id)->first();
        $this->email = $user->email;
        $this->mobile = $user->mobile;
        $this->first_name = $member->first_name;
        $this->middle_name = $member->middle_name;
        $this->last_name = $member->last_name;
        $this->occupation = $member->occupation;
        $this->dob = $member->dob;
        $this->sex = $member->sex_id;
        $this->blood_type = $member->blood_type_id;

        $this->region = $member->region;
        $this->getProvinceList();
        $this->province = $member->province;
        $this->getMunicipalityList();
        $this->municipality = $member->municipality;
        $this->getBarangayList();
        $this->barangay = $member->barangay;
        $this->street = $member->street;
        $this->zip_code = $member->zip_code;
    }

    public function getProvinceList()
    {
        $this->provinceList = Province::where('regCode', $this->region)->get();
    }

    public function getMunicipalityList()
    {
        $this->municipalityList = Municipality::where('provCode', $this->province)->get();
    }

    public function getBarangayList()
    {
        $this->barangayList = Barangay::where('citymunCode', $this->municipality)->get();
    }

    public function editUser()
    {
        $validatedData = $this->validate([
            'email' => 'required|email|unique:users,email,' . $this->userId,
            'mobile' => 'required|unique:users,mobile,' . $this->userId,
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
            'dob' => ['required', 'date', 'before:-17 years'],
            'sex' => 'required',
            'blood_type' => 'required',
            'region' => 'required',
            'province' => 'required',
            'municipality' => 'required',
            'barangay' => 'required',
            'street' => 'required',
            'zip_code' => 'required',
        ]);

        $member = MemberDetail::where('user_id', $this->userId)->first();
        $member->update([
            'first_name' => $this->first_name,
            'middle_name' => $this->middle_name,
            'last_name' => $this->last_name,
            'occupation' => $this->occupation,
            'dob' => $this->dob,
            'sex_id' => $this->sex,
            'blood_type_id' => $this->blood_type,
            'region' => $this->region,
            'province' => $this->province,
            'municipality' => $this->municipality,
            'barangay' => $this->barangay,
            'street' => $this->street,
            'zip_code' => $this->zip_code,
        ]);


    }
}
