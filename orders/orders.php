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
    <title>Orders</title>
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
                <a href="../products/products.php" >
                    <i class='bx bx-shopping-bag'></i>
                    <span class="links-name">Products</span>
                </a>
            </li>
            <li>
                <a href="../orders/orders.php" class ="active">
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
            
        <br>
        </br>
        

          <div class="charts">
                    <div class="chart">
                        <h2> Bar Graph </h2>
                        
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.5.0/Chart.min.js"></script>
                        <body>

                        <canvas id="barChart" style="width:100%;max-width:900px"></canvas>

                        <script>
                        var xValues = ["Under Armour","World Balance", "Converse", "Adidas", "Air Jordan", "Puma", "Reebok", "Nike", "Vans"];
                        var yValues = [180, 174, 180, 195, 205, 173, 175, 220, 200];
                        var barColors = ["violet", "red", "green","blue","orange","brown", "yellow", "indigo", "pink"];

                        new Chart("barChart", {
                        type: "bar",
                        data: {
                            labels: xValues,
                            datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                            }]
                        },
                        options: {
                            legend: {display: false},
                            title: {
                            display: true,
                            text: "SHOE TRENDS AS OF 2022"
                            }
                        }
                        });
                        </script>

                        </body>
                    
                    </div>
                    <br> 
                    </br>
                    <div class="chart">
                        <h2> Pie Chart </h2> 
                        
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                        <body>

                        <canvas id="myChart" style="width:100%;max-width:900px"></canvas>

                        <script>
                        var xValues = ["Under Armour","World Balance", "Converse", "Adidas", "Air Jordan", "Puma", "Reebok", "Nike", "Vans"];
                        var yValues = [180, 174, 180, 195, 205, 173, 175, 220, 200];
                        var barColors = ["violet", "red", "green","blue","orange","brown", "yellow", "indigo", "pink"];


                        new Chart("myChart", {
                        type: "doughnut",
                        data: {
                            labels: xValues,
                            datasets: [{
                            backgroundColor: barColors,
                            data: yValues
                            }]
                        },
                        options: {
                            title: {
                            display: true,
                            text: "SHOE TRENDS AS OF 2022"
                            }
                        }
                        });
                        </script>

                        </body>
                    </div>

                    

              
           
              


        </div>
      </section>
    </html> 