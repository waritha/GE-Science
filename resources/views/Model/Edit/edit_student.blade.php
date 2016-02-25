@extends('admin.layouts.template')
@section('content')
<html>
<head>

	<title>Edit Student</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
	
</head>
<body>

<?php
		$std_id    			= $student_data['student_id'];
		$std_first 			= $student_data['first_name'];
		$std_last 			= $student_data['last_name'];
		$std_year_reg  		= $student_data['year_reg'];
		$std_semester_ge 	= $student_data['semester_ge'];
		$std_p_status 		= $student_data['p_status'];
		$std_dept  			= $student_data['student_dept'];
?>

	<form action="{{ url('/edit')}}" method="post">
	<fieldset>
    <legend>แก้ไขข้อมูลนักศึกษา</legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	<div class="row">
	    <div class="large-3 columns">
			<label>รหัสนักศึกษา </br>*ไม่สามารถแก้ไขได้</label>
			<input type="text" name="student_id" value="<?php echo"$std_id"; ?>" readonly >
		</div>
	</div>
	
	
	<div class="row">
		<div class="large-3 columns">
			<label>ชื่อ</label>
			<input type="text" name="first_name"  value="<?php echo"$std_first"; ?>" >
		</div>
	

	
		<div class="large-3 columns">
		<label>นามสกุล	</label>
		<input type="text" name="last_name" value="<?php echo"$std_last"; ?>"  >
		</div>
	
    <div class="large-4 columns">
      <label >ภาควิชา/สังกัด</label>
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
      
    </div>
  	</div>

  	<div class="row">
	  		<div class="large-4 columns">
			<label>ปีที่ลงทะเบียนเรียน</label>
			<input type="text" name="year_reg" value="<?php echo"$std_year_reg"; ?>">
		</div>

		<div class="large-4 columns">
			<label>ลงทะเบียนเทอม(1,2,3)</label>
			<select name="semester_ge" >
          	<option value="ยังไม่ได้ลงทะเบียนเรียน" >ยังไม่ได้ลงทะเบียนเรียน</option>
         	<option value="1" >1</option>
         	<option value="2" >2</option>
          	<option value="3" >3</option>
        	</select>
		</div>

		<div class="large-4 columns">
			<label>สถานะ(ผ่าน/ไม่ผ่าน)</label>
			<select name="p_status" >
          	<option value="ยังประมวลผลไม่ได้" >ยังประมวลผลไม่ได้</option>
          	<option value="1" >ผ่านกระบวนวิชา</option>
          	<option value="ไม่ผ่านกระบวนวิชา" >ไม่ผ่านกระบวนวิชา</option>
        	</select>
		</div>

	</div>
	
	<div class="row">
	<input type="submit" class="button" value="ตกลง" > <input type="reset"  class="button" value="รีเซ็ต">
	</div>
	</fieldset>
	</form>






</body>


</html>
@stop