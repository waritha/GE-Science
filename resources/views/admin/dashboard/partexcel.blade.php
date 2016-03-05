@extends('admin.layouts.template')
@section('content')
<html>
<body>

<?php
		/*$act_id  			= $act_data['activity_id'];
		$act_name 			= $act_data['a_name'];

		$a = $act_id;*/

?>

	<!-- <form action="{{ url('/edit')}}" method="post"> -->
	
    <!-- <legend><?php /*echo "กิจกรรม $act_name"; */?></legend> -->
<iframe src="{{asset('../resources/views/partexcel.php')}}" width="800px" height="500px" frameBorder="0"></iframe>



</body>
</html>
@stop
