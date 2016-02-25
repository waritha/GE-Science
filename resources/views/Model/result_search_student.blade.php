@extends('admin.layouts.template')
@section('content')
<html>
<head>


	<title>Search Student</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>





<p>
<!-- <div class="row">
<a href="{{url('studentform')}}">เพิ่มข้อมูลนักศึกษา</a>
</div>
<div class="row">
<input id="filter" type="text" class="form-control " placeholder="ป้อนคำค้นที่ต้องการ">
</div> -->

<div class="row">
ค้นหา
</div>

<div class="row">
<form action="{{url('search/student')}}">
	<input type="text" class="form-control " name="keyword" placeholder="ป้อนคำค้นที่ต้องการ">
	<input type="submit" class="button" value="ค้นหา" >
</form>
</div>




<?php
$users = DB::select("SELECT S.*,D.*,P.*
	FROM student S,department D ,p_status P
	WHERE S.student_dept = D.dept_id and S.p_status = P.p_status_id and 
		(S.student_id LIKE '%".$keyword."%' or 
		S.first_name  LIKE '%".$keyword."%' or 
		S.last_name   LIKE '%".$keyword."%')");
?>


<div class="row">
	ผลการค้นหาคำว่า "<?=$keyword?>" 
<table width="1100" border=0 role="grid" class="searchable" >
	<thead>
		
		<th>หมายเหตุ</th>
		<th> รหัสนักศึกษา </th>
		<th> ชื่อ</th>
		<th>นามสกุล</th>
		<th>ปีที่ลงทะเบียน</th>
		<th>เทอมที่ลงทะเบียนเรียน(1,2,3)</th>
		<th>สถานะ(ผ่าน/ไม่ผ่าน)</th>
		<th>ภาควิชาที่สังกัด</th>
		

	</thead>

<?php

foreach($users as $user){
	?>
	<tr>
		<td> 
			<?php
				$student_id = $user->student_id;

			?>
			<a href="{{ url('edit/'.$student_id) }}">แก้ไข </a> |
			<a href="{{ url('delete/'.$student_id) }}" onclick="return confirm('คุณแน่ใจนะว่าต้องการที่จะลบ?')">ลบ</a>  
		</td>
		<td><?php echo $user->student_id; ?></td>
        <td><?php   echo $user->first_name;?></td>
        <td><?php   echo $user->last_name;?></td>
        <td><?php   echo $user->year_reg;?></td>
        <td><?php   echo $user->semester_ge;?></td>
        <td><?php   echo $user->p_status_name;?></td>
        <td><?php   echo $user->dept_name;?></td>
        

        

         <?php  /*var_dump($user->name_title);
           var_dump($user->firstname);
           var_dump($user->lastname);
           var_dump($user->year);
           var_dump($user->year_reg);
           var_dump($user->semester_ge);
           var_dump($user->p_status);
		*/
    
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