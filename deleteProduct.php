<?php

include('db.php');
session_start();


$id = $_GET['id'];



$delete = mysql_query("DELETE FROM product WHERE id='$id'" );


// echo "<script language='JavaScript'>alert('Padam Berjaya');</script>";
echo "<script>window.location='product.php?name=Admin'</script>";
		
?>