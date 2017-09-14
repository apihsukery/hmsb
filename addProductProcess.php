<?php

include('db.php');
session_start();

//$path_name = pathinfo("/tutorial");
//$this_script = $path_name["tutorial"];

$name = $_POST['name'];
$price = $_POST['price'];

// date_default_timezone_set("Asia/Kuala_Lumpur");
// $dateJoin=date("d/M/Y");

$add = mysql_query("INSERT INTO product(name,price) VALUES ('$name','$price')" );

if($add)
{
  // echo "<script language='JavaScript'>alert('Your post successful');</script>";
  echo "<script>window.location='product.php?name=Admin'</script>";
}
else{
  echo "<script language='JavaScript'>alert('Error occur. Please try again.');</script>";
  echo "<script>window.location='product.php?name=Admin'</script>";
} 
//Creating a file upload form with PHP is now complete.

 
?>