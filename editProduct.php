<?php

include('db.php');
session_start();

//$path_name = pathinfo("/tutorial");
//$this_script = $path_name["tutorial"];

$id = $_POST['id'];
$name = $_POST['name'];
$price = $_POST['price'];


$edit = mysql_query("UPDATE product SET name='$name',price='$price' WHERE id='$id'");       

if($edit)
{
	// echo "<script language='JavaScript'>alert('Edit Successful');</script>";
	echo "<script>window.location='product.php?name=Admin'</script>";//It an  unexpected error occurred show this message

}


?>

