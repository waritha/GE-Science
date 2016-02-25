<?php

$allowed =  array('xlsx','xls');
$filename = $_FILES['filUpload']['name'];
$ext = pathinfo($filename, PATHINFO_EXTENSION);
if(!in_array($ext,$allowed) ) {
    echo 'error , should be .xlsx only.';

}else{

if(move_uploaded_file($_FILES["filUpload"]["tmp_name"],"file/".$_FILES["filUpload"]["name"]))
{
echo "Copy/Upload Complete";

}
}



?>

<meta http-equiv="refresh" content="0; url=testexcel.php?filename=<?php echo"$filename";?>" />