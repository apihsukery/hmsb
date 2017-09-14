<?php

include('db.php');
session_start();

//$path_name = pathinfo("/tutorial");
//$this_script = $path_name["tutorial"];

$id = $_POST['id'];
$name = $_POST['name'];
$pass = $_POST['pass'];
$gender = $_POST['gender'];

$edit = mysql_query("UPDATE user SET name='$name',pass='$pass',gender='$gender' WHERE id='$id'");       

if($edit)
{
	// echo "<script language='JavaScript'>alert('Edit Successful');</script>";
	echo "<script>window.location='user.php?name=Admin'</script>";//It an  unexpected error occurred show this message

}


?>

