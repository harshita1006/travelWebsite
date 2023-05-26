<?php
    require('config.php');
    if(!isset($_POST['name'],$_POST['email'],$_POST['password']))
    {
        exit('Empty Field(s)');
    }

    if(empty($_POST['name']) || empty($_POST['email']) || empty($_POST['password']))
    {
        exit('Values Empty');
    }
     
    if($stmt = $conn -> prepare('SELECT * FROM credentials WHERE email = ?'))
    {
        $stmt -> bind_param('s',$_POST['email']);
        $stmt -> execute();
        $stmt -> store_result();

        if($stmt -> num_rows>0)
        {
            //echo 'User Already Registered. Try again';
            header('location:useralreadyregistered.php');
        }
        else
        {
            if($stmt = $conn->prepare('INSERT INTO credentials (name,email,passwd) VALUES (?,?,?)')) {
                $passwd =password_hash($_POST['password'],PASSWORD_DEFAULT);
                $stmt -> bind_param('sss',$_POST['name'],$_POST['email'],$_POST['password']);
                $stmt -> execute();
                //echo 'Successfully Registered';
                header('location:signupsuccessful.php');
            }
            else
            {
                echo 'Error Occurred';
            }
        }
        $stmt->close();
    }
    else
    {
        echo 'Error Occurred';
    }
    $connection->close();
?>