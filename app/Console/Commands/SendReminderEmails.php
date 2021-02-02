<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

use App\Models\Equipment;
use App\Models\User;

use Illuminate\Support\Facades\Auth;
use App\Mail\ReminderEmailDigest;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

use Illuminate\Database\Eloquent\Collection;

class SendReminderEmails extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'reminder:emails';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Send email notification to user and remind of maintenance date';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        //Get all maintenance Dates with status warning (one time at maintenance date)

        $equipment = Equipment::with(['user'])
        ->where('maintenance', Carbon::today())
        ->orderBy('user_id')
        ->get();

        //group by user
        $data = [];
        foreach($equipment as $singleEquipment) {
            $data[$singleEquipment->user_id][] = $singleEquipment->toArray();
        }

        

        //send email
        foreach($data as $userId => $equipment){
            $this->sendEmailToUser($userId, $equipment);
        }
    }

    private function sendEmailToUser($userId, $equipment)
        {
            $user = User::find($userId);
            // $user_id = auth()->user()->id;
            // $user = User::find($user_id);

            Mail::to($user)->send(new ReminderEmailDigest($equipment));
        }
}
