<?php 
session_start();


if(isset($_SESSION['type']) == 'admin' && isset($_GET['index']) && isset($_GET['player']) && isset($_GET['shoe']) && isset($_GET['year']) && isset($_GET['brand'])){ 
    
    $player = $_GET['player'];
    $shoe = $_GET['shoe'];
    $year = $_GET['year'];
    $brand = $_GET['brand'];
    

    $filename = '../database/products.txt';
    $file = json_decode(file_get_contents($filename, true),true);
    $counter=0;
    foreach ($file as $value) {
        
        if($player == $value['player'] && $shoe == $value['shoe'] && $year == $value['year'] && $brand == $value['brand']){
           
            unset($file[$counter]);
            break;
        }
        $counter++;
    }
    $myfile = fopen($filename, "w");
    
    fwrite($myfile, json_encode($file));    
    fclose($myfile);
    
    header('location: ../products/products.php');

}





?>