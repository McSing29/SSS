<?php

    session_start();
    if (isset($_SESSION['logged-in'])){
        header('location: ../dashboard/dashboard.php');
    }
    if(isset($_POST['username']) && isset($_POST['password'])){

   
        $username = $_POST['username'];
        $password = $_POST['password'];

        
        $file = json_decode(file_get_contents('../database/users.txt', true),true);
        foreach ($file as $value) {
            
            if($username == $value['username']  && $password == $value['password']){
                $error = '';
                $_SESSION['logged-in'] = $value['username'];
                $_SESSION['fname'] = $value['fname'];
                $_SESSION['lname'] = $value['lname'];
                $_SESSION['type'] = $value['type'];
                header('location: ../dashboard/dashboard.php');
            }
            else{
                $error = 'Invalid username/password. Try again.';
            }
        }
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=p, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Login</title>
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="login.php" method="post">
            <div class="logo-details">
                <i class='bx bxl-stripe'></i>
                <span class="logo-name">Shoe Stock System</span>
            </div>
            <hr class="divider">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1">
            <br> 
            </br>
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
            <br> 
            </br>
            <input class="button" type="submit" value="Login" name="login" tabindex="3">
            
            
            
            
            
            <br> 
            </br> 
            <br> 
            </br>
            <br> 
            </br>
            <br> 
            </br>
        
            <a href="signup.php" style ="text-decoration: none;">Signup?</a>
            <?php
            
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
            <br> 
            </br>
            
        </form>
    </div>
</body>
</html>