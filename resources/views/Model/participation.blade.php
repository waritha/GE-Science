@extends('admin.layouts.template')
@section('content')
<html>
<head>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
    <title>Participation</title>

</head>
<body>



 <div class="col-lg-12">
 <h3 class="page-header">ลงชื่อทำกิจกรรม</h3>
 </div>


	<fieldset>
	<div class="row">
<input id="filter" type="text" class="form-control" placeholder="ป้อนคำค้นที่ต้องการ">
</div>
<div class="row">
<table border=0 role="grid" class="searchable">
<b>ตารางสำหรับเลือกกิจกรรมจริงเพื่อลงชื่อการเข้าร่วมกิจกรรม</b>
	<thead>
		
		<th>หมายเหตุ</th>
		<th>ปีการศึกษา</th>
		<th>ชื่อกิจกรรม</th>
		<th>สถานที่จัด</th>
		<th>วันที่จัด(ปี-เดือน-วัน)</th>
		<th>สิ้นสุดวันที่จัด(ปี-เดือน-วัน)</th>
        <th>ลงชื่อเข้าร่วม</th>
		

	</thead>




<?php

$users = DB::table('activity')->get();
foreach($users as $user){
	?>
	<tr>
		<td> 
			<?php
				$activity_id = $user->activity_id;
			?>
           
            <a class="btn btn-default" href="{{ url('viewdetail/'.$activity_id) }}" role="button">ดูรายละเอียดเพิ่มเติม</a>
            
			</td>
		<td><?php 	echo $user->a_year; ?></td>
        <td><?php 	echo $user->a_name;?></td>
        <td><?php   echo $user->a_place;?></td>
        <td><?php   echo $user->start_date;?></td>
        <td><?php   echo $user->finish_date;?></td>
        <td>
            <!-- เพิ่มทีละคนแบบธรรมดา
            <a class="btn btn-default" href="{{ url('partselect/'.$activity_id) }}" role="button">รายคน</a> -->
          <!--   เพิ่มทีละคนแบบ jquery และยืนยันก่อนบันทึกจริง -->
            <a class="btn btn-default" href="{{ url('part_one/'.$activity_id) }}" role="button">รายคน</a>
        <!--    <input type="checkbox" value="<?=$activity_id ?>" name="activity_id[]"> -->
            <a class="btn btn-default" href="{{ url('admin/partexcel') }}" role="button">โหลดจากไฟล์เอ็กเซล</a>


        </td>

         <?php  /*var_dump($user->name_title);
           var_dump($user->firstname);
           var_dump($user->lastname);
           var_dump($user->year);
           var_dump($user->year_reg);
           var_dump($user->semester_ge);
           var_dump($user->p_status);
		*/
    
    /* $table -> integer('activity_id',2); 
        $table -> char('a_year', 4); 
        $table -> string('a_name' , 50); 
        $table -> string('a_place' , 40); 
        $table -> date('start_date'); 
        $table -> date('finish_date'); 
        $table -> char('dept_id' , 3); */
 	?>
	</tr>

<?php
}
?>
	</tr>
</table>
</div>
<script type="text/javascript">
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
});</script>

	



</body>
@stop