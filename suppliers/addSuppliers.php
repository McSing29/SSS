<?php 

session_start();

if(isset($_SESSION['type']) == 'admin'){
    if(isset($_POST['name']) ){
        $name = $_POST['name'];
        $email_address = $_POST['email_address'];
        $company_name = $_POST['company_name'];
        $company_position = $_POST['company_position'];
        $company_address = $_POST['company_address'];
       

        
    
        
        $filename = '../database/suppliers.txt';
        $file = json_decode(file_get_contents($filename, true),true);
        $num = count($file);
        $arr[$num] = array(
            'name'=> $name,
            'email_address'=> $email_address,
            'company_name'=> $company_name,
            'company_position'=> $company_position,
            'company_address' => $company_address

        );
        $file = array_merge($file,$arr);
        $myfile = fopen($filename, "w");
        
        fwrite($myfile, json_encode($file));    
        fclose($myfile);

        
        header('location: ../suppliers/suppliers.php');
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
    <title>Add Suppliers</title>
</head>
<body background = "shoe.jpg"><br>
    
    <div class="login-container">
        <form class="login-form" action="addSuppliers.php" method="post">
            <div class="logo-details">
                <i class='bx bxl-stripe'></i>
                <span class="logo-name">Shoe Stock System</span>
            </div>
            <hr class="divider">
            <label for="name">Fullname</label>
            <input type="text" id="name" name="name" placeholder="Enter Supplier Name" required tabindex="1">

            <label for="email">Email Address</label>
            <input type="text" id="email_address" name="email_address" placeholder="Enter email address" required tabindex="1">

            <label for="company_name">Company Name</label>
            <input type="text" id="company_name" name="company_name" placeholder="Enter Name of the Company" required tabindex="1">

            <label for="company_position">Company Position</label>
            <input type="text" id="company_position" name="company_position" placeholder="Enter Company Position" required tabindex="1">

            <label for="company_address">Company Address</label>
            <input type="text" id="company_address" name="company_address" placeholder="Enter Company Address" required tabindex="1">

            
    
    
            
    
            <input class="button" type="submit" value="Add Supplier" name="Add Supplier" tabindex="9">
            <a href="suppliers.php" style ="text-decoration: none;">Go Back</a>
            <?php
            
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
        </form>
    </div>
</body>
</html>