
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
  document.getElementById("name").value="";
  document.getElementById("pass").value="";
  document.getElementById("email").value="";
  document.getElementById("number").value="";
  }
  		</script>
  </head>
  	
  	<body onLoad="clearform()" background="gray.png">
<a href="login.php" id="login"> Login</a>
<a href='home.php' id='home'>Home</a>
<center>

<ul><li>
            <a href="#">Users &#9662;</a>
            <ul class="dropdown">
                <li><a href="student_registration_view.php">Student</a></li>
                <li><a href="employee_registration_view.php">Employer</a></li>
            </ul>
</li></ul>
</center>

      <center>  <form id="f1" action="register_emp.php" method="post">
              <input type="text" name="type" id="type" value="student" style="visibility:hidden;" />

         <p> Name: </p><p>
          
            <input type="text" name="name" id="name" required="true" style="margin-bottom: 10px;"/>
          </p>
           <p>Email: </p><p>
          
            <input type="text" name="email" id="email" required="true" style="margin-bottom: 10px;"/></p>
          <p> Password:</p><p>
          
            <input type="password" name="pass" id="pass" required="true" style="margin-bottom: 10px;" />
          </p>
          <p> Mobile no:</p><p>
            <input type="number" name="number" id="number" required="true" style="margin-bottom: 10px;" />
          </p>
          
          <p>
          </input>
          <p>
            <input type="submit" value="Register" name="Register" style="margin-bottom: 10px;">
          </p>	
  		
        </form></center>
  	
  	  
      
         
      
          <p>&nbsp;</p>
    
  	</body>
  </html>