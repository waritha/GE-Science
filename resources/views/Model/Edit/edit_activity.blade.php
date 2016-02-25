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
		$activity_id   	 = $act_data['activity_id'];
		$a_name   		 = $act_data['a_name'];
		$a_year    		 = $act_data['a_year'];
		$a_place    	 = $act_data['a_place'];
		$start_date      = $act_data['start_date'];
		$finish_date     = $act_data['finish_date'];
		$dept_id         = $act_data['dept_id'];

/* $table -> integer('activity_id',2); 
        $table -> char('a_year', 4); 
        $table -> string('a_name' , 50); 
        $table -> string('a_place' , 40); 
        $table -> date('start_date'); 
        $table -> date('finish_date'); 
        $table -> char('dept_id' , 3); 

 value="<?php echo"$activity_id"; ?>" readonly  
        */

?>

	<form action="{{ url('/editact')}}" method="post">
	<fieldset>
    <legend>เพิ่มข้อมูลกิจกรรม</legend>
	 <input type="hidden" name="_token" value="{{ csrf_token() }}"> 
	 <div class="row">
		<div class="large-3 columns">
			<label>รหัสกิจกรรม</label>
			<input type="text" name="activity_id" value="<?php echo"$activity_id"; ?>" readonly  >
		</div>
	</div>

	<div class="row">
	    <div class="large-2 columns">
			<label>ปีการศึกษา</label>
			<input type="text" name="a_year" pattern="[0-9]*" maxlenght="4" title="กรุณากรอกปี พ.ศ." value="<?php echo"$a_year"; ?>" />
		</div>
	
		<div class="large-3 columns">
			<label>ชื่อกิจกรรม</label>
			<input type="text" name="a_name" value="<?php echo"$a_name"; ?>" >
		</div>
	
		<div class="large-3 columns">
			<label>สถานที่จัด</label>
			<input type="text" name="a_place" value="<?php echo"$a_place"; ?>" >
		</div>

		<div class="large-4 columns">
			<label>ภาควิชาที่จัดกิจกรรม</label>
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
		<label>วันที่จัด (ปี-เดือน-วัน)</label>	
		<input type="date" name="start_date" value="<?php echo"$start_date"; ?>" >
			
		</div>
	</div>

	<div class="row">
		<div class="large-3 columns">
		<label>สิ้นสุดวันที่จัด  (ปี-เดือน-วัน)</label>	
		<input type="date" name="finish_date" value="<?php echo"$finish_date"; ?>" >
			
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
						if(db::select("SELECT * FROM mapping_ge_activity where ge_id='$ge_id' and activity_id='$activity_id'"))
						{
							$cc=1;
						}else{
							$cc=0;
						}
					?>
					<input type="checkbox" value=<?php echo "$ge_id" ?> name="ge[]" <?php if($cc==1) echo "checked"; ?>> <?php echo $ge_id; ?>
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