<?php
session_start();
include_once '../php/config.php';

$query = mysqli_query($con, "SELECT sales, Extract(YEAR FROM date_reg) AS year,Extract(DAY FROM date_reg) AS day,Extract(MONTH FROM date_reg) AS month FROM test;");


/* if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 10;
$offset = ($pageno - 1) * $no_of_records_per_page;


$total_pages_sql = "SELECT COUNT(*) FROM user_info WHERE User_Type = 'Customer'";
$result = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM user_info WHERE User_Type = 'Customer' LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($con, $sql); */

if (!isset($_SESSION['adminlogin'])) {
  // code...
  header('location:../../index.php?sourcead=dashboard.php');
}

?>

<html>
<title>Admin Panel</title>
<link rel="stylesheet" href="../css/dashboard.css">
<link rel="stylesheet" href="../css/login.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
        google.charts.load('current', {
            'packages': ['bar']
        });
        google.charts.setOnLoadCallback(drawChart);

        function drawChart() {
            var data = google.visualization.arrayToDataTable([
                ['Year', 'Sales', 'Expenses', 'Profit'],
                ['2014', 1000, 400, 200],
                ['2015', 1170, 460, 250],
                ['2016', 660, 1120, 300],
                ['2017', 1030, 540, 350]
            ]);

            var options = {
                chart: {
                    title: 'Company Performance',
                    subtitle: 'Sales, Expenses, and Profit: 2014-2017',
                }
            };

            var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

            chart.draw(data, google.charts.Bar.convertOptions(options));
        }
    </script>


</head>

<body>
    <div class="area" style="margin-left:60px;">
        <h1 style="text-align: center;">Dashboard</h2>

            <div id="columnchart_material" style="width: 800px; height: 500px;" style="margin-right: 150px;"></div>



    </div>


    <nav class="main-menu">
        <ul>
            <li>
                <a href="dashboard.php" style="pointer-events:none;">
                    <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="dashboard-userlist.php">
                    <i class="fa fa-user fa-2x"></i>
                    <span class="nav-text">
                        Users List
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="dashboard-addcategory.php">
                    <i class="fa fa-list fa-2x"></i>
                    <span class="nav-text">
                        Add Category
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="dashboard-categorylist.php">
                    <i class="fa fa-list fa-2x"></i>
                    <span class="nav-text">
                        Display Categories
                    </span>
                </a>

            </li>
            <li>
                <a href="dashboard-addproducts.php">
                    <i class="fa fa-list fa-2x"></i>
                    <span class="nav-text">
                        Add Products
                    </span>
                </a>
            </li>
            <li>
                <a href="dashboard-productlist.php">
                    <i class="fa fa-list fa-2x"></i>
                    <span class="nav-text">
                        Display Products
                    </span>
                </a>
            </li>

        </ul>

        <ul class="logout">
            <li>
                <a href="logout.php">
                    <i class="fa fa-power-off fa-2x"></i>
                    <span class="nav-text">
                        Logout
                    </span>
                </a>
            </li>
            <!-- </ul> -->

            <li>

                <a href="">
                    <i class="fa fa-user fa-2x"></i>
                    <span class="nav-text">
                        Welcome
                        <?php
                        echo $_SESSION['Name'];
                        ?>
                    </span>
                </a>

            </li>

        </ul>
    </nav>

</body>

</html>
