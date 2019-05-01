<?php

namespace App\Traits;

use DB;

trait CommonFunction {

    public function generateTaskSchedule($startDate,$tasks) {

    	$response = array();

    	$versionData = array();

    	$versionName = $this->getVersion();
    	$tableTimestamp = date('Y-m-d H:i:s');

    	$startDate = str_replace('/', '-', $startDate);

    	$versionID = DB::table('versions')->insertGetId(["version_name"=>$versionName,'created_at'=>$tableTimestamp,'updated_at'=>$tableTimestamp]);

    	foreach ($tasks as $key => $task) {
    		
    		if($key==0 || is_null($task->dependency))
    		{
    			//as First task is not depend on any task calculate end date based on duration

    			$taskStartDate = $startDate;

    			$taskStartDateTimeStamp = strtotime($startDate);


    			$taskEndDate = date('Y/m/d', strtotime($taskStartDate . "+ $task->duration days"));

    		}
    		else
    		{

    			//If it is not first task then calculate start date and end date based on dependency

    			$dependency = explode(',', $task->dependency);

    			$taskStartDate = '';

    			foreach ($dependency as $value) {
    				
    				if(strpos($value, 'START'))
    				{
    					$taskID = str_replace('START', '', $value);

    					$dependencyStartDate = $response[$taskID]['start_date'];

    					$tmpStartDate = date('Y/m/d', strtotime($dependencyStartDate. "+ $task->additional_days days"));
    				}
    				else
    				{
    					$taskID = str_replace('END', '', $value);

    					$dependencyEndDate = $response[$taskID]['end_date'];

    					$tmpStartDate = date('Y/m/d', strtotime($dependencyEndDate . "+ $task->additional_days days"));	
    				}

    				if($taskStartDate=='' || (strtotime($tmpStartDate)>strtotime($taskStartDate)))
    					$taskStartDate = $tmpStartDate;
    			
    			}

    			$taskStartDateTimeStamp = strtotime($taskStartDate);

    			$taskEndDate = date('Y/m/d', strtotime($taskStartDate . " + $task->duration days"));


    		}

    		// Data to display schedule to User

    		$response[$task->ID] =  array("start_date"=>$taskStartDate,
    			"end_date"=>$taskEndDate,
    			"taskID"=>$task->ID);


    		$tableTimestamp = date('Y/m/d H:i:s');

    		$tmp = array("versionID"=>$versionID,"taskID"=>$task->ID,

    			"start_date"=>$taskStartDate,"end_date"=>$taskEndDate,'created_at'=>$tableTimestamp,'updated_at'=>$tableTimestamp);

    		array_push($versionData, $tmp);


    	}

    	DB::table('version_data')->insert($versionData);

    	return $response;

    }

    public function getVersion()
    {
    	$totalVersions = DB::table('versions')->count();

    	$versionname = "VERSION".$totalVersions+1;

    	return $versionname;
    }

}