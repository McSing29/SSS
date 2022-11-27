<?php 
session_start();


if(isset($_SESSION['type']) == 'admin' && isset($_GET['index']) && isset($_GET['name']) && isset($_GET['email_address']) && isset($_GET['company_name']) && isset($_GET['company_position']) && isset($_GET['company_address']) ){ 
    
    $name = $_GET['name'];
    $email_address = $_GET['email_address'];
    $company_name = $_GET['company_name'];
    $company_position = $_GET['company_position'];
    $company_address = $_GET['company_address'];

    $filename = '../database/suppliers.txt';
    $file = json_decode(file_get_contents($filename, true),true);
    $counter=0;
    foreach ($file as $value) {
        
        if($name == $value['name'] && $email_address == $value['email_address'] && $company_name == $value['company_name'] && $company_position == $value['company_position'] && $company_address == $value['company_address']){
           
            unset($file[$counter]);
            break;
        }
        $counter++;
    }
    $myfile = fopen($filename, "w");
    
    fwrite($myfile, json_encode($file));    
    fclose($myfile);
    
    header('location: ../suppliers/suppliers.php');

}





?>