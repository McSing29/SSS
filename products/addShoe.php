<?php 

session_start();

if(isset($_SESSION['type']) == 'admin'){
    if(isset($_POST['player']) && isset($_POST['shoe'])){
        $player = $_POST['player'];
        $shoe = $_POST['shoe'];
        $year = $_POST['year'];
        $brand = $_POST['brand'];
       

        
    
        
        $filename = '../database/products.txt';
        $file = json_decode(file_get_contents($filename, true),true);
        $num = count($file);
        $arr[$num] = array(
            'player'=> $player,
            'shoe'=> $shoe,
            'year'=> $year,
            'brand' => $brand

        );
        $file = array_merge($file,$arr);
        $myfile = fopen($filename, "w");
        
        fwrite($myfile, json_encode($file));    
        fclose($myfile);

        
        header('location: ../products/products.php');
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
    <title>Add Signature Shoe</title>
</head>
<body background = "shoe.jpg"><br>
    <br> 
    </br>
    <div class="login-container">
        <form class="login-form" action="addShoe.php" method="post">
            <div class="logo-details">
                <i class='bx bxl-stripe'></i>
                <span class="logo-name">Shoe Stock System</span>
            </div>
            <hr class="divider">
            <label for="player">NBA PLAYER</label>
            <input type="text" id="player" name="player" placeholder="Enter NBA Player" required tabindex="1">

            <label for="shoe">Signature Shoe</label>
            <input type="text" id="shoe" name="shoe" placeholder="Enter Signature Shoe" required tabindex="1">

            <label for="year">Year Released</label>
            <input type="number" id="year" name="year" placeholder="Enter Year Released" required tabindex="1" value="2022">
            
            <label for="brand">Brand</label><br>
                <select id="brand" name="brand" required tabindex = '10'>
                    <option value="Nike">Nike</option>
                    <option value="Jordan">Jordan</option>
                    <option value="Adidas">Adidas</option>
                    <option value="Under Armour">Under Armour</option>
                    <option value="Reebok">Reebok</option>


                </select> <br>
    
            
            
            
    
            <input class="button" type="submit" value="Add Shoe" name="Add Shoe" tabindex="9">
            <a href="products.php" style ="text-decoration: none;">Go Back</a>
            <?php
            
                if(isset($error)){
                    echo '<div><p class="error">'.$error.'</p></div>';
                }
                
            ?>
        </form>
    </div>
</body>
</html>