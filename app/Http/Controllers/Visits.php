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

class Visits extends Controller
{
    public function add_visit_patient(Request $add_visit_details){
//        another way to validate.. Request class has a validate method
        $add_visit_details->validate(["pid"=>"required","visit_date"=>"required|date"]);
        
        $user = User::find($add_visit_details->pid);
        $user->update(["visit_date"=>Carbon::parse($add_visit_details->visit_date)]);
        
        return redirect("/upcoming");
	}
}
