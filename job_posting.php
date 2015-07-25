<html>
	<head>

		<title>Internshala</title>
<link rel="stylesheet" type="text/css" href="grab.css">
<style type="text/css">
input[type=number]::-webkit-inner-spin-button, 
input[type=number]::-webkit-outer-spin-button { 
  -webkit-appearance: none; 
  margin: 0; 
}

</style>
		<script type="text/javascript">
function clearform()
{
document.getElementById("o_name").value="";
document.getElementById("name").value="";
document.getElementById("pass").value="";
document.getElementById("email").value="";
document.getElementById("number").value="";
document.getElementById("link").value="";
}
		</script>
</head>
	
	<body onLoad="clearform()" background="gray.png">
<?php 
session_start();
if(empty($_SESSION['email']))
    { ?>
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
}?>
    <center>  <form id="f1" action="post_job.php" method="post">
      <input type="text" name="type" id="type" value="employee" style="visibility:hidden;" />
    
        
        <p>Location: </p>
        <p>
          <input type="text" name="location" id="location" style="margin-bottom: 10px;" required/>
        </p>
        <p>Salary: </p>
        <p>
          <input type="number" name="salary" id="salary" style="margin-bottom: 10px;" required/>
        </p>
        </input>
        <p>
        </input>
        <p>
          <input type="submit" value="Post" name="job_post" style="margin-bottom: 10px;">
        </p>
        <p>&nbsp; </p>
        <p>&nbsp;</p>
      </form></center>
        <p>&nbsp;</p>
        <p id="ar"> Job Description:</p>
        <p id="area">
         <textarea rows="4" cols="50" name="description" form="f1" /></textarea>
        </p>
	</body>
</html>