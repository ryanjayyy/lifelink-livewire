<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\BloodBag;

class CheckExpiredBlood extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'bloodbag:expired';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Check deily if the blood bag expired ';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $bloodBag = BloodBag::where('expiration_date', '<=', now())
            ->where('isUsed', false)
            ->where('isExpired', false)
            ->where('isDisposed', false)
            ->get();

        foreach ($bloodBag as $bag) {
            $bag->isExpired = true;
            $bag->save();
        }
    }
}
