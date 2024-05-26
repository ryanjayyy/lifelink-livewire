<?php

namespace App\Livewire\Members\BloodNetwork;

use Livewire\Component;

use App\Models\AdminPost as Post;
use App\Models\BloodRequest;
use App\Models\BloodComponent;
use App\Models\RequestInterestedDonor;

class AdminPost extends Component
{
    public $adminPosts;
    public $userId;
    public $isCanInterested;

    public function render()
    {
        return view('members.partials.network.admin-posts');
    }

    public function mount()
    {
        $this->userId = auth()->user()->id;

        $this->adminPosts = Post::select(
            'admin_posts.id',
            'admin_posts.blood_request_id',
            'admin_posts.donation_date',
            'admin_posts.message',
            'blood_types.blood_type',
            'venues.name as venue'
        )
            ->leftJoin('venues', 'venues.id', '=', 'admin_posts.venue_id')
            ->leftJoin('blood_requests', 'admin_posts.blood_request_id', '=', 'blood_requests.id')
            ->leftJoin('blood_types', 'admin_posts.blood_type_id', '=', 'blood_types.id')
            ->leftJoin('request_interested_donors', 'request_interested_donors.admin_post_id', '=', 'admin_posts.id')
            ->where('blood_requests.request_status_id', 1)
            ->where('request_interested_donors.user_id', '!=', $this->userId)
            ->orWhere('request_interested_donors.user_id', null)
            ->get();

        $this->isCanInterested = $this->checkIfEligible();
    }

    public function imInterested($postId, $bloodRequestId)
    {
        RequestInterestedDonor::create([
            'admin_post_id' => $postId,
            'blood_request_id' => $bloodRequestId,
            'user_id' => $this->userId,
        ]);

        dd('saved');
    }

    public function checkIfEligible()
    {
        $request = BloodRequest::where('blood_requests.user_id', $this->userId)
            ->select('blood_requests.created_at', 'blood_requests.blood_units', 'blood_components.name', 'blood_requests.diagnosis', 'blood_requests.hospital', 'blood_requests.transfusion_date', 'blood_requests.request_status_id', 'request_statuses.name as status')
            ->leftJoin('blood_components', 'blood_requests.blood_component_id', '=', 'blood_components.id')
            ->leftJoin('request_statuses', 'blood_requests.request_status_id', '=', 'request_statuses.id')
            ->latest()
            ->first();


        $reminder = RequestInterestedDonor::where('user_id', $this->userId)
            ->leftJoin('admin_posts', 'admin_posts.id', '=', 'request_interested_donors.admin_post_id')
            ->leftJoin('venues', 'venues.id', '=', 'admin_posts.venue_id')
            ->where('admin_posts.status', true)
            ->latest('request_interested_donors.created_at')
            ->first();

        if ($request == null) {
            return true;
        }

        return ($reminder == null && $request->request_status_id != 1) ? true : false;

    }
}
