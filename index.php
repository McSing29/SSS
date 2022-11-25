<!---Joshua Yasil--->
<!---Emil John Magcanta--->
<?php
    
    session_start();

    if (isset($_SESSION['logged-in']) == 'admin'){
        header('location: dashboard.php');
    }
    
    else{
        header('location: login/login.php');
    }

?>