<?php
session_start();
include_once '../php/config.php';


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 4;
$offset = ($pageno - 1) * $no_of_records_per_page;


$total_pages_sql = "SELECT COUNT(*) FROM products";
$result = mysqli_query($con, $total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT products.Product_ID,products.Product_Name,products.Product_Description,products.Product_Price,products.Product_Dis_Price,products.Product_Image_Temp,products.Product_Image,categories.Category_Name FROM products INNER JOIN categories ON products.Category_ID = categories.Category_ID LIMIT $offset, $no_of_records_per_page";
$res_data = mysqli_query($con, $sql);

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
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/zf/dt-1.10.20/sp-1.0.1/sl-1.3.1/datatables.min.css" />

    <script type="text/javascript" src="https://cdn.datatables.net/v/zf/dt-1.10.20/sp-1.0.1/sl-1.3.1/datatables.min.js"></script>
    <style>
        .inputemail {
            height: 150px !important;
        }
    </style>
</head>

<body>
    <div class="area" style="margin-left:60px;">
        <h1 style="text-align: center;">Product List</h2>
            <table class="table table-hover table-dark">

                <?php
                if (mysqli_num_rows($result) == 0) {
                    echo "<div class=\"row-user\">";
                    echo "<div class=\"user-id\">";
                    echo "<h3>No Records Found</h3>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<thead>";
                    echo "<tr>";
                    echo "<th><span class=\"tb-text\">Product ID</span></th>";
                    echo "<th><span class=\"tb-text\">Product Name</span></th>";
                    echo "<th><span class=\"tb-text\">Product Description</span></th>";
                    echo "<th><span class=\"tb-text\">Product Price</span></th>";
                    echo "<th><span class=\"tb-text\">Product Discount</span></th>";
                    echo "<th><span class=\"tb-text\">Product Image</span></th>";
                    echo "<th><span class=\"tb-text\">Category</span></th>";
                    echo "</tr>";
                    echo "</thead>";

                    echo "<tbody>";
                    while ($data = mysqli_fetch_array($res_data)) {
                        // code...

                        echo "<tr>";
                        echo "<th><span class=\"tb-text\">" . $data['Product_ID'] . "</span></th>";
                        echo "<th><span class=\"tb-text\">" . $data['Product_Name'] . "</span></th>";
                        echo "<th><textarea class=\"inputemail\">" . $data['Product_Description'] . "</textarea></th>";
                        echo "<th><span class=\"tb-text\">" . $data['Product_Price'] . "</span></th>";
                        echo "<th><span class=\"tb-text\">" . $data['Product_Dis_Price'] . "</span></th>";
                        echo "<th><img src=\"data:image;base64," . $data['Product_Image_Temp'] . "\" alt=" . $data['Product_Image'] . " width=\"200px\" height=\"200px\"></th>";
                        echo "<th><span class=\"tb-text\">" . $data['Category_Name'] . "</span></th>";
                        echo "</tr>";
                    }
                    echo "</tbody>";
                }

                ?>
            </table>
            <ul class="pagination">
                <li><a href="?pageno=1">First</a></li>
                <li class="<?php if ($pageno <= 1) {
                                echo 'disabled';
                            } ?>">
                    <a href="<?php if ($pageno <= 1) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno - 1);
                                } ?>">Prev</a>
                </li>
                <li class="<?php if ($pageno >= $total_pages) {
                                echo 'disabled';
                            } ?>">
                    <a href="<?php if ($pageno >= $total_pages) {
                                    echo '#';
                                } else {
                                    echo "?pageno=" . ($pageno + 1);
                                } ?>">Next</a>
                </li>
                <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
            </ul>
    </div>


    <nav class="main-menu">
        <ul>
            <li>
                <a href="dashboard.php">
                    <i class="fa fa-home fa-2x"></i>
                    <span class="nav-text">
                        Dashboard
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="dashboard-userlist.php">
                    <i class="fa fa-user fa-2x"></i>
                    <span class="nav-text ">
                        Users Lists
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
                <a href="#" style="pointer-events:none;">
                    <i class="fa fa-list fa-2x"></i>
                    <span class="nav-text">
                        Display Products
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-table fa-2x"></i>
                    <span class="nav-text">
                        Tables
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-map-marker fa-2x"></i>
                    <span class="nav-text">
                        Maps
                    </span>
                </a>
            </li>
            <li>
                <a href="#">
                    <i class="fa fa-info fa-2x"></i>
                    <span class="nav-text">
                        Documentation
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