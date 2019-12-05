<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Carbon\Carbon;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class Users extends Controller
{
    public function add_patient(request $user_post){
		
		$fullname = $user_post->input('fullname');
		$email = $user_post->input('email');
		$password = $user_post->input('password');
		$year = $user_post->input('year');
		$day = $user_post->input('day');
		if($day < 10) $day = '0'.$day;
		$month = $user_post->input('month');
		$birthday = '';
		$birthday .= $year.'-'.$month.'-'.$day;
		$start_date = $user_post->input('start_date');
		$dead_line_date = date('Y-m-d', strtotime($start_date. ' + 90 days'));
		
		//using the model saves the created_at && updated_at date
		$user = User::create([
		    "name" => $user_post->fullname,
            'email' => $user_post->email,
            "password" => bcrypt($user_post->password),//password hashing
            "birth_date" => Carbon::parse($birthday), //used carbon for time manipulation
            "start_date" => Carbon::parse($start_date),
            "dead_line" => Carbon::parse($start_date)->addDays(90)
            ]);
        
        return $user; // returning the user added in the json format - could also return with view or any url
	}
}
