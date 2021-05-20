<?php

namespace Carbon;
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WeatherController extends Controller
{   
    /*
    * Show the application dashboard.
    *
    * @return \Illuminate\Contracts\Support\Renderable
    */
   public function index()
   {    
        $weather_response = $this->weatherapi(Auth::User());
        $weather = $weather_response['weather_response'];
        $location_found = $weather_response['location_found'];
        $message = $weather_response['message'];
        if($location_found){
            $days_week = $this->days_of_week_arr($weather);
        } else {
            $days_week = [];
        }

        return view('weather', [
            'response' => $weather, 
            'days_week' => $days_week,            
            'message' => $message, 
            'location_found' => $location_found, 
        ]);
   }


   public function show($dayname, $id)
   {
        $weather_response = $this->weatherapi(Auth::User());
        $weather_response = $weather_response['weather_response'];
        $days_week = $this->days_of_week_arr($weather_response);
        $id = array_search($dayname, $days_week);
        $x = 0;
        foreach($days_week as $day_week){
            $days_week[$day_week] = $days_week[$x];
            unset($days_week[$x]);
            $x++;
        }

        return view('day', [
            'response' => $weather_response,
            'id' => $id,
            'days_week' => $days_week[$dayname] ?? 'Day ' . $dayname . ' does not exist.',
        ]);
   }

    public function days_of_week_arr($weather_response){
        //Build next 7 days names array
        $days_week = [];
        for ($x = 1; $x <= 7; $x++) {
            $timestamp = $weather_response["daily"][$x]["dt"];
            $timestamp = strtolower(Carbon::createFromTimestamp($timestamp, 'Europe/London')->format('l'));
            array_push($days_week, $timestamp);
        }

       return $days_week;
    }

    public function weatherapi($user){
        $API_KEY = env("WEATHER_API_KEY", "null");
        $pref_location = $user->preferred_location;
        //Geo API *for lon and lat numbers*
        $pref_location_api = 'http://api.openweathermap.org/geo/1.0/direct?q='.$pref_location.'&limit=1&appid='.$API_KEY;
        $pref_location_response = Http::get($pref_location_api)->json();
        if(isset($pref_location_response["cod"]) == "404" || $pref_location_response == null || $pref_location_response == []){
            $pref_location_api = 'http://api.openweathermap.org/geo/1.0/direct?q='.$pref_location.'&limit=1&appid='.$API_KEY;
            $pref_location_response = Http::get($pref_location_api)->json();
            $message = "The location of " . $pref_location . " was not found.";
            $location_found = false;
        } else {
            $message = "for " . $pref_location;
            $location_found = true;
        }

        //Get Lon and Lat numbers
        $lat = $pref_location_response[0]['lat'] ?? "";
        $lon = $pref_location_response[0]['lon'] ?? "";

        //Weather API
        $weather_api = 'https://api.openweathermap.org/data/2.5/onecall?lat='.$lat.'&lon='.$lon.'&units=metric&exclude=current,minutely,hourly,alerts&appid='.$API_KEY;
        $weather_response = Http::get($weather_api)->json();
        
        $weather_response = [
            'weather_response' => $weather_response,
            'location_found' => $location_found,
            'message' => $message
        ];

        return $weather_response;
    }
}
