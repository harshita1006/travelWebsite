<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" , initial-scale="1.0">
        <title> TRAVEL PLANNER </title>
        <!--<meta name="google-signin-client_id" content="your-client-id-goes-here">-->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
    </head>
    <style>
        body 
        {
            background-image: url(images/loginbg.jpg);
            background-repeat: no-repeat;
            background-size: cover;
            text-align: center;    
        }
        
        h1 
        {
            font-family: cursive;
            /* background-color: rgb(67, 9, 226); */
            font-size: xxx-large;
            text-align: center;
        }
        
        h2
        {
            font-family: cursive;
        }
        p 
        {
            text-align: center;
        }
    </style>

    <body>
        <form action="loginhelp.php" method="post">
            <br><br>
            <h1>Aapka TRAVEL PLANNER </h1>
            <h2>Login, if you already have an account on ATP</h2>
            <br>
            <!--<div class="g-signin2" data-onsuccess="onSignIn" ></div>-->
            <container>
                <div style="border:2px solid rgb(5,4,4); margin-left: 500px; margin-right: 500px; background-color: cornsilk; border-radius: 20px;">
                    <h2>LOGIN DETAILS</h2>
                    <P>E-mail : <input type="email" class=form-control name="email" placeholder="Email" required="required"></P>
                    <p>PASSWORD : <input type="password" class=form-control name="password" placeholder="password" required="required"></p>
                    <p> <input type="submit" value="Log in"></p>
                    <a href="">Forgot your Password?</a>
                    <p>Don't have an account? <a href="signup.php">Sign Up</a> Now </p>
                </div>
            </container> 
        </form>
    </body>
</html>