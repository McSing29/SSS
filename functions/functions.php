<?php 

$rank_list  = array('Instructor','Asst. Professor','Asso. Professor','Professor');
$department_list = array('Computer Science','Information Technology');
$addmission_list = array('Interviewer','Admission Officer');

function echo_safe($string){
    echo htmlentities($string);
}

function valid_string($string,$min,$max){
    $length = strlen($string);
    if(strlen($string) == strlen(trim($string) ) && ($length>$min && $length <$max)){
        return 'valid';
    }else {
        return 'invalid';
    } 
} 

function string_min_max($string,$min,$max){
    $length = strlen($string);
    if($length>$min && $length <$max){
        return 'valid';
    } else {
        return 'invalid';
    }
}

function validate_email($email,$domain){
    $email = filter_var($email,FILTER_VALIDATE_EMAIL);
    $counter = $length = strlen($email)-1;
    $domaincounter=0;
    while($counter){
        if($email[$counter] == $domain[$domaincounter]){
            if($length - $counter+1 != strlen($domain))
            return 'invalid';
            while($length > $counter + $domaincounter){
                $domaincounter++;
                if($email[$counter+$domaincounter] != $domain[$domaincounter]){
                    return 'invalid'; 
                }
            }
            return 'valid';   
        }
        $counter--;
    }
}

function validate_from_array($string,$string_arr){
    foreach ($string_arr as $value){
        if($value == $string){
            return 'valid';
        }
    }
    return 'invalid';
}

?>