@extends('admin.layouts.template')
@section('content')
<html>
<head>
	<link rel="stylesheet" href="foundation/css/foundation.css" />
    <script                 src="foundation/js/vendor/modernizr.js"></script>
</head>
<body>


<p>
<div class="row">
<a href="{{url('geform')}}">เพิ่มข้อมูลกิจกรรม</a>
</div>
<div class="row">
<input id="filter" type="text" class="form-control" placeholder="ป้อนคำค้นที่ต้องการ">
</div>
<div class="row">
<table border=0 role="grid" class="searchable" >
	<thead>
		<th>หมายเหตุ</th>
		<th>ปีการศึกษา</th>
		<th>ชื่อกิจกรรม</th>
		<th>ชั่วโมงกิจกรรม</th>
		<th>ประเภทกิจกรรม</th>


	</thead>

<?php

$users = DB::table('ge_activity')->get();
foreach($users as $user){
	?>
	<tr>
		<td> 
			<?php
				$ge_id = $user->ge_id;
			?>
			<a href="{{ url('editge/'.$ge_id) }}">แก้ไข </a> |
			<a href="{{ url('deletege/'.$ge_id) }}" onclick="return confirm('คุณแน่ใจนะว่าต้องการที่จะลบ?')">ลบ</a>  
		</td>
		<td><?php echo $user->ge_year; ?></td>
        <td><?php echo $user->ge_name;?></td>
        <td><?php   echo $user->ge_hour;?></td>
        <td><?php   echo $user->ge_category;?></td>
        

         <?php  /*var_dump($user->name_title);
           var_dump($user->firstname);
           var_dump($user->lastname);
           var_dump($user->year);
           var_dump($user->year_reg);
           var_dump($user->semester_ge);
           var_dump($user->p_status);
		*/
           /*$table -> integer('ge_id',2); 
        $table -> string('ge_name' , 30); 
        $table -> char('ge_category', 1); 
        $table -> integer('ge_hour' , 2); 
        $table -> char('ge_year' , 4); */
    
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