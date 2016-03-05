
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ทดสอบ</title>
<link rel="stylesheet" href="../../public/foundation/css/foundation.css" />
    <script src="../../public/foundation/js/vendor/modernizr.js"></script>
</head>

<body>

<?php
// $mysqli = new mysqli("localhost", "root", "", "project-2-2015"); itop
$mysqli = new mysqli(env('DB_HOST', 'localhost'), env('DB_USERNAME', 'root'), env('DB_PASSWORD', ''), env('DB_DATABASE', 'ge_science'));

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

//แสดงฐานข้อมูลจากกิจกรรม

$host=env('DB_HOST', 'localhost'); // กำหนด host
$username=env('DB_USERNAME', 'root'); // กำหนด username
$pass_word=env('DB_PASSWORD', ''); // กำหนด Password
$db=env('DB_DATABASE', 'ge_science'); // กำหนดชื่อฐานข้อมูล
$Conn = mysql_connect( $host,$username,$pass_word) or die ("ติดต่อฐานข้อมูลไม่ได้");// ติดต่อฐานข้อมูล
mysql_query("SET NAMES utf8",$Conn); // set กำหนดมาตราฐาน
mysql_select_db($db) or die("เลือกฐานข้อมูลไม่ได้"); // เลือกฐานข้อมูล
$sql = "select * from activity";
$result = mysql_query($sql) or die(mysql_error());

?>
<fieldset>
    <legend>กรุณาเลือกฟล์เอ็กเซลจากรายชื่อผู้เข้าร่วมกิจกรรม(.xlsx)</legend>

<div class="row">
    <form name="form1" method="post" action="save_file_part.php" enctype="multipart/form-data">
        <input type="file" name="filUpload" class="button info" >
        <label>*หมายเหตุ ต้องเป็นไฟล์นามสกุล .xlsx</label>
        <input name="btnSubmit" type="submit" value="ตกลง" class="button info">
        </br>

    </form>
</div>
</fieldset>

<form action="save_partexcel.php" method="post">
    <fieldset>
    <legend>กรุณาเลือกกิจกรรมที่เข้าร่วม</legend>


    <table width="700" class="searchable" role="grid">
        <thead>
            <th>เลือกกิจกรรม(ได้เพียงกิจกรรมเดียว)</th>
            <th>ปีการศึกษา</th>
            <th>ชื่อกิจกรรม</th>
            <th>สถานที่จัด</th>
            <th>วันที่จัด(ปี-เดือน-วัน)</th>
            <th>สิ้นสุดวันที่จัด(ปี-เดือน-วัน)</th>
        </thead>

        <?php
        while($row = mysql_fetch_array($result))
        {
        ?>
        <tr>
            <td>
                <?php
                        $activity_id = $row['activity_id'];
                    ?>
                    <!-- <input class="css_data_item" type="checkbox" value="<?=$activity_id ?>" name="activity_id[]"> -->
                    <input class="css_data_item" type="radio" value="<?=$activity_id ?>" name="activity_id[]"  id="radio" >


            </td>
            <td><?php   echo $row['a_year']; ?></td>
            <td><?php   echo $row['a_name']; ?></td>
            <td><?php   echo $row['a_place']; ?></td>
            <td><?php   echo $row['start_date']; ?></td>
            <td><?php   echo $row['finish_date']; ?></td>


        </tr>
      <?php
}
?>
    </table>

<div class="row">


    <input type="submit" value="บันทึก" class="button alert" class="right" onclick="check_submit()">

</div>


<div class="row">
    <input id="filter" type="text" class="form-control" placeholder="ป้อนคำค้นที่ต้องการ">

</div>



<div class="row">
<table width="700" class="searchable" role="grid">
  <thead>
    <th><input type="checkbox" onchange="checkAll(this)">เลือกทั้งหมด(แล้วกดบันทึก)</th>
    <th>ที่</th>
    <th>รหัสนักศึกษาที่เข้าร่วม</th>
    <th>หมายเหตุ</th>
  </thead>

<?php
//print_r($namedDataArray);
if($filename!=""){
foreach ($namedDataArray  as $result) {
  if($result["B"]!='ที่'){
?>
    <tr valign="top" align="left">
      <?php $value = $result["C"]; ?>
    <td><input type="checkbox" name="participation[]" value="<?=$value;?>"></td>
    <td><?=$result["B"];?></td>
    <td><?=$result["C"];?></td>
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

//new
$(function(){

    $(".css_data_item").click(function(){  // เมื่อคลิก checkbox  ใดๆ
        if($(this).prop("checked")==true){ // ตรวจสอบ property  การ ของ
            var indexObj=$(this).index(".css_data_item"); //
            $(".css_data_item").not(":eq("+indexObj+")").prop( "checked", false ); // ยกเลิกการคลิก รายการอื่น
        }
    });

    $("#form_checkbox1").submit(function(){ // เมื่อมีการส่งข้อมูลฟอร์ม
        if($(".css_data_item:checked").length==0){ // ถ้าไม่มีการเลือก checkbox ใดๆ เลย
            alert("NO");
            return false;
        }
    });

});


//not null in radio
function check_submit(){

var txt = document.getElementById("textfield");
var chk = document.getElementById("checkbox");
var rad = document.getElementById("radio");
var frm =  document.getElementById("form1");

if(txt.value != ''){

if (chk.checked==false){
alert("Hey Man!,u forget check your checkbox");
}
if(rad.checked==false){
alert("Hey Man!,u forget check your radio button");
}
if(chk.checked==true && rad.checked==true){
alert("R u Ready for submit");
frm.submit();
}
}else{
alert("R u Ready for submit");
frm.submit();
}
}
</script>

</body>
</html>
