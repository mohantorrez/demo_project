<script type="text/javascript">
		function view()
{
    window.location.href="main.php";
}
</script>


<?php
$connect = mysql_connect("localhost","root","") or die("Server unavailable now!");
mysql_select_db("internshala");
$email=$_POST['email'];
$pass=$_POST['pass'];
$name = $_POST['name'];
$number = $_POST['number'];


if(!empty($_POST['email']))   
{

    $query = mysql_query("SELECT * FROM users WHERE email='$email';") or die(mysql_error());
    
    if(!$row = mysql_fetch_array($query) or die(mysql_error()))
    {
       
     
      $insert_query="INSERT INTO users(name,email,mobile_no) VALUES('$name','$email','$number')";
      $res = mysql_query($insert_query) or die(mysql_error());

      if($_POST['type'] == "employee"){
       
    $link = $_POST['link'];
     $insert_query="INSERT INTO login(is_active,email,password,is_emp) VALUES(1,'$email','$pass',1)";
      $res = mysql_query($insert_query) or die(mysql_error());
      $insert_query="INSERT INTO companies(company_name,company_email,mobile_no,company_link) VALUES('$name','$email','$number','$link')";
      $res = mysql_query($insert_query) or die(mysql_error());

}else{
  $insert_query="INSERT INTO login(is_active,email,password,is_std) VALUES(1,'$email','$pass',1)";
      $res = mysql_query($insert_query) or die(mysql_error());
}
}


    //Start session
    session_start();
	
    $_SESSION['SESS_FIRST_NAME']=$email;
header("Location: home.php");
exit();
} else
{
echo '<script type="text/javascript">'
   , 'view();'
   , '</script>';
} 



?>