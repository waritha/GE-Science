<?php
namespace App\Http\Controllers;
use App\Http\Controllers\Controller;
use Input;
use DB;
class ExcelController extends Controller
{
// 	public function importfileexcel(){

// 		$srtPath = realpath(basename(getenv($_SERVER["SCRIPT_NAME"])));
// 		$xlsBook = $xlApp->Workbooks->Open(multipart/form-data);
// 		$xlSheet1 = $xlBook->Worksheets(1); 

// 		for($i=2;$i<=5;$i++){
// 			If(trim($xlSheet1->Cells->Item($i,1)) != "")
// 			{
// 				$strSQL = "";
// 				$strSQL .= "INSERT INTO test1 ";
				
// 				$strSQL .= "(CustomerID,Name,Email,CountryCode,Budget,Used) ";
// 				$strSQL .= "VALUES ";
// 				$strSQL .= "('".$xlSheet1->Cells->Item($i,1)."','".$xlSheet1->Cells->Item($i,2)."' ";
// 				$strSQL .= ",'".$xlSheet1->Cells->Item($i,3)."','".$xlSheet1->Cells->Item($i,4)."' ";
// 				$strSQL .= ",'".$xlSheet1->Cells->Item($i,5)."','".$xlSheet1->Cells->Item($i,6)."') ";
// 			}

// 		}
// 		$xlApp->Application->Quit();
// 		$xlApp = null;
// 		$xlBook = null;
// 		$xlSheet1 = null;
// 		echo "Data Import/Inserted.";






// 	}

// public function testcreate()
// {
// 	Excel ::create('Test Create Excel',function($excel)
// 	{
// 		$excel->sheet('Sheetname', function(sheet)
// 		{
// 			$data=[];
// 			array_push($data, array('Cream','Dem'));
// 			$sheet->fromArray($data);
// 		});
// 	})->download('xlsx');
// }

public function textExcel(){

		/** PHPExcel */
		require_once 'Classes/PHPExcel.php';

		/** PHPExcel_IOFactory - Reader */
		include 'Classes/PHPExcel/IOFactory.php';


		$inputFileName = "204491-000001-xlsx.xlsx";  
		$inputFileType = PHPExcel_IOFactory::identify($inputFileName);  
		$objReader = PHPExcel_IOFactory::createReader($inputFileType);  
		$objReader->setReadDataOnly(true);  

		// Start!!Read fileExcel
		$objPHPExcel = $objReader->load($inputFileName);  
		//print_r($objPHPExcel);
		//$total_sheets=$objPHPExcel->getSheetCount(); //จำนวนไฟล์
		//$allSheetName=$objPHPExcel->getSheetNames(); //ชื่อไฟล์

		$objWorksheet = $objPHPExcel->setActiveSheetIndex(0);
		$highestRow = $objWorksheet->getHighestRow();  //จำนวนแถวสุดท้าย highestRow= 51
		$highestColumn = $objWorksheet->getHighestColumn(); //คอลัมสุดท้าย highestColumn= F
		$highestColumnIndex = PHPExcel_Cell::columnIndexFromString($highestColumn);
		$highestColumnIndex--;

		$headingsArray = $objWorksheet->rangeToArray('B7:'.$highestColumn.'7',null, true, true, true);
		$headingsArray = $headingsArray[7];

		$r = -1;
		$namedDataArray = array();

		for ($row = 8; $row <= $highestRow; ++$row) {
			$dataRow = $objWorksheet->rangeToArray('B'.$row.':'.$highestColumn.$row,null, true, true, true);
			//print_r($dataRow);
			if ((isset($dataRow[$row]['B'])) && ($dataRow[$row]['B'] > '')) {
				++$r;
				
				$namedDataArray[$r]= $dataRow[$row];
				//$a=29;
				unset($namedDataArray[29]);
			}

		}

		return view('testexcel2')->with("namedDataArray",$namedDataArray);
}





}