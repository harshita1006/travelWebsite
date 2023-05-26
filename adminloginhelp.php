<?php
    session_start();
     
    if(isset($_POST['name']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $name =validate($_POST['name']);
    $passwd =validate($_POST['password']);

    if(empty($name)) {
        header ("Location: adminlogin.php?error=Email is Required");
        exit();
    }
    else if(empty($passwd)) {
        header ("Location: adminlogin.php?error=Password is Required");
        exit();
    }
    if($name === 'AapkaTravelPlanner' AND $passwd === 'admin')
    {
        {
            echo "Logged In";
            $_SESSION['admin'] = '1';
            header('location: add.php');
            exit();
        } 
    }
    else{
        header('location:tryagain.php');
        exit();
    }
?>