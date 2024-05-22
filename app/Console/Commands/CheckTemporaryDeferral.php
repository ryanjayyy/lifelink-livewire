<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\DeferralList;
use App\Models\User;

class CheckTemporaryDeferral extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'deferral:temporary-duedate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check deily if the temporary deferral due date is valid ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $tempDeferrals = DeferralList::where('end_date', '<=', now())->where('status', true)->get();
        foreach ($tempDeferrals as $deferral) {
            $user = User::where('id', $deferral->user_id)->first();
            $user->isDeferred = false;
            $user->save();

            $deferral->status = false;
            $deferral->save();
        }
    }
}
