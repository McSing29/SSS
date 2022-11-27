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
    <title>Category</title>
</head>
<body>
    <div class="side-bar">
        <div class="logo-details">
            <i class='bx bxl-stripe'></i>
            <span class="logo-name">Shoe Stock System</span>
        </div>
        <ul class="nav-links">
            <li>
                <a href="../dashboard/dashboard.php">
                    <i class='bx bx-grid-alt' ></i>
                    <span class="links-name">Dashboard</span>
                </a>
            </li>
            <li>
                <a href="../brands/brands.php" >
                    <i class='bx bx-bitcoin'></i>
                    <span class="links-name">Brands</span>
                </a>
            </li>
            <?php 
            if($_SESSION['type'] == 'admin'){
                
            }
            ?>
            <li>
                <a href="../category/category.php" class="active">
                    <i class='bx bx-category-alt'></i>
                    <span class="links-name">Category</span>
                </a>
            </li>
            <?php 
            if($_SESSION['type'] == 'admin'){
                
            }
            ?>
            <li>
                <a href="../products/products.php">
                    <i class='bx bx-shopping-bag'></i>
                    <span class="links-name">Products</span>
                </a>
            </li>
            <li>
                <a href="../orders/orders.php" >
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
            <div class="table-container">
                <div class="table-heading">
                    <h3 class="table-title">Shoe Category</h3>
                
                </div>
                <div class="divider-no-border"></div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Shoe Type</th>
                            <th>Description</th>
                            <th>Style</th>
                            <th>Variations</th>
                            <th>Status</th>
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        
                        $file = json_decode(file_get_contents('../database/category.txt', true),true);
                        $counter = 0;
                        
                        foreach ($file as $value) {
                            $counter++;
                            echo '<tr>';
                            echo '<td>'.$counter.'</td>';
                            echo '<td>'.$value['shoe_type'].'</td>';
                            echo '<td>'.$value['description'].'</td>';
                            echo '<td>'.$value['style'].'</td>';
                            echo '<td>'.$value['variations'].'</td>';
                            echo '<td>'.$value['status'].'</td>';
                            
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>
</html>