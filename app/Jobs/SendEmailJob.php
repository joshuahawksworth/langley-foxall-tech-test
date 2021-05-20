<?php

namespace App\Jobs;

use App\Mail\Mailtrap;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Models\User;


class SendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        foreach (User::all() as $user) {
            $email = $user->email;
            $details = app('App\Http\Controllers\WeatherController')->weatherapi($user);
            $weather = $details['weather_response'];
            $location_found = $details['location_found'];

            if($location_found){
                $days_of_week = app('App\Http\Controllers\WeatherController')->days_of_week_arr($weather);
            } else {
                $days_of_week = [];
            }

            $details = [
                'details' => $details,
                'days_of_week' => $days_of_week,
            ];
            if($details['details']['location_found']){
                Mail::to($email)->send(new Mailtrap($details));
            } else {
                return;
            }
        }
    }
}
