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
    <title>Products</title>
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
                <a href="../products/products.php" class = "active">
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
                <a href="../suppliers/suppliers.php">
                    <i class='bx bx-broadcast' ></i>
                    <span class="links-name">Suppliers</span>
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
                    <h3 class="table-title">NBA PLAYERS AND THEIR SIGNATURE SHOE</h3>
                    <?php 
                    if($_SESSION['type'] == 'admin'){
                        echo '<input type="button" class="button" value="Add Signature Shoe" onclick="location.href=\'addShoe.php\'">';
                    }
                    ?>
                    
                
                </div>
                <div class="divider-no-border"></div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nba Player</th>
                            <th>Signature Shoe</th>
                            <th>Year Released</th>
                            <th>Brand</th>
                            <th class="action">Action</th>
                            
                            
                        </tr>
                    </thead>
                    <tbody>
                        <?php  
                        
                        $file = json_decode(file_get_contents('../database/products.txt', true),true);
                        $counter = 0;
                        
                        foreach ($file as $value) {
                            $counter++;
                            echo '<tr>';
                            echo '<td>'.$counter.'</td>';
                            echo '<td>'.$value['player'].'</td>';
                            echo '<td>'.$value['shoe'].'</td>';
                            echo '<td>'.$value['year'].'</td>';
                            echo '<td>'.$value['brand'].'</td>';
                            if($_SESSION['type'] == 'admin'){
                                echo '<td class="action">
                                    <a class="action-edit" href="#">Edit</a>
                                    <a class="action-remove" href="removeShoe.php?index='.$counter.'&player='.$value['player'].'&shoe='.$value['shoe'].'&year='.$value['year'].'&brand='.$value['brand'].'">Remove</a>
                                </td>';
                            }
                            echo '</tr>';
                           
                            
                        }
                        
                        ?>
                        
                    </tbody>
                </table>
            </div>
        </div>
    </section>
</body>
</html>