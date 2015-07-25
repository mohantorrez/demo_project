<html>
<head><h1>Internshala Home</h1></head>
<link rel="stylesheet" type="text/css" href="grab.css">

        <body background="gray.png">
<?php
$connect = mysql_connect("localhost","root","") or die("Server unavailable now!");
mysql_select_db("internshala");

error_reporting(1);
session_start();
 if(empty($_SESSION['email']))
		{	?>
	<a href="login.php" id="login"> Login</a>
<ul><li>
            <a href="#">Register &#9662;</a>
            <ul class="dropdown">
                <li><a href="student_registration_view.php"> Student</a></li>
                <li><a href="employee_registration_view.php"> Employer</a></li>
            </ul>
</li></ul>
<?php 
} 
else
{
	echo "<a href='home.php' id='home'>Home</a>";
	echo "<a href='dashboard.php' id='dashboard'>Dashboard</a>";
	echo "<p id='session'>".$_SESSION['email']."</p>";
	?>
	<form id ="f3" action="signout.php" method="post">
<input type="submit" value="Sign Out" />
</form>
<?php 
} 
	$emp = $_SESSION['emp'];
	$user_id = $_SESSION['user_id'];
	if($emp ==0 )
	{
		$query = "select a.company_name,a.email,a.job_id,a.application_no,a.status,j.location,j.salary from application a 
					inner join jobs j on j.job_id = a.job_id
					where a.user_id = $user_id";
	}
	else
	{
		$query = "select a.company_name,a.email,a.job_id,a.application_no,a.status,j.location,j.salary from application a 
					inner join jobs j on j.job_id = a.job_id
					inner join companies c on c.id=j.company_id
					where c.user_id=$user_id";
	}
	$result = mysql_query($query) or die(mysql_error());
	echo "<table border='1' id='t1'>";
	echo "<tr cellspacing='30'><td>Email</td><td>Company Name</td><td>Location</td><td>Salary</td><td>Status</td></tr>";
	echo "<tr><td></td></tr>";
	while($row = mysql_fetch_array($result))
	{

		echo "<tr cellspacing='20'>";
		echo "<td>" . $row['email'] . "</td>";
		echo "<td>" . $row['company_name'] . "</td>";
		echo "<td>" . $row['location'] . "</td>";
		echo "<td>" . $row['salary'] . "</td>";
		echo "<td>" . $row['status'] . "</td>";
		echo "</tr>";
	}

