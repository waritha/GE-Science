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
		$act_id  			= $act_data['activity_id'];
		$act_name 			= $act_data['a_name'];

?>

	<!-- <form action="{{ url('/edit')}}" method="post"> -->
	<fieldset>
    <legend><?php echo "กิจกรรม $act_name"; ?></legend>

    	<!-- เพิ่มจากรหัสทีละคน -->
    	<?php
    	$activity_id=$act_id;
    	?>
    	<!-- <form action="{{ url('/addpart') }}" method="post"> -->

    	<form action="{{ url('/addpart/ '.$activity_id) }}" method="post">

	    <fieldset>
	    <legend><h5><strong>เพิ่มรายคน</strong></h5></legend>
	    <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	    <div class="row">
		    <div class="large-3 columns">
				<label><strong>รหัสนักศึกษา </strong></br>(ตัวอย่าง 550510555)</label>
				<input type="text" name="student_id" pattern="[0-9]*" minlength="9" maxlenght="10" title="กรุณากรอกตัวเลข 10 หลัก"  />
			</div>
		</div>
		


		<div class="large-4 columns">
				<label><strong>สถานะของผู้เข้าร่วม</strong></label>
				<select name="a_status" >
		          <option value="ผู้เข้าร่วมกิจกรรม" >ผู้เข้าร่วมกิจกรรม</option>
		          <option value="ประธาน" >ประธาน</option>
		          <option value="ผู้เข้าร่วมกิจกรรม(staff)" >ผู้เข้าร่วมกิจกรรม(staff)</option>
		      
		        </select>
		</div>


		
	
		<div class="row">
		<input type="submit" class="button" value="ตกลง" > <input type="reset"  class="button" value="รีเซ็ต">
		</div>


		</fieldset>

		</form>

		

	
	</fieldset>
<!-- 	</form>
 -->





</body>


</html>
@stop
