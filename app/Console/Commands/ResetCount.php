<?php

namespace App\Console\Commands;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class ResetCount extends Command
{

    protected $signature = 'count:reset';

    protected $description = 'Reset the count based on last updated timestamp';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        //get users who have not uploaded today and has more than 0 uploads
        $users = User::where('last_upload','>', Carbon::now()->subDay())->where('upload_count','>',"0")->get();
        foreach ($users as $user) {
            info($user->upload_count);
            //reset upload count
            $user->update([
                'upload_count' => '0',
                'last_upload' => Carbon::now()
            ]);
        }
        $this->info('Count reset successfully');
    }
}
