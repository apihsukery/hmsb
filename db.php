<?php
//connection to mySQL
$host="localhost";
$username="root";
$password="";

// /asdasdasdsaasasdsad
$link = mysql_connect($host,$username,$password)or die("Could not connect");
//connection to database
$db = mysql_select_db("u338913621_db", $link)or die("Could not select database");
?>