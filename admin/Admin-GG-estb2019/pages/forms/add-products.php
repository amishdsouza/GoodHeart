<?php
session_start();
include_once '../../../../php/config.php';

if (!isset($_SESSION['adminlogin'])) {
  // code...
  header('location:../../index.php');
}

$query_cat = mysqli_query($con, "SELECT * FROM `categories`");

if (isset($_POST['submit'])) {
  // code...
  $pro_name = $_POST['prod_name'];
  $pro_des = $_POST['prod_des'];
  $pro_price = $_POST['prod_price'];
  $pro_dis = $_POST['prod_dis'];
  $pro_cat = $_POST['prod_cat'];
  $stock = $_POST['prod_stock'];

  $pro_image = addslashes($_FILES['prod_image']['name']);
  $pro_image_tmp = addslashes($_FILES['prod_image']['tmp_name']);

  $pro_image_tmp = file_get_contents($pro_image_tmp);
  $pro_image_tmp = base64_encode($pro_image_tmp);


  $query = mysqli_query($con, "INSERT INTO products(Product_Name, Product_Description, Product_Price, Product_Dis_Price, Product_Image, Product_Image_Temp, Category_ID) VALUES ('$pro_name','$pro_des','$pro_price','$pro_dis','$pro_image','$pro_image_tmp','$pro_cat')");




  if ($query) {
    // code...
    $query2 = mysqli_query($con, "SELECT * FROM `products` ORDER BY Product_ID DESC LIMIT 1");

    $pro_row = mysqli_fetch_assoc($query2);

    $product_id = $pro_row['Product_ID'];

    $query3 = mysqli_query($con, "INSERT INTO `inventory`(`Product_ID`, `Product_Name`, `Stock_Items`) VALUES ('$product_id','$pro_name','$stock')");


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


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Good Heart | Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <script type="text/javascript">
    function isNumber(evt) {
      var iKeyCode = (evt.which) ? evt.which : evt.keyCode
      if (iKeyCode != 46 && iKeyCode > 31 && (iKeyCode < 48 || iKeyCode > 57))
        return false;

      return true;
    }
  </script>
</head>

<body class="hold-transition sidebar-mini">
  <div class="wrapper">
    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand navbar-white navbar-light">
      <!-- Left navbar links -->
      <ul class="navbar-nav">
        <li class="nav-item">
          <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
        </li>
        <li class="navbar-nav">
          <a class="nav-link" href="../../../logout.php">Log Out</a>
        </li>

    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
      <!-- Brand Logo -->
      <a href="index.php" class="brand-link">
        <img src="..\..\..\..\images/GriceeGroceryfinal.png" alt="Good Heart Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
        <span class="brand-text font-weight-light">Good Heart</span>
      </a>

      <!-- Sidebar -->
      <div class="sidebar">
        <!-- Sidebar user (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
          <div class="image">
            <img src="../../dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
          </div>
          <div class="info">
            <a href="#" class="d-block">Admin</a>
          </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
          <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
            <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
            <li class="nav-item has-treeview ">
              <a href="../../dashboard.php" class="nav-link">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../tables/user-list.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  User List
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add-products.php" class="nav-link active">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Add Products
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="add-category.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Add Category
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../tables/product-list.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Product List
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../tables/category-list.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Category List
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../tables/orders-list.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Orders List
                </p>
              </a>
            </li>
          </ul>
        </nav>
        <!-- /.sidebar-menu -->
      </div>
      <!-- /.sidebar -->
    </aside>

    <!-- Content Wrapper. Contains page content -->
    <div class="content-wrapper">
      <!-- Content Header (Page header) -->
      <section class="content-header">
        <div class="container-fluid">
          <div class="row mb-2">
            <div class="col-sm-6">
              <h1>Add Products</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">Add Products</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <!-- left column -->
            <div class="col-md-12">
              <!-- jquery validation -->
              <div class="card card-primary">
                <div class="card-header">
                  <h3 class="card-title">Add Products</h3>
                </div>
                <!-- /.card-header -->
                <!-- form start -->
                <form id="quickForm" method="post" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Name</label>
                      <input type="text" name="prod_name" class="form-control" id="prod_name" required >
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Description</label>
                      <textarea name="prod_des" class="form-control" id="prod_des" required></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Price</label>
                      <input type="text" name="prod_price" class="form-control" id="prod_price" required onkeypress="return isNumber(event);">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Discount</label>
                      <input type="text" name="prod_dis" class="form-control" id="prod_dis" required onkeypress="return isNumber(event);">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputFile">Product Image</label>
                      <div class="input-group">
                        <div class="custom-file">
                          <input type="file" name="prod_image" id="prod_image" accept="image/*" required>
                        </div>
                      </div>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <select class="form-control" name="prod_cat" id="prod_cat" required>
                        <option value="">Choose Category</option>
                        <?php
                        while ($row = mysqli_fetch_array($query_cat)) {
                          // code...
                          echo "<option value='" . $row['Category_ID'] . "'>" . $row['Category_Name'] . "</option>";
                        }
                        ?>
                      </select>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Stock</label>
                      <input type="text" name="prod_stock" class="form-control" id="prod_stock" required onkeypress="return isNumber(event);">
                    </div>
                  </div>
                  <!-- /.card-body -->
                  <div class="card-footer">
                    <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                  </div>
                </form>
              </div>
              <!-- /.card -->
            </div>
            <!--/.col (left) -->
            <!-- right column -->

            <!--/.col (right) -->
          </div>
          <!-- /.row -->
        </div><!-- /.container-fluid -->
      </section>
      <!-- /.content -->
    </div>
    <!-- /.content-wrapper -->
    <footer class="main-footer">
      <div class="float-right d-none d-sm-block">
        <b>Version</b> 3.0.3-pre
      </div>
      <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong> All rights
      reserved.
    </footer>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <!-- jQuery -->
  <script src="../../plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- jquery-validation -->
  <script src="../../plugins/jquery-validation/jquery.validate.min.js"></script>
  <script src="../../plugins/jquery-validation/additional-methods.min.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <script type="text/javascript">
    $(document).ready(function() {

      $('#quickForm').validate({
        rules: {
          email: {
            required: true,
            email: true,
          },
          password: {
            required: true,
            minlength: 5
          },
          terms: {
            required: true
          },
        },
        messages: {
          email: {
            required: "Please enter a email address",
            email: "Please enter a vaild email address"
          },
          password: {
            required: "Please provide a password",
            minlength: "Your password must be at least 5 characters long"
          },
          terms: "Please accept our terms"
        },
        errorElement: 'span',
        errorPlacement: function(error, element) {
          error.addClass('invalid-feedback');
          element.closest('.form-group').append(error);
        },
        highlight: function(element, errorClass, validClass) {
          $(element).addClass('is-invalid');
        },
        unhighlight: function(element, errorClass, validClass) {
          $(element).removeClass('is-invalid');
        }
      });
    });
  </script>
</body>

</html>
