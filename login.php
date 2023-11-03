<?php  
//this is to know the method used, post or get. to post is to put in with button
if($_SERVER["REQUEST_METHOD"] === "POST"){
    //this is to locate the directory of the database
    $mysqli = require __DIR__ . "/database.php";

    //this help select info from the table you've created in the db
    $sql = sprintf("SELECT * FROM users
            WHERE email = '%s'",        /*this means empty email*/
            $mysqli->real_escape_string($_POST["email"])); /*this is the user typed in email*/

            $result = $mysqli->query($sql); /*the search has been done here using sql query*/
            $user = $result->fetch_assoc(); /*this gets the actual email for the login*/

            if($user){
                //this confirms the input password with the hash_password, if correct, then login
               if(password_verify($_POST["password"], $user["password_hash"])){
                die("Login Successful");
               }else{
                die("Incorrect Details.");
               }
            }
}



?>












<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
    <h2>Login Here</h2>
        <form class="form" method="post" >
            <input type="email" name="email" id="email" placeholder="Enter your email" > <br>
            <input type="password" name="password" id="password" placeholder="Enter your password" >
            

            <button class="login-btn"> 
                Login
            </button>


            
            <p class="login"> Don't have an account? <br>
                <a href="signup.html"> Register </a>here</a>
            </p>

            <p class="socials"> Login with:</p>

            <div class="icons">
                <a href="https://facebook.com"><ion-icon name="logo-facebook"></ion-icon>  </a>
                <a href="https://instagram.com"> <ion-icon name="logo-instagram"> </ion-icon>  </a>
                <a href="https://twitter.com"> <ion-icon name="logo-twitter"> </ion-icon>  </a>
                <a href="https://tiktok.com"> <ion-icon name="logo-tiktok"> </ion-icon>  </a>
            </div>

        </form>


</body>

</html>