<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<?php

$mysqli = new mysqli("localhost", "root", "", "project-2-2015");
$mysqli->set_charset("utf8");

/* check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

	$data_part = $_POST['participation'];

	/*$student_id = $_POST['student_id'];

	$a_status = $_POST['a_status'];*/
	$activity_id = $_POST['activity_id'];
	/*$data_student = $_POST['student'];

	$year_reg = $_POST['year_reg'];
	$semester_ge = $_POST['semester_ge'];
	$student_dept = $_POST['student_dept'];*/

	foreach($data_part as $row_part){
		$participation = split(",",$row_part);
		/*echo "<br>".$participation[0]." ".$activity_id[0];*/
		$student_id = $participation[0];
		$activity_id = $activity_id[0];
		/*$activity_id =$participation[1];
		$a_status = $participation[2];*/

		/*$result = $mysqli->query("SELECT * FROM participation_1 WHERE student_id LIKE '".$student_id."'");*/
		$result = $mysqli->query("SELECT * FROM participation_1 WHERE student_id = '$student_id' and activity_id = '$activity_id'");
		if($result->num_rows <= 0){
			$mysqli->query ("INSERT INTO participation_1 VALUES ('$student_id','$activity_id','ผู้เข้าร่วมกิจกรรม')");
		}else{
		/*$mysqli->query ("INSERT INTO participation_1 VALUES ('$student_id','$activity_id','ผู้เข้าร่วมกิจกรรม')");*/
		$mysqli->query ("UPDATE participation_1 SET a_status = 'ผู้เข้าร่วมกิจกรรม' WHERE student_id = '$student_id' and activity_id ='$activity_id'");
			//echo"updated.<br>";
			/*$mysqli->query("UPDATE participation_1 SET 
												a_status = '$a_status' WHERE student_id = '$student_id' and activity_id ='$activity_id'");
		*/
			}
	 }


	// $i=0;
	// foreach($data_student as $row_student){


	// }

$mysqli->close();

?>

<a href="http://localhost/laravel_project/public/data_participation" target="_parent">ต่อไป</a>