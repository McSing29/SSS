<?php

    session_start();
    
    if (!isset($_SESSION['logged-in'])){
        header('location: ../login/login.php');
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
    <title>Dashboard</title>
</head>
<body>
    <div class="side-bar">
        <div class="logo-details">
            <i class='bx bxl-stripe'></i>
            <span class="logo-name">Shoe Stock System</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../dashboard/dashboard.php" class ="active">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="links-name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../brands/brands.php">
                <i class='bx bx-bitcoin'></i>
                    <span class="links-name">Brands</span>
                </a>
            </li>
            <?php 
            if($_SESSION['type'] == 'admin'){
                
            }
            ?>
            <li>
                <a href="../category/category.php">
                    <i class='bx bx-category-alt'></i>
                    <span class="links-name">Category</span>
                </a>
            </li>
            <?php 
            if($_SESSION['type'] == 'admin'){
                
            }
            ?>
            <li>
                <a href="#">
                    <i class='bx bx-shopping-bag'></i>
                    <span class="links-name">Products</span>
                </a>
            </li>
            <li>
                <a href="#" >
                    <i class='bx bx-cart-add'></i>
                    <span class="links-name">Orders</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-broadcast' ></i>
                    <span class="links-name">Report</span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-cog'></i>
                    <span class="links-name">Settings</span>
                </a>
            </li>
            <hr class="line">
            <li id="logout-link">
                <a href="../login/logout.php">
                    <i class='bx bx-log-out-circle'></i>
                    <span class="links-name">Logout</span>
                </a>
            </li>
        </ul>
    </div>
    <section class="home-section">
        <nav>
            <div class="search">
                <input type ="text" id ="search" placeholder="Type here to search">
                <label for ="search"> <i class='bx bx-search'></i></label>
            </div>
            <div class="profile-details">
                <i class='bx bx-user'></i>
                <?php echo '<span class="admin-name">'.$_SESSION['fname'].' '.$_SESSION['lname'].'</span>'; ?>
            </div>
        </nav>
        <div class="home-content">
            <div class="overview-boxes">
                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Products</div>
                        <div class="number">6969</div>
                        <div class="indicator">
                            
                            <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                        </div>
                    </div>
                    <i class='bx bx-shopping-bag'></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Orders</div>
                        <div class="number">9696</div>
                        <div class="indicator">
                            
                            <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                        </div>
                    </div>
                    <i class='bx bx-cart-download'></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Stocks</div>
                        <div class="number">8888</div>
                        <div class="indicator">
                            
                            <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                        </div>
                    </div>
                    <i class='bx bx-coin-stack'></i>
                </div>

                <div class="box">
                    <div class="right-side">
                        <div class="box-topic">Total Revenue</div>
                        <div class="number">8080</div>
                        <div class="indicator">
                            
                        <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                        </div>
                    </div>
                    <i class='bx bx-bar-chart'></i>
                </div>
            </div>

        </div>
    </section>
</body>
</html>