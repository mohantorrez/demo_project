    <?php
    //Start session
    session_start();

    $connect = mysql_connect("localhost","root","") or die("Server unavailable now!");
    mysql_select_db("internshala");


    //Array to store validation errors
    $errmsg_arr = array();

    //Validation error flag
    $errflag = false;

    //Function to sanitize values received from the form. Prevents SQL injection
    function clean($str) 
    {
        $str = @trim($str);
        if(get_magic_quotes_gpc()) 
        {
            $str = stripslashes($str);
        }
        return mysql_real_escape_string($str);
    }

    //Sanitize the POST values
    $email = clean($_POST['email']);
    $password = clean($_POST['password']);

    //Input Validations
    if($email == '')
    {
        $errmsg_arr[] = 'Username missing';
        $errflag = true;
    }
    if($password == '')
    {
        $errmsg_arr[] = 'Password missing';
        $errflag = true;
    }

    //If there are input validations, redirect back to the login form
    if($errflag) {
        $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
        session_write_close();
        header("location: login.php");
        exit();
    }

    //Create query
    $qry="SELECT l.email,l.is_emp,l.is_std,u.user_id FROM login l 
            inner join users u on u.email = l.email
            WHERE l.email='$email' AND l.password='$password'";
    $result=mysql_query($qry);

    //Check whether the query was successful or not
    if($result) 
    {
        if(mysql_num_rows($result) > 0) 
        {
    //Login Successful
            session_regenerate_id();
            $member = mysql_fetch_assoc($result);
            $_SESSION['emp'] = $member['is_emp'];
            $_SESSION['std'] = $member['is_std'];
            $_SESSION['email'] = $member['email'];
            $_SESSION['user_id'] = $member['user_id'];
         
            header("location: home.php");
            exit();
        }
        else 
        {
    //Login failed
            $errmsg_arr[] = 'user name and password not found';
            $errflag = true;
            if($errflag) 
            {
                $_SESSION['ERRMSG_ARR'] = $errmsg_arr;
                session_write_close();
                header("location: login.php");
                exit();
            }
        }
    }else 
    {
        die("Query failed");
    }
    ?>