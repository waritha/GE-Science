@extends('admin.layouts.template')
@section('content')
<html>
<head>

	<title>Edit GEActivity</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>

<?php
		$ge_id    = $activity_data['ge_id'];
		$ge_name    = $activity_data['ge_name'];
		$ge_category    = $activity_data['ge_category'];
		$ge_hour    = $activity_data['ge_hour'];
		$ge_year    = $activity_data['ge_year'];

?>

<form action="{{ url('/editge')}}" method="post">
	<fieldset>
    <legend>แก้ไขข้อมูลกิจกรรม GE</legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	 <div class="row">
		<div class="large-3 columns">
			<label >รหัสกิจกรรม</label>
			<input type="text" name="ge_id" value="<?php echo"$ge_id"; ?>" readonly  >
		</div>
	</div>

	<div class="row">
		<div class="large-3 columns">
			<label >ชื่อกิจกรรม</label>
			<input type="text" name="ge_name" value="<?php echo"$ge_name"; ?>">
		</div>
	</div>

	<div class="row">
		<div class="large-1 columns">
		<label>จำนวนชั่วโมง</label>	
		<input type="text" name="ge_hour" pattern="[0-9]*" title="กรุณากรอกจำนวนชั่วโมง" value="<?php echo"$ge_hour"; ?>" />
			
		</div>
	</div>

	<div class="row">
		<div class="large-3 columns">
		<label>ปีการศึกษา</label>	
		<input type="text" name="ge_year" pattern="[0-9]*" maxlenght="4" title="กรุณากรอกปี พ.ศ." value="<?php echo"$ge_year"; ?>"  />
			
		</div>
	</div>
  	
	<div class="row">
		<div class="large-3 columns">
			<label>ประเภทกิจกรรม</label>
			<select name="ge_category" >
				<option value="กิจกรรมที่เลือกเข้าร่วม" >กิจกรรมที่เลือกเข้าร่วม</option>
          		<option value="กิจกรรมบังคับเข้าร่วม" >กิจกรรมบังคับเข้าร่วม</option>
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