<?php
namespace App\Http\Controllers\Model;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Excel;
class GEactivityController extends Controller
{

	public function arrayMap($transactions){
		return array_map(function($object){
    		return (array) $object;
		}, $transactions);
	}
   	  
    public function geform(){
        return view('Model.Insert.insert_GEactivity');
    }

    public function addge()
	{
		$atvge_id    = Input::get('ge_id');
		$atvge_name =Input::get('ge_name');
		$atvge_category =Input::get('ge_category');
		$atvge_hour  =Input::get('ge_hour');
		$atvge_year  =Input::get('ge_year');


		//dd($std_id.$std_title.$std_first.$std_last);

		$sql = "INSERT INTO ge_activity VALUES ('$atvge_id','$atvge_name','$atvge_category',
			'$atvge_hour','$atvge_year')";

		 DB::select($sql);
		 return view('Model.ge_activity')->with("msg","add success.");


		 
	}

   	public function editActivity($ge_id){
    	
    	// get all data.
    	$sql = "SELECT * FROM ge_activity WHERE ge_id = $ge_id";
    	$activity_data = DB::select($sql);

    	
    	//dd($activity_data);  
    	$activity_data =$this->arrayMap($activity_data);
    	$activity_data = $activity_data[0];
    	return view('Model.Edit.edit_GEactivity')->with('activity_data',$activity_data);
    }

    public function updateActivity(){



    	$ge_id    = Input::get('ge_id');
		$ge_name =Input::get('ge_name');
		$ge_category =Input::get('ge_category');
		$ge_hour  =Input::get('ge_hour');
		$ge_year  =Input::get('ge_year');


		$sql = "UPDATE ge_activity SET ge_name = '$ge_name' ,
		                           ge_category =  '$ge_category',
			ge_hour = '$ge_hour',ge_year ='$ge_year' WHERE ge_id = $ge_id";

		 DB::select($sql);
		 return view('Model.ge_activity')->with("msg","update success.");
    }

    public function deleteActivity($ge_id){

    	$sql = "DELETE FROM ge_activity WHERE ge_id = $ge_id";
    	DB::select($sql);



		//return view('del');
    	//continue;
		//return ('del');
		//clearData();
    	return view('Model.ge_activity')->with("msg","delete success.");

    }



}