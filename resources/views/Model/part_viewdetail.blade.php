@extends('admin.layouts.template')
@section('content')
<html>
<head>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
    <title>Participation</title>

</head>
<body>

    <?php
        $act_id             = $act_data['activity_id'];
        $act_name           = $act_data['a_name'];
        /*$act_stu            = $act_data['student_id'];*/

        // $data['a_status']   = $_POST['a_status'];

        $users = DB::table('participation')->get();

        $users = DB::select("SELECT * FROM participation_1 WHERE activity_id = $act_id");
?>



<fieldset>
    <legend><?php echo "กิจกรรม $act_name"; ?></legend>


    <!-- กลับไปเพิ่มทีละคนแบบ ธรรมดา
    <a class="btn btn-default" href="{{ url('partselect/'.$act_id) }}" role="button">ลงชื่อเข้าร่วม</a> -->

   <!--  <a class="btn btn-default" href="{{ url('part_one/'.$act_id) }}" role="button">เพิ่มรายคน</a>
    
<a href="{{ url('admin/partexcel') }}" class="btn btn-default"  role="button">โหลดรายชื่อผู้เข้าร่วมจากไฟล์เอ็กเซล</a> -->

    <p>
    <div class="row">
<table border=0 role="grid" id="table" >
<b>ตารางแสดงรายละเอียดผู้เข้าร่วมกิจกรรม</b>
    <thead>
        
        <th>รหัสนักศึกษาที่เข้าร่วม</th>
        <th>สถานะผู้เข้าร่วมกิจกรรม</th>
        <th>หมายเหตุ</th>
        
    </thead>

<?php

foreach($users as $user){
    ?>
    <tr>
        <td> 
            <?php
                $student_id = $user->student_id;

            ?>
            <?php echo $user->student_id; ?>
        </td>
        <td><?php echo $user->a_status; ?></td>
        <td>

             <a class="btn btn-default" href="{{ url('delpart/'.$student_id. '/' .$act_id) }}" role="button" onclick="return confirm('คุณแน่ใจนะว่าต้องการที่จะลบ?')">ลบ</a>

        </td>

    </tr>

<?php
}
?>
 
</table>
</div>

</fieldset>

</body>
@stop