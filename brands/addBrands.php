<?php 

session_start();

if(isset($_SESSION['type']) == 'admin'){
    if(isset($_POST['brand_name']) && isset($_POST['brand_status'])){
        $brand_name = $_POST['brand_name'];
        $origin = $_POST['origin'];
        $brand_status = $_POST['brand_status'];
        $quantity = $_POST['quantity'];
        $size = $_POST['size'];

        
    
        
        $filename = '../database/brands.txt';
        $file = json_decode(file_get_contents($filename, true),true);
        $num = count($file);
        $arr[$num] = array(
            'brand_name'=> $brand_name,
            'origin'=> $origin,
            'brand_status'=> $brand_status,
            'quantity' => $quantity,
            'size'=> $size
        );
        $file = array_merge($file,$arr);
        $myfile = fopen($filename, "w");
        
        fwrite($myfile, json_encode($file));    
        fclose($myfile);

        
        header('location: ../brands/brands.php');
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
    <title>Add Brand</title>
</head>
<body  background = "shoe.jpg"><br>
    
    <div class="login-container">
        <form class="login-form" action="addBrands.php" method="post">
            <div class="logo-details">
                <i class='bx bxl-stripe'></i>
                <span class="logo-name">Shoe Stock System</span>
            </div>
            <hr class="divider">
            <label for="brand_name">Brand Name</label>
            <input type="text" id="brand_name" name="brand_name" placeholder="Enter brand name" required tabindex="1">

            <label for="origin">Country of Origin</label>
            <input type="text" id="origin" name="origin" placeholder="Enter Country" required tabindex="1">
            
            <label for="brand_status">Brand Status</label><br>
                <select id="brand_status" name="brand_status" required tabindex = '5'>
                    <option value="Available">Available</option>
                    <option value="Not Available">Not Available</option>
                </select> <br>
            <label for="quantity">Quantity:</label>
            <input id="quantity" type="text" name="quantity" value="0" />

            <label for="size">Size</label>
            <input type="text" id="size" name="size" placeholder="Enter Size" required tabindex="1">
            
            
            
    
            <input class="button" type="submit" value="Add Brand" name="addBrands" tabindex="9">
            <a href="brands.php" style ="text-decoration: none;">Go Back</a>
            <?php
            
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
        </form>
    </div>
</body>
</html>