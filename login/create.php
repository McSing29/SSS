<?php 

session_start();
if (isset($_SESSION['logged-in'])){
    header('location: ../dashboard/dashboard.php');
}



if(isset($_POST['username']) && isset($_POST['password']) && isset($_POST['fname']) && isset($_POST['lname'])){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];

    
    $filename = '../database/users.txt';
    $file = json_decode(file_get_contents($filename, true),true);
    foreach ($file as $value) {
        
        if($username == $value['username']){
            $error = 'username used. Try again.';
            break;
        }
    }
    if(!isset($error)){
        
        $num = count($file);
        $arr[$num] = array(
            'username' =>$username,
            'password' =>$password,
            'fname' => $fname,
            'lname' => $lname,
            'type'=>'staff'
        );
        $file = array_merge($file,$arr);
        $myfile = fopen($filename, "w");
        
        fwrite($myfile, json_encode($file));    
        fclose($myfile);
        $error = '';
    
        $_SESSION['logged-in'] = $username;
        $_SESSION['fname'] = $fname;
        $_SESSION['lname'] = $lname;
        $_SESSION['type'] ='staff';
      
        header('location: ../dashboard/dashboard.php');
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
    <title>Create an Account</title>
</head>
<body background = "shoe.jpg"><br>
    <div class="login-container">
        <form class="login-form" action="create.php" method="post">
            <div class="logo-details">
                <i class='bx bxl-stripe'></i>
                <span class="logo-name">Shoe Stock System</span>
            </div>
            <hr class="divider">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter username" required tabindex="1">
            <label for="password">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter password" required tabindex="2">
            <label for="fname">First Name</label>
            <input type="text" id="fname" name="fname" placeholder="Enter First Name" required tabindex="3">
            <label for="fname">Last Name</label>
            <input type="text" id="lname" name="lname" placeholder="Enter Last Name" required tabindex="4">
            <input class="button" type="submit" value="Create" name="login" tabindex="5">
            <a href="login.php" style ="text-decoration: none;">Back to Login</a>
            <?php
            
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
        </form>
    </div>
</body>
</html>