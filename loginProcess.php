<?php
include('db.php');
session_start();

$name = $_POST['name'];
$pass = $_POST['pass'];
$query = "SELECT * FROM user where name='$name' AND pass='$pass'";
$result = mysql_query($query) or die("Query failed");
$rec = mysql_fetch_array($result);



// else if($rec['jenis']=="staff")
// {
// 	$noIC = base64_encode($rec['noIC']);
// 	$_SESSION['noIC']=$rec['noIC'];
// 	header("location:main.php?Number=$noIC");
// }

if(mysql_num_rows($result) <= 0)
{
	// echo "<script language='JavaScript'>alert('Wrong Password!');</script>";
	echo "<script>window.location='login.php?Name=$name&error=true'</script>";
}
else{
	if($rec['name']=="Admin")
	{
		// $noIC = base64_encode($rec['noIC']);
		$_SESSION['name']=$rec['name'];
		header("location:mainAdmin.php?name=$rec[name]");
	}
	else if($rec['name']!="Admin")
	{
		// $noIC = base64_encode($rec['noIC']);
		$_SESSION['name']=$rec['name'];
		header("location:main.php?name=$rec[name]");
	}
}


?>