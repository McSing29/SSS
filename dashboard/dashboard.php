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
                <a href="../products/products.php">
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
                            <div class="box-topic">Products</div>
                            <div class="number">6969</div>
                            <div class="indicator">
                                
                                <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                            </div>
                        </div>
                    <i class='bx bx-shopping-bag'></i>
                </div>

                <div class="box">
                        <div class="right-side">
                            <div class="box-topic">Orders</div>
                            <div class="number">9696</div>
                            <div class="indicator">
                                
                                <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                            </div>
                        </div>
                    <i class='bx bx-cart-download'></i>
                </div>

                <div class="box">
                        <div class="right-side">
                            <div class="box-topic">Stocks</div>
                            <div class="number">8888</div>
                            <div class="indicator">
                                
                                <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                            </div>
                        </div>
                    <i class='bx bx-coin-stack'></i>
                </div>

                <div class="box">
                        <div class="right-side">
                            <div class="box-topic">Revenue</div>
                            <div class="number">8080</div>
                            <div class="indicator">
                                
                            <span class="text">As of <?php echo ' ' . date("m-d-Y h:i:s A"); ?></span>
                            </div>
                        </div>
                    <i class='bx bx-bar-chart'></i>
                </div>

                <div class="charts">
                    
                    <div class="chart">
                        <h2> Total Stock Sale (Monthly)</h2> 
                        <br>
                        </br>
                        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
                        <body>
                        <canvas id="myChart" style="width:100%;max-width:1000px"></canvas>

                        <script>
                        var xValues = ["Jan","Feb","March","April","May","June", "July", "Aug", "Sept", "Oct", "Nov", "Dec"];
                        var yValues = [77,88,88,99,99,101,105,111,114,114,125, 128];

                        new Chart("myChart", {
                        type: "line",
                        data: {
                            labels: xValues,
                            datasets: [{
                            fill: false,
                            lineTension: 0,
                            backgroundColor: "green",
                            borderColor: "blue",
                            data: yValues
                            }]
                        },
                        options: {
                            legend: {display: false},
                            scales: {
                            yAxes: [{ticks: {min: 70, max:130}}],
                            }
                        }
                        });
                        </script>

                        </body>
                    </div>
                </div>
              
           
              


        </div>


    </section>

        
</body>

</html>
