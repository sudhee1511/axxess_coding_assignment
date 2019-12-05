<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use App\Missed_visits;

class Missed extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
		//only getting the required attributes as given in the assignment - can get all without mentioning the array
        $missed_patients = User::where("follow_up","missed")->get(array("id", "name", "start_date", "dead_line", "birth_date"));
		
		return response($missed_patients, 200);
    }

    public function makeMissed(){
       $update = User::where("dead_line","<=", "visit_date")->where("dead_line", "<=", today())->whereNull("follow_up")
            ->update(["follow_up"=>"missed"]);
       if($update){
		  return "Successfully updated $update users!!!"; 
	   } else{
		   return "No more  updated  users!!!";
	   }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
