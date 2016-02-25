@extends('admin.layouts.template')
@section('content')

<html>
<head>

	<title>Add Student</title>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>
	<?php
		if(!isset($msg)){
			$msg="";
		}
	?>

	<form action="{{ url('/add')}}" method="post">
	<fieldset>
    <legend><strong>เพิ่มข้อมูลนักศึกษา</strong></legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 

	<div class="row">
	    <div class="large-3 columns">
			<label><strong>รหัสนักศึกษา </br>(ตัวอย่าง 550510555)</strong></label>
			<input type="text" name="student_id" pattern="[0-9]*" minlength="9" maxlenght="10" title="กรุณากรอกตัวเลข 10 หลัก"  />
		</div>
	</div>
	
	
	<div class="row">
		<div class="large-3 columns">
			<label><strong>ชื่อ</strong></label>
			<input type="text" name="first_name" >
		</div>
	

	
		<div class="large-3 columns">
		<label><strong>นามสกุล	</strong></label>
		<input type="text" name="last_name" >
		</div>
	
<?php
	$mysqli = new mysqli("localhost", "root", "", "project-2-2015");
	$mysqli->set_charset("utf8");
?>

<?php
    $result_dept = $mysqli->query("SELECT * FROM department");
?>

    <div class="large-4 columns">
      <label><strong>ภาควิชา/สังกัด</strong></label>
        <select name="student_dept" >
           <?php while ($row = $result_dept->fetch_assoc()) {
              echo"<option value='".$row["dept_id"]."' >".$row["dept_name"]."</option>";
            }
          ?>
        </select>
    </div>
  	</div>


  	<div class="row">
  		<div class="large-4 columns">
		<label><strong>ปีที่ลงทะเบียน</strong></label>
		<input type="text" name="year_reg" value="ยังไม่ได้ลงทะเบียนเรียน" >
		</div>

		<div class="large-4 columns">
		<label><strong>ภาคการศึกษาที่ลงทะเบียนเรียน(1,2,3)</strong></label>
		<select name="semester_ge" >
          <option value="ยังไม่ได้ลงทะเบียนเรียน" >ยังไม่ได้ลงทะเบียนเรียน</option>
          <option value="1" >1</option>
          <option value="2" >2</option>
          <option value="3" >3</option>
        </select>
		</div>

<?php
    $result_status = $mysqli->query("SELECT * FROM p_status");
?>
		<div class="large-4 columns">
		<label><strong>สถานะ(ผ่าน/ไม่ผ่าน)</strong></label>
		<select name="p_status" >
            <?php while ($row = $result_status->fetch_assoc()) {
              echo"<option value='".$row["p_status_id"]."' >".$row["p_status_name"]."</option>";
            }
          ?>
        </select>
		</div>

  	</div>	
	
	<div class="row">
	<input type="submit" class="button" value="ตกลง" > <input type="reset"  class="button" value="รีเซ็ต">
	</div>
	</fieldset>
	</form>


<div id="myModal" class="reveal-modal" data-reveal aria-labelledby="modalTitle" aria-hidden="true" role="dialog">
  <h2 id="modalTitle">Awesome. I have it.</h2>
  <p class="lead">Your couch.  It is mine.</p>
  <p>I'm a cool paragraph that lives inside of an even cooler modal. Wins!</p>
  <a class="close-reveal-modal" aria-label="Close">&#215;</a>
</div>

<script type="text/javascript">
	// $(document).ready(function(){
	//   $('#myModal').foundation('reveal', 'open');
	// });

	$(document).ready(function(){
	  <?php if($msg=="error"){?>
	  alert("รหัสนักศึกษา นี้มีอยู่แล้ว");
	  <?php } ?>

	});

</script>




</body>


</html>
@stop