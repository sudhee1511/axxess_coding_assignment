<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;

class Process_Missed_Visits extends Controller
{
    public function index(){
		
		//DID not use this as I have processed the follow up field in the missed controller
		$chunk_size = 500;
			
			DB::table('users')
				->where('visit_date', '>', 'dead_ine')
    			->chunkById($chunk_size, function ($users) {
					foreach ($users as $user) {
						DB::table('users')
							->where('id', $user->id)
							->update(['follow_up' => 'missed']);
					}
    		});
	}
}
