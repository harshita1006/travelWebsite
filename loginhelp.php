<?php
    session_start();
    require('config.php');
    
    if(isset($_POST['email']) && isset($_POST['password'])){
        function validate($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    }

    $email =validate($_POST['email']);
    $passwd =validate($_POST['password']);

    if(empty($email)) {
        header ("Location: login.php?error=Email is Required");
        exit();
    }
    else if(empty($passwd)) {
        header ("Location: login.php?error=Password is Required");
        exit();
    }

    $sql = "SELECT * FROM credentials WHERE email = '$email' AND passwd = '$passwd'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) === 1) {
        $row = mysqli_fetch_assoc($result);
        if($row['email']=== $email AND $row['passwd'] === $passwd)
        {
            echo "Logged In";
            $_SESSION['name'] = $row['name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['uid'] = $row['uid'];
            header('location: dashboard.php');
            exit();
        } 
    }
    else{
        //echo "Invalid username or password.";
        header('location:tryagain.php');
        //header('location:login.php?error=Invalid username or password');
        exit();
    }
?>