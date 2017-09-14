<?php

include('db.php');
session_start();

//$path_name = pathinfo("/tutorial");
//$this_script = $path_name["tutorial"];

$name = $_POST['name'];
$pass = $_POST['pass'];
$gender = $_POST['gender'];

date_default_timezone_set("Asia/Kuala_Lumpur");
$dateJoin=date("j/M/Y");

$add = mysql_query("INSERT INTO user(name,pass,gender,dateJoin) VALUES ('$name','$pass','$gender','$dateJoin')" );

if($add)
{
  // echo "<script language='JavaScript'>alert('Your post successful');</script>";
  echo "<script>window.location='user.php?name=Admin'</script>";
}
else{
  echo "<script language='JavaScript'>alert('Error occur. Please try again.');</script>";
  echo "<script>window.location='user.php?name=Admin'</script>";
} 
//Creating a file upload form with PHP is now complete.

 
?>