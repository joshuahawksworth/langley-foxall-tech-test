<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Input;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::User();
        return view('home', ['preferred_location' => $user->preferred_location]);
    }
    public function post_preferred_location(Request $request){
        $user = Auth::User();
        $user->preferred_location = $request->input('preferred_location');
        $user->save();
        return view('home', ['preferred_location' => $user->preferred_location]);
    }
}
