@extends('admin.layouts.template')
@section('content')

<html>
<head>

	<title>Add Activity And Mapping GEActivity</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>

	<form action="{{ url('/addact')}}" method="post">
	<fieldset>
    <legend>เพิ่มข้อมูลกิจกรรม</legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	<div class="row">
	    <div class="large-2 columns">
			<label><strong>ปีการศึกษา</strong></label>
			<input type="text" name="a_year" pattern="[0-9]*" maxlenght="4" title="กรุณากรอกปี พ.ศ."  />
		</div>
	
		<div class="large-3 columns">
			<label><strong>ชื่อกิจกรรม</strong></label>
			<input type="text" name="a_name" >
		</div>
	
		<div class="large-3 columns">
			<label><strong>สถานที่จัด</strong></label>
			<input type="text" name="a_place" >
		</div>

		<div class="large-4 columns">
			<label><strong>ภาควิชาที่จัดกิจกรรม</strong></label>
			<select name="dept_id" >
          	<option value="001" >ภาควิชาชีวิวิทยา</option>
          	<option value="002" >ภาควิชาเคมี</option>
          	<option value="003" >ภาควิชาธรณีวิทยา</option>
          	<option value="004" >ภาควิชาฟิกสิกส์และวัสดุศาสตร์</option>
          	<option value="005" >ภาควิชาเคมีอุตสาหกรรม</option>
          	<option value="006" >ภาควิชาคณิตศาสตร์</option>
          	<option value="007" >ภาควิชาสถิติ</option>
          	<option value="008" >ภาควิชาวิทยาการคอมพิวเตอร์</option>
          	<option value="009" >สาขาวิชาวิทยาศาสตร์สิ่งแวดล้อม</option>
          	<option value="010" >คณะวิทยาศาสตร์</option>
        	</select>
		</div>
	</div>

	<div class="row">
		<div class="large-3 columns">
		<label><strong>วันที่จัด (ปี-เดือน-วัน)</strong></label>	
		<input type="date" name="start_date" >
			
		</div>
	</div>

	<div class="row">
		<div class="large-3 columns">
		<label><strong>สิ้นสุดวันที่จัด  (ปี-เดือน-วัน)</strong></label>	
		<input type="date" name="finish_date" >
			
		</div>
	</div>

	
	<div class="row">
	<input type="submit" class="button" value="ตกลง" > <input type="reset"  class="button" value="รีเซ็ต">
	</div>
	</fieldset>


	<fieldset>
    <legend>ตารางแสดงรายละเอียดข้อมูลกิจกรรม GE</legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	<div class="row">
	    <table border=0 role="grid" class="searchable" >
			<thead>
				<th>เลือก</th>
				<th>ปีการศึกษา</th>
				<th>ชื่อกิจกรรม</th>
				<th>ชั่วโมงกิจกรรม</th>
				<th>ประเภทกิจกรรม</th>


			</thead>

		<?php

		$users = DB::select("SELECT * FROM ge_activity");
		foreach($users as $user){
			?>
			<tr>
				<td> 
					<?php
						$ge_id = $user->ge_id;
					?>
					<input type="checkbox" value="<?=$ge_id ?>" name="ge[]">
				</td>
				<td><?php echo $user->ge_year; ?></td>
		        <td><?php echo $user->ge_name;?></td>
		        <td><?php   echo $user->ge_hour;?></td>
		        <td><?php   echo $user->ge_category;?></td>
		        

		         <?php 
		 	?>
			</tr>

		<?php
		}
		?>
			</tr>
		</table>
	</div>
	</fieldset>


	</form>









</body>


</html>
@stop