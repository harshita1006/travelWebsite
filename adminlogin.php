<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" , initial-scale="1.0">
        <title>AAPKA TRAVEL PLANNER </title>
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
        <form action="adminloginhelp.php" method="post">
            <br><br>
            <h1>Aapka TRAVEL PLANNER </h1>
            <h2>Admin Login</h2>
            <br>
            <container>
                <div style="border:2px solid rgb(5,4,4); margin-left: 500px; margin-right: 500px; background-color: cornsilk; border-radius: 20px;">
                    <h2>LOGIN DETAILS</h2>
                    <P>Name : <input type="name" class=form-control name="name" placeholder="Name" required="required"></P>
                    <p>PASSWORD : <input type="password" class=form-control name="password" placeholder="password" required="required"></p>
                    <p> <input type="submit" value="Log in"></p>
                </div>
            </container> 
        </form>
    </body>
</html>