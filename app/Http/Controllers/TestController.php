<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Input;
use DB;
use Excel;
class TestController extends Controller
{




	public function testcreate()
{
	Excel ::create('Test Create Excel',function($excel)
	{
		$excel->sheet('Sheetname', function($sheet)
		{
			$data=[];
			array_push($data, array('Cream','Dem'));
			$sheet->fromArray($data);
		});
	})->download('xlsx');
}
	public function testread()
	{
   	  Excel::load('file.xls', function($reader) {

    // Getting all results
    $results = $reader->get();

    // ->all() is a wrapper for ->get() and will work the same
    $results = $reader->all();

	});
    
   } 

   public function test1234(){
   		
if ($_FILES["file"]["error"] > 0)
 {
 echo "Error: " . $_FILES["file"]["error"] . "<br>";
 }
else
 {
 echo "Upload: " . $_FILES["file"]["name"] . "<br>";
 echo "Type: " . $_FILES["file"]["type"] . "<br>";
 echo "Size: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
 echo "Stored in: " . $_FILES["file"]["tmp_name"];
 }

 }



 	public function gettest(){

 	return view('test');
 	}

 	public function postUpload(){

 		/*
 		if(Input::hasFlie('flie')){
 			$flies = input::flie('file');
 			$flie  = fopen($flies,"r");
 			while (($emapData = fgetcsv($flie,10000, ",")) !== FALSE) 
 			{
 				# code...
 				$insert = import::create(array('student_id => $emapData[0]',
 												'student_name => $emapData[1]'
 						));
 			}

 			if($insert){

 				return Redirect::route('getImport');
 			}
 		}

		*/
		Excel::load('public/test-excel.xlsx', function($reader)
		{
			$result=$reader->get();
			foreach ($result as $key => $value) 
			{
				# code...
				echo $value->student_id.'<br>';
			}


		})->get();









 		}



}
?>