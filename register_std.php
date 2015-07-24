<script type="text/javascript">
		function view()
{
    window.location.href="main.php";
}
</script>


<?php
$connect = mysql_connect("localhost","root","") or die("Server unavailable now!");
mysql_select_db("grabhalo");
$u_name=$_POST['name'];
$u_pass=$_POST['pass'];

if(!empty($_POST['name']))   //checking the 'user' name which is from Sign-Up.html, is it empty or have some text
{
    $query = mysql_query("SELECT * FROM register WHERE name='$u_name';") or die(mysql_error());
 
    if(!$row = mysql_fetch_array($query) or die(mysql_error()))
    {
       
$insert_query="INSERT INTO register(name,password) VALUES('$u_name','$u_pass')";
$res = mysql_query($insert_query) or die(mysql_error());
//echo 'Registered Successfully!';

    //Start session
    session_start();
	
    $_SESSION['SESS_FIRST_NAME']=$u_name;
header("Location: home.php");
exit();
} else
{
echo '<script type="text/javascript">'
   , 'view();'
   , '</script>';
} }


?>