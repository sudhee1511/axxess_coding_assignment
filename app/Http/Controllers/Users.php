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
		$start_date = $user_post->input('start_date_initial_contact');
		$dead_line_date = date('Y-m-d', strtotime($start_date. ' + 90 days'));
		$this->validate(request(), [
            'fullname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required'
        ]);
		
		//using the model lets you save a created_at && updated_at date
		$user = User::create([
		    "name" => $user_post->fullname,
            'email' => $user_post->email,
            "password" => bcrypt($user_post->password),//password are always hashed!! not just encrypted!!
            "birth_date" => Carbon::parse($birthday), //Carbon is used a lot for time manipulation
            "start_date" => now(),//now is a global helper function, today() is another one == Carbon::now()
            "dead_line" => Carbon::parse(now())->addDays(90)
            ]);
//		DB::insert('insert into users(id,name,email,password,birth_date,start_date,dead_line) values(?,?,?,?,?,?,?)',[null,$fullname,$email,$password,$birthday,$start_date,$dead_line_date]);
        
        return $user; // return to home page will be better.. return url('/')
	}
}
