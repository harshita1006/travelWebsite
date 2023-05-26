<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width" , initial-scale="1.0">
        <title> TRAVEL PLANNER </title>
        <!--<meta name="google-signin-client_id" content="your-client-id-goes-here">-->
        <script src="https://apis.google.com/js/platform.js" async defer></script>
        
        <title> SIGN UP </title>
    </head>
    <style>
        h1
        {
            font-family: 'Franklin Gothic Medium', 'Arial Narrow', Arial, sans-serif;
        }
        h2
        {
            font-family: cursive;
        }
        body
        {
            background-image: url(images/signup.jpg);
            background-repeat:no-repeat;
            background-size: cover;
            text-align: center;
        }
    
    </style>
    <body>
        <br><br><br><br><br><br><br><br>
        <div style="border:2px solid rgb(5,4,4); margin-left: 500px; margin-right: 500px; background-color: cornsilk; border-radius: 20px;">
            <h1>Sign Up</h1>
            <h2>Make your account on ATP</h2>
            <form action ="signuphelp.php" method="POST">
                <label for="name"></label>
                <p>Name: <input type="text" name="name" placeholder="name" id="name" required></p>
                <label for="email"></label>
                <p>E-mail: <input type="email" name="email" placeholder="email" id="email" required></p>
                <label for="password"></label>
                <p>Password: <input type="password" name="password" placeholder="password" id="password" required></p>
                <input type="submit" value="Sign Up">       
                <h3>Already have an account? <a href="login.php">Login</a> Here</h3>
            </form>
        </div>
    </body>
</html>