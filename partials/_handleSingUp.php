<?php


    $showErr = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include '_dbconnect.php';
        $usremail = $_POST['signUpEmail'];
        $usrpwd   = $_POST['signUpPassword'];
        $usrcpwd  = $_POST['signUpCpassword'];


        //Check for email exists

        $existSql = "select * from `usrs` where usr_email='$usremail'";
        $res = mysqli_query($con,$existSql);
        $numRows = mysqli_num_rows($res);

        if($numRows>0)
        {
            $showErr = "Email Exists!! Please Sign In";
        }

        else
        {
            if($usrpwd == $usrcpwd)
            {
                $phash = password_hash($usrpwd, PASSWORD_DEFAULT); // Keeping the pwd safe by using hashing function cyrptography

                $sql_usr = "INSERT INTO `usrs` (`usr_email`, `usr_pwd`, `usr_stamp`) VALUES ('$usremail', '$phash', current_timestamp())";

                $res_usr = mysqli_query($con,$sql_usr);

                if($res_usr)
                {
                    $showAlert = true;
                    header("Location: /Forum-Web/index.php?signUpSuccess=true");
                    exit();
                }
            }
            else
            {
                $showErr = "Entered Passwords Donot Match!!!";
                
            }
        }
        header("Location: /Forum-Web/index.php?signUpSuccess=false&err=$showErr");
    }

?>