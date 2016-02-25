<?php
namespace App\Http\Controllers\Model;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Excel;
class ActivityController extends Controller
{

	public function arrayMap($transactions){
		return array_map(function($object){
    		return (array) $object;
		}, $transactions);
	}
   	  
    public function form(){
        return view('Model.Insert.insert_activity');
    }

    public function addActivity()
	{
		$atv_id    = Input::get('activity_id');
		$atv_name =Input::get('a_year');
		$atv_year =Input::get('a_name');
		$atv_place  =Input::get('a_place');
		$atv_start  =Input::get('start_date');
		$atv_finish  =Input::get('finish_date');
		$atv_dept_id  =Input::get('dept_id');

		$ge  =Input::get('ge');


		$sql = "INSERT INTO activity VALUES ('$atv_id','$atv_name','$atv_year',
			'$atv_place','$atv_start','$atv_finish','$atv_dept_id')";
		 DB::select($sql);
		 $ac_id_after_id = DB::getPdo()->lastInsertId();

		 foreach ($ge as $row_ge ) {
		 	$sql = "INSERT INTO mapping_ge_activity VALUES ($row_ge,$ac_id_after_id )";
		 	DB::select($sql);
		 }


		 return view('Model.activity')->with("msg","add success.");
	}
    
    public function editactivity($activity_id){
    	
    	// get all data.
    	$sql = "SELECT * FROM activity WHERE activity_id = $activity_id";
    	$act_data = DB::select($sql);

    	
    	//dd($activity_data);  
    	$act_data =$this->arrayMap($act_data);
    	$act_data = $act_data[0];
    	return view('Model.Edit.edit_activity')->with('act_data',$act_data);
    }

    public function updateActivity(){
		$activity_id    = Input::get('activity_id');
		$a_name =Input::get('a_name');
		$a_year =Input::get('a_year');
		$a_place  =Input::get('a_place');
		$start_date  =Input::get('start_date');
		$finish_date  =Input::get('finish_date');
		$dept_id  =Input::get('dept_id');

		//$ge_id = Input::get('ge_id');

		$sql = "UPDATE activity SET a_name = '$a_name' ,
		                           a_year =  '$a_year',
			a_place = '$a_place',start_date ='$start_date',finish_date = '$finish_date'
			,dept_id = '$dept_id'WHERE activity_id = $activity_id";

		$sql1 = "DELETE FROM mapping_ge_activity WHERE activity_id = $activity_id";		//cream
		
		$ge  =Input::get('ge');

		DB::select($sql);
		DB::select($sql1);

 		//$ac_id_after_id = DB::getPdo()->lastInsertId();
		 foreach ($ge as $row_ge ) {
		 $sql2 = "INSERT INTO mapping_ge_activity VALUES ($row_ge,$activity_id)";
		 	DB::select($sql2);
		 }

		 
		
		 return view('Model.activity')->with("msg","update success.");

    }

    public function deleteactivity($activity_id){

    	$sql = "DELETE FROM activity WHERE activity_id = $activity_id";
    	$sql1 = "DELETE FROM mapping_ge_activity WHERE activity_id = $activity_id";	
    	DB::select($sql);
    	DB::select($sql1);



		//return view('del');
    	//continue;
		//return ('del');
		//clearData();
    	return view('Model.activity')->with("msg","delete success.");

    }
    

    



}