<?php


    $showErr = "false";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        include '_dbconnect.php';
        $uemail = $_POST['signInEmail'];
        $upwd   = $_POST['signInPassword'];

        $sql = "select * from `usrs` where usr_email='$uemail'";
        $res = mysqli_query($con,$sql);
        $numRows = mysqli_num_rows($res);

        if($numRows==1)
        {
            $row = mysqli_fetch_assoc($res);
            if(password_verify($upwd, $row['usr_pwd']))
                {
                        session_start();
                        $_SESSION['signedIn'] = true;
                        $_SESSION['useremail'] = $uemail;    
                }
                else{
                    echo "Unable to log in ";
                }
                header("Location: /Forum-Web/index.php");
        }
        header("Location: /Forum-Web/index.php");

    }
?>