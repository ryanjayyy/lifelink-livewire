<?php

namespace App\Livewire\Admin\Network;

use Livewire\Component;
use Illuminate\Support\Facades\DB;

use App\Models\BloodRequest as Request;

class BloodRequest extends Component
{
    public $bloodRequests;
    public $totalInterestedDonor;

    public $allRequest;

    public function mount()
    {
        $this->bloodRequests = Request::where('blood_requests.request_status_id', 1)
            ->select(
                'blood_requests.id',
                'blood_requests.created_at',
                'blood_requests.blood_units',
                'blood_requests.request_no',
                'blood_components.name as blood_components',
                'blood_requests.diagnosis',
                'blood_requests.hospital',
                'blood_requests.transfusion_date',
                'blood_requests.request_status_id',
                'request_statuses.name as status',
                DB::raw("CONCAT(member_details.first_name, ' ', member_details.middle_name, ' ', member_details.last_name) as full_name"),
                'blood_types.blood_type',
                'users.email',
                'users.mobile',
            )
            ->leftJoin('blood_components', 'blood_requests.blood_component_id', '=', 'blood_components.id')
            ->leftJoin('request_statuses', 'blood_requests.request_status_id', '=', 'request_statuses.id')
            ->leftJoin('member_details', 'blood_requests.user_id', '=', 'member_details.user_id')
            ->leftJoin('blood_types', 'member_details.blood_type_id', '=', 'blood_types.id')
            ->leftJoin('users', 'blood_requests.user_id', '=', 'users.id')
            ->orderBy('blood_requests.request_status_id', 'asc')
            ->get();
    }

    public function render()
    {
        return view('admin.pages.network.blood-request')->extends('layouts.admin');
    }
}
