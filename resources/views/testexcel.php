
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ไฟล์ลงทะเบียนจากสำนักทะเบียน</title>
<link rel="stylesheet" href="../../public/foundation/css/foundation.css" />
    <script src="../../public/foundation/js/vendor/modernizr.js"></script>
</head>

<body>

<?php
$mysqli = new mysqli("localhost", "root", "", "project-2-2015");
$mysqli->set_charset("utf8");


$filename= isset($_GET['filename'])?$_GET['filename']:"";

if($filename!=""){
/** PHPExcel */
require_once 'Classes/PHPExcel.php';

/** PHPExcel_IOFactory - Reader */
include 'Classes/PHPExcel/IOFactory.php';


$inputFileName = "file/".$filename; 
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
	}

}
}
//print_r($arr_data);
//print_r($namedDataArray); 
?>
<fieldset>
    <legend>กรุณาเลือกฟล์เอ็กเซลจากสำนักทะเบียน(.xlsx)</legend>
<div class="row">
    <form name="form1" method="post" action="save_file.php" enctype="multipart/form-data">
        <input type="file" name="filUpload" class="button info" >
        <label>*หมายเหตุ ต้องเป็นไฟล์นามสกุล .xlsx</label>
        <input name="btnSubmit" type="submit" value="ตกลง" class="button info">
        </br>

    </form>
</div>
</fieldset>

<form action="save_student.php" method="post">
    <fieldset>
    <legend>กรุณากรอกข้อมูลนักศึกษา</legend>

<div class="row">
    
        <label><strong>ปีที่ลงทะเบียน</strong></label>
        <select name="year_reg" >
          <?php for($i=2555;$i<=2560;$i++){?>
          <option value="<?=$i?>" ><?=$i?></option>
          <?php } ?>
        </select>
    
    
        <label><strong>ภาคการศึกษาที่ลงทะเบียนเรียน(1,2,3)</strong></label>
        <select name="semester_ge" >
          <option value="1" >1</option>
          <option value="2" >2</option>
          <option value="3" >3</option>
        </select>

        <?php
        $result_dept = $mysqli->query("SELECT * FROM department");
        ?>
        <label ><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
          <option value="ภาควิชาชีววิทยา" >ภาควิชาชีววิทยา</option>
          <option value="ภาควิชาเคมี" >ภาควิชาเคมี</option>
          <option value="ภาควิชาธรณีวิทยา" >ภาควิชาธรณีวิทยา</option>
          <option value="ภาควิชาฟิสิกส์และวัสดุศาสตร์" >ภาควิชาฟิสิกส์และวัสดุศาสตร์</option>
          <option value="ภาควิชาเคมีอุตสาหกรรม" >ภาควิชาเคมีอุตสาหกรรม</option>
          <option value="ภาควิชาคณิตศาสตร์" >ภาควิชาคณิตศาสตร์</option>
          <option value="ภาควิชาสถิติ" >ภาควิชาสถิติ</option>
          <option value="ภาควิชาวิทยาการคอมพิวเตอร์" >ภาควิชาวิทยาการคอมพิวเตอร์</option>
          <option value="สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม" >สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม</option>
          <option value="สโมสรนักศึกษา" >สโมสรนักศึกษา</option>
        </select> 
        
    
    <input type="submit" value="บันทึก" class="button alert" class="right">
</div>

<div class="row">
    <input id="filter" type="text" class="form-control" placeholder="ป้อนคำค้นที่ต้องการ">
   
</div>



<div class="row">
<table width="700" class="searchable" role="grid">
  <thead>
  	<th><input type="checkbox" onchange="checkAll(this)">เลือกทั้งหมด(แล้วกดบันทึก)</th>
    <th>ที่</th>
    <th>รหัส</th>
    <th>ชื่อ</th>
	<th>นามสกุล</th>
    <th>หมายเหตุ</th>
  </thead>

<?php
//print_r($namedDataArray);
if($filename!=""){
foreach ($namedDataArray  as $result) {
	if($result["B"]!='ที่'){
?>
	  <tr valign="top" align="left">
      <?php $value = $result["C"].",".$result["D"].",".$result["E"]; ?>
	  <td><input type="checkbox" name="student[]" value="<?=$value;?>"></td>
		<td><?=$result["B"];?></td>
		<td><?=$result["C"];?></td>
		<td><?=$result["D"];?></td>
		<td><?=$result["E"];?></td>
		<td><?=$result["F"];?></td>
	  </tr>

	  <?php
	}
}

}
//<?php echo $result['1'];
?>

</table>
</div>
</fieldset>
</form>

<script type="text/javascript" src="../../public/jquery-2.1.4.min.js"></script>
<script type="text/javascript">
 function checkAll(ele) {
     var checkboxes = document.getElementsByTagName('input');
     if (ele.checked) {
         for (var i = 0; i < checkboxes.length; i++) {
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = true;
             }
         }
     } else {
         for (var i = 0; i < checkboxes.length; i++) {
             console.log(i)
             if (checkboxes[i].type == 'checkbox') {
                 checkboxes[i].checked = false;
             }
         }
     }
 }

$(document).ready(function () {

    (function ($) {

        $('#filter').keyup(function () {
        	console.log("xx");
            var rex = new RegExp($(this).val(), 'i');
            $('.searchable tr').hide();
            $('.searchable tr').filter(function () {
                return rex.test($(this).text());
            }).show();

        })

    }(jQuery));
});

</script>

</body>
</html>
