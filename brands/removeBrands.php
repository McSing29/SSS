<?php 
session_start();


if(isset($_SESSION['type']) == 'admin' && isset($_GET['index']) && isset($_GET['brand_name']) && isset($_GET['origin']) && isset($_GET['brand_status']) && isset($_GET['quantity']) && isset($_GET['size'])){ 
    
    $brand_name = $_GET['brand_name'];
    $origin = $_GET['origin'];
    $brand_status = $_GET['brand_status'];
    $quantity = $_GET['quantity'];
    $size = $_GET['size'];

    $filename = '../database/brands.txt';
    $file = json_decode(file_get_contents($filename, true),true);
    $counter=0;
    foreach ($file as $value) {
        
        if($brand_name == $value['brand_name'] && $origin == $value['origin'] && $brand_status == $value['brand_status'] && $quantity == $value['quantity'] && $size == $value['size']){
           
            unset($file[$counter]);
            break;
        }
        $counter++;
    }
    $myfile = fopen($filename, "w");
    
    fwrite($myfile, json_encode($file));    
    fclose($myfile);
    
    header('location: ../brands/brands.php');

}





?>