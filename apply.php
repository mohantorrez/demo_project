<html><body>
<?php

session_start();
$connect = mysql_connect("localhost","root","") or die("Server unavailable now!");
mysql_select_db("internshala");
if(empty($_SESSION['email']))
{
	header("location: login.php");
}
else
{
	if($_SESSION['emp']!=1){

		$job_id = $_GET['id'];
		$user_id = $_SESSION['user_id'];
		$query = "select job_id from application where job_id = $job_id and user_id=$user_id";
		$result = mysql_query($query) or die(mysql_error());
		$row[] = mysql_fetch_array($result);
		if(!$row[0]){
				$query = "select c.company_name from jobs j
							inner join companies c on c.id = j.company_id
							 where j.job_id=$job_id";
				$result = mysql_query($query) or die(mysql_error());
				while($row = mysql_fetch_array($result))
				{
					$company_name = $row['company_name'];
				}
				
				$email = $_SESSION['email'];
				$query = "insert into application(user_id,job_id,company_name,email,status) values ('$user_id','$job_id','$company_name','$email','Applied') ";
				$result = mysql_query($query) or die(mysql_error());
				if($result)
					header("location:home.php");
				else
					die('Query failed');
			}
			else{
				echo "<script> alert('Already Applied');
				window.location.href='home.php'; </script> ";
				
			}
			}
		else{
			echo "<script> alert('Employee cannot apply');
			window.location.href='home.php';
			 </script> ";
			
		}
}


?>
</body></html>