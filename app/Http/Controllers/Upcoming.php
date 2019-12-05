<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class Upcoming extends Controller
{
    public function get_patients(){
		
		$today_date = date('Y-m-d');
		$today_date_plus_4_weeks = date('Y-m-d', strtotime($today_date. ' + 28 days'));
		
		$deadline = now()->addWeeks(4);
		
		$upcoming_deadlines = User::where("dead_line","<=",$deadline)->where("dead_line",">=",today())->get();
		
		
		return view('upcoming')->with('upcoming_patients_list', $upcoming_deadlines);
		
	}
}
