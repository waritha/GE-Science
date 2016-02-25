
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ทดสอบ</title>
</head>

<body>

<table width="500" border="1">
  <tr>
    <td>ที่</td>
    <td>รหัส</td>
    <td>ชื่อ</td>
	<td>นามสกุล</td>
    <td>หมายเหตุ</td>
  </tr>

<?php
//print_r($namedDataArray);
foreach ($namedDataArray  as $result) {
?>
	  <tr valign="top" align="left">
		<td><?=$result["B"];?></td>
		<td><?=$result["C"];?></td>
		<td><?=$result["D"];?></td>
		<td><?=$result["E"];?></td>
		<td><?=$result["F"];?></td>
	  </tr>

<?php
}
//<?php echo $result['1'];
?>

</body>
</html>
