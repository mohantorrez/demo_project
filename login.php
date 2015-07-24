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
<ul><li>
            <a href="#">Register &#9662;</a>
            <ul class="dropdown">
            	<li><a href="login.php">Existing user - Login</a></li>
                <li><a href="student_registration_view.php">New Student - Student</a></li>
                <li><a href="employee_registration_view.php">New Company - Employer</a></li>
            </ul>
</li></ul>