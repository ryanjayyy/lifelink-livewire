<?php

namespace App\Livewire\Admin\Network;

use Livewire\Component;
use Livewire\Attributes\On;

use App\Models\Venue;
use App\Models\BloodRequest;
use App\Models\AdminPost;

class EditPost extends Component
{
    public $postId;
    public $bloodRequestNumber;

    public $venue;
    public $schedule;
    public $message;

    public $venueList;

    public function mount()
    {
        $this->venueList = Venue::all();
    }

    public function render()
    {
        return view('admin.partials.network.edit-post-modal');
    }

    #[On('openModal')]
    public function setAdminId($post_id)
    {
        $this->postId = $post_id;
        $post = AdminPost::where('id', $post_id)->first();
        $request = BloodRequest::where('id', $post->blood_request_id)->first();

        $this->bloodRequestNumber = $request->request_no;
        $this->venue = $post->venue_id;
        $this->schedule = $post->donation_date;
        $this->message = $post->message;
    }


    public function saveEditPost()
    {
        $this->validate([
            'venue' => 'required',
            'schedule' => 'required',
            'message' => 'required',
        ]);

        $post = AdminPost::where('id', $this->postId)->first();

        $post->update([
            'venue_id' => $this->venue,
            'donation_date' => $this->schedule,
            'message' => $this->message,
        ]);

        dd('saved');
    }
}
