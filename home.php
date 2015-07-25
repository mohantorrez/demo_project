<html>
<head><h1>Internshala Home</h1></head>
<link rel="stylesheet" type="text/css" href="grab.css">
 <script src="jquery.js"
        type="text/javascript"></script>
        <body background="gray.png">
<?php
error_reporting(1);
session_start();
 if(empty($_SESSION['email']))
		{	?>
	<a href="login.php" id="login"> Login</a>
<ul><li>
            <a href="#">Register &#9662;</a>
            <ul class="dropdown">
            	<li></li>
                <li><a href="student_registration_view.php"> Student</a></li>
                <li><a href="employee_registration_view.php"> Employer</a></li>
            </ul>
</li></ul>
<?php 
} 
else
{
	if($_SESSION['emp']==1)
	{
		echo "<a href='job_posting.php' id='jobs'>Post Jobs</a>";
	}
	echo "<a href='dashboard.php' id='dashboard'>Dashboard</a>";
	echo "<p id='session'>".$_SESSION['email']."</p>";
	?>
	<form id ="f3" action="signout.php" method="post">
<input type="submit" value="Sign Out" />
</form>
	<?php
}
$connect = mysql_connect("localhost","root","") or die("Server unavailable now!");
mysql_select_db("internshala");
$query = "select c.company_name,c.company_link,j.job_id,j.job_description,j.salary,j.location from jobs j
			inner join companies c on c.id = j.company_id";
			 $result = mysql_query($query) or die(mysql_error());
echo '<form id="f2" action="" method="post" id="frm">';
echo "<table border='1' id='t1' cellpadding='0'>";
while($row = mysql_fetch_array($result))
{
	echo "<tr>";
	echo "<td>" . $row['company_name'] . "</td><td>Salary:".$row['salary']."</td><tr>";
	echo "</tr><td>Location:".$row['location']."</td>";
	
		echo '<td>
		<input type="button" id='.$row['job_id'].' name="button" value="Apply"  />
		</td>';	
echo "</tr>";

}
echo "</form>"
?>
<div></div>
<script type="text/javascript">
$(function(){
    $('input[name=button]').click(function(){
       
        var id= $(this).attr("id");
        window.location.href="apply.php?id="+id;
    });
});

</script>
</body>
