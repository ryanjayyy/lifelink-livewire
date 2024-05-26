<?php

namespace App\Livewire\Admin\UsersList;

use Livewire\Component;
use App\Models\Region;
use App\Models\Province;
use App\Models\Municipality;
use App\Models\Barangay;
use App\Models\User;
use App\Models\MemberDetail;
use App\Models\AuditTrail;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationMail;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\App;

class AddUser extends Component
{
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

    public function mount()
    {
        $this->regionList = Region::get();
    }

    public function render()
    {
        return view('admin.partials.users.add-user-modal');
    }

    public function messages(): array
    {
        return [
            'dob.before' => 'You must be at least 17 years old.',
        ];
    }

    public function registerUser()
    {

        $validatedData = $this->validate([
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|unique:users,mobile',
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

        $password = $validatedData['last_name'] . $validatedData['dob'];

        $memberAccount = User::create([
            'role_id' => 2,
            'email' => $validatedData['email'],
            'mobile' => $validatedData['mobile'],
            'password' => Hash::make($password),
        ]);

        do {
            $donorNumber = rand(10000000, 99999999);
        } while (MemberDetail::where('donor_number', $donorNumber)->exists());

        MemberDetail::create([
            'user_id' => $memberAccount->id,
            'donor_number' => $donorNumber,
            'first_name' => ucwords($validatedData['first_name']),
            'middle_name' => ucwords($validatedData['middle_name']),
            'last_name' => ucwords($validatedData['last_name']),
            'dob' => $validatedData['dob'],
            'sex_id' => $validatedData['sex'],
            'blood_type_id' => $validatedData['blood_type'],
            'region' => $validatedData['region'],
            'province' => $validatedData['province'],
            'municipality' => $validatedData['municipality'],
            'barangay' => $validatedData['barangay'],
            'street' => $validatedData['street'],
            'zip_code' => $validatedData['zip_code'],
        ]);
        Mail::to($validatedData['email'])->send(new RegistrationMail($memberAccount));

        $ip = file_get_contents('https://api.ipify.org');
        $ch = curl_init('http://ipwho.is/' . $ip);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HEADER, false);
        $ipwhois = json_decode(curl_exec($ch), true);
        curl_close($ch);

        $authUser = auth()->user();

        AuditTrail::create([
            'user_id' => $authUser->id,
            'module_category_id' => 1,
            'action' => 'Added User',
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
}
