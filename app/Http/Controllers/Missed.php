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
        //$this->makeMissed();
        $missed_patients = User::where("follow_up","missed")->get();
		
		return response($missed_patients, 200);
    }

    public function makeMissed(){
       $update = User::where("dead_line","<=", now())->whereNull("follow_up")
            ->whereNull("visit_date")->update(["follow_up"=>"missed"]);
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
