<?php

namespace App\Livewire\Admin\Network;

use Livewire\Component;
use App\Models\AdminPost;
use App\Models\BloodRequest;
use App\Models\MemberDetail;
use App\Models\Venue;

class CreatedPost extends Component
{
    public $adminPosts;
    public $searchRequestNumber;
    public $requestNumberList;
    public $venueList;

    public $bloodRequestNumber;
    public $venue;
    public $schedule;
    public $message;

    public function mount()
    {
        $this->adminPosts = AdminPost::where('status', true)
            ->select(
                'admin_posts.id',
                'admin_posts.created_at',
                'admin_posts.donation_date',
                'admin_posts.message',
                'venues.name',
                'blood_types.blood_type'
            )
            ->leftJoin('venues', 'venues.id', '=', 'admin_posts.venue_id')
            ->leftJoin('blood_types', 'blood_types.id', '=', 'admin_posts.blood_type_id')
            ->where('admin_posts.status', true)
            ->get();
        $this->requestNumberList = BloodRequest::select('request_no')->where('isPosted', false)->where('request_status_id', 1)->get();
        $this->venueList = Venue::all();
    }

    public function render()
    {
        return view('admin.pages.network.create-post')->extends('layouts.admin');
    }

    public function requestNoInput()
    {
        $this->requestNumberList = BloodRequest::where('request_no', 'like', '%' . $this->searchRequestNumber . '%')
            ->where('request_status_id', 1)
            ->where('isPosted', false)
            ->get();
    }

    public function findRequest($request_no)
    {
        $request = BloodRequest::where('request_no', 'like', '%' . $request_no . '%')
            ->select('request_no')
            ->where('isPosted', false)
            ->first();

        $this->bloodRequestNumber = $request->request_no;
    }

    public function createPost()
    {
        $this->validate([
            'venue' => 'required',
            'schedule' => 'required',
            'message' => 'required',
        ]);

        $bloodRequest = BloodRequest::where('request_no', $this->bloodRequestNumber)->first();
        $bloodRequest->update([
            'isPosted' => true,
        ]);

        $userId = $bloodRequest->user_id;
        $detail = MemberDetail::where('user_id', $userId)->first();

        AdminPost::create([
            'blood_request_id' => $bloodRequest->id,
            'blood_type_id' => $detail->blood_type_id,
            'donation_date' => $this->schedule,
            'message' => $this->message,
            'venue_id' => $this->venue,
        ]);

        dd('save');
    }

    public function edit($post_id)
    {

        $this->dispatch('openModal', $post_id);
    }
}
