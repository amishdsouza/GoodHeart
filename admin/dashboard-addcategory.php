<?php
session_start();
include_once '../php/config.php';

// if (isset($_GET['pageno'])) {
//     $pageno = $_GET['pageno'];
// } else {
//     $pageno = 1;
// }
//
// $no_of_records_per_page = 10;
// $offset = ($pageno-1) * $no_of_records_per_page;
//
//
// $total_pages_sql = "SELECT COUNT(*) FROM user_info WHERE User_Type = 'Customer'";
// $result = mysqli_query($con,$total_pages_sql);
// $total_rows = mysqli_fetch_array($result)[0];
// $total_pages = ceil($total_rows / $no_of_records_per_page);
//
// $sql = "SELECT * FROM user_info WHERE User_Type = 'Customer' LIMIT $offset, $no_of_records_per_page";
// $res_data = mysqli_query($con,$sql);


if (isset($_POST['submit'])) {
    // code...
    $cat_name = $_POST['cat_name'];
    $cat_id = $_POST['cat_id'];


    $cat_image = addslashes($_FILES['cat_image']['name']);
    $cat_image_tmp = addslashes($_FILES['cat_image']['tmp_name']);

    $cat_image_tmp = file_get_contents($cat_image_tmp);
    $cat_image_tmp = base64_encode($cat_image_tmp);

    $query = mysqli_query($con, "INSERT INTO categories(Category_ID,Category_Name,Category_Image_Name,Category_Image_Temp) VALUES ('$cat_id','$cat_name','$cat_image','$cat_image_tmp')");



    if ($query) {
        // code...
        ?>
        <script type="text/javascript">
            alert('Records Entered');
        </script>

    <?php
        } else {
            //   // code...
            echo ("Error description: " . mysqli_error($con));
            ?>


<?php
    }
}

?>

<html>
<title>Admin Panel</title>
<link rel="stylesheet" href="../css/dashboard.css">
<link rel="stylesheet" href="../css/login.css">
<link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">

<head>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  	<script src="js/textbox.js"></script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js">
  	</script>
  	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
</head>

<body>
    <div class="area" style="margin-left:60px;">
        <h1 style="text-align: center;">Add Categories</h2>

            <form class="" method="post" enctype="multipart/form-data" id="addcat">
                <table class="table table-hover table-dark">
                    <tbody>
                        <tr>
                            <th><span class="tb-text">Category ID</span></th>
                            <td><input type="text" name="cat_id" id="cat_id" class="inputemail" style="width:50%;" required></td>
                        </tr>
                        <tr>
                            <th><span class="tb-text">Category Name</span></th>
                            <td><input type="text" name="cat_name" id="cat_name" class="inputemail" style="width:50%;" required></td>
                        </tr>
                         <tr>
                            <th><span class="tb-text">Category Image</span></th>
                            <td><input type="file" name="cat_image" id="cat_image" required accept="image/*"></td>
                        </tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" name="submit" class="login100-form-btn" style="width:40%;"><b>SUBMIT</b></button></td>
                        </tr>
                    </tbody>
                </table>
            </form>
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
                    <span class="nav-text">
                        Users List
                    </span>
                </a>

            </li>
            <li class="has-subnav">
                <a href="#" style="pointer-events:none;">
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
                <a href="dashboard.productlist.php">
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


<script>
  $("#addcat").validate();
</script>

</html>
