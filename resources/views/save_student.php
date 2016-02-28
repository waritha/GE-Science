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

	$data_student = $_POST['student'];

	/*$first_name = $_POST['first_name'];
	$last_name = $_POST['last_name'];*/
	$year_reg = $_POST['year_reg'];
	$semester_ge = $_POST['semester_ge'];
	$student_dept = $_POST['student_dept'];

	foreach($data_student as $row_student){
		$student = split(",",$row_student);
		//echo "<br>".$student[0]." ".$student[1]." ".$student[2];
		$student_id = $student[0];
		$student_name =$student[1];
		$student_lastname = $student[2];

		$result = $mysqli->query("SELECT * FROM student WHERE student_id LIKE '".$student_id."'");
		if($result->num_rows <= 0){
			$mysqli->query ("INSERT INTO student VALUES ('$student_id',
				'$student_name',
				'$student_lastname',
				'$year_reg',
				'$semester_ge',				
				'ยังประมวลผลไม่ได้',
				'$student_dept')");
		}
			//echo"updated.<br>";
			$mysqli->query("UPDATE student SET 
												first_name = '$student_name',
												last_name = '$student_lastname',
												year_reg = '$year_reg',
												semester_ge = '$semester_ge',
												p_status = 'ยังประมวลผลไม่ได้', 
												student_dept = '$student_dept' WHERE student_id = '$student_id'");
		



		
	}


	// $i=0;
	// foreach($data_student as $row_student){


	// }

$mysqli->close();

?>

<a href="http://localhost/laravel_project/public/datastudent" target="_parent">ต่อไป</a>