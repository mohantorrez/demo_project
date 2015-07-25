<?php
session_start();
$connect = mysql_connect("localhost","root","") or die("Server unavailable now!");
mysql_select_db("internshala");
$user_id = $_SESSION['user_id'];
$query = "select id from companies where user_id=$user_id";
 $result = mysql_query($query) or die(mysql_error());
$row = mysql_fetch_assoc($result);
if($row['id'])
{
	$company_id = $row['id'];
	$description = $_POST['description'];
	$salary = $_POST['salary'];
	$location = $_POST['location'];
	$query = "insert into jobs(company_id,job_description,location,salary) values ('$company_id','$description','$location','$salary')";
	$result = mysql_query($query) or die(mysql_error());
	if($result)
	{
		header("location:home.php");
	}
}