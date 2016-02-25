@extends('admin.layouts.template')
@section('content')

<html>
<head>

	<title>Add GE Activity</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>

	<form action="{{ url('/addge')}}" method="post">
	<fieldset>
    <legend><strong>เพิ่มข้อมูลกิจกรรม GE</strong></legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	<div class="row">
		<div class="large-3 columns">
			<label><strong>ชื่อกิจกรรม</strong></label>
			<input type="text" name="ge_name">
		</div>
	</div>

	<div class="row">
		<div class="large-1 columns">
		<label><strong>จำนวนชั่วโมง</strong></label>	
		<input type="text" name="ge_hour" pattern="[0-9]*" title="กรุณากรอกจำนวนชั่วโมง"  />
			
		</div>
	</div>

	<div class="row">
		<div class="large-3 columns">
		<label><strong>ปีการศึกษา</strong></label>	
		<input type="text" name="ge_year" pattern="[0-9]*" maxlenght="4" title="กรุณากรอกปี พ.ศ."  />
			
		</div>
	</div>
  	
	<div class="row">
		<div class="large-3 columns">
			<label><strong>ประเภทกิจกรรม</strong></label>
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