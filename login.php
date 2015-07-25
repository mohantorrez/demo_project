<html>
	<head>
	
		<title>Internshala</title>
		<link rel="stylesheet" type="text/css" href="grab.css">
		
		<script type="text/javascript">

function clearform()
{
document.getElementById("email").value="";
document.getElementById("pass").value="";
}
		</script>
</head>
	
<body background="gray.png">
<center>
<form id="f1" action="login_validation.php" method="post">
<label><p>Email :</p></label>
<input type="text" name="email" id="email" />
<p><label>Password :</label></p>
<input type="password" id="password" name="password"/>
<p>
<input type="submit" value=" Login "/>
</p>
</form></center>
<a href="login.php" id="login"> Login</a>
<a href='home.php' id='home'>Home</a>
<ul><li>
            <a href="#">Register &#9662;</a>
            <ul class="dropdown">
                <li><a href="student_registration_view.php">Student</a></li>
                <li><a href="employee_registration_view.php">Employer</a></li>
            </ul>
</li></ul>
</body>