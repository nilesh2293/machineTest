<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Traits\CommonFunction;
use DB;

class ScheduleController extends Controller
{
	use CommonFunction;

//Lists All tasks 
	public function list(Request $request)
	{	
		$tasks = DB::Table('tasks')->get()->toArray();

		$response = array();

		return view('welcome',compact('tasks','response'));
	}

    //generate schedule

	public function generateSchedule(Request $request)
	{
		$start_date = $request->start_date;
		$tasks = DB::Table('tasks')->get()->toArray();

		$response = $this->generateTaskSchedule($start_date,$tasks);

		return view('welcome',compact('tasks','response'));

	}
}
