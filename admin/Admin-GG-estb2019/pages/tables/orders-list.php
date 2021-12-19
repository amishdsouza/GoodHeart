<?php
include_once '../../../../php/config.php';

session_start();

if (!isset($_SESSION['adminlogin'])) {
  // code...
  header('location:../../index.php');
}


$page = 'Processing';

if (!isset($_GET['status'])) {
  // code...
  $res_data = mysqli_query($con, "SELECT *,DATE_FORMAT(Date_OF_Purchase,'%D %M %Y') AS Purchase_Date  FROM `total_orders` WHERE  `Order_Status` = 'Processing'");
}
else {
  // code...
  $page = $_GET['status'];
  $res_data = mysqli_query($con, "SELECT *,DATE_FORMAT(Date_OF_Purchase,'%D %M %Y') AS Purchase_Date  FROM `total_orders` WHERE `Order_Status` = '$page'");

}

//  $oid = $_GET['q'];
//$pid = $_GET['r'];
//$quant = $_GET['p'];
//$sql = "UPDATE `total_orders` SET `Order_Status`='Cancelled',`Payment_Status`='Refunded',`Date_OF_Purchase`= CURRENT_TIMESTAMP WHERE `Order_No` = '$oid'";

// $final_query = mysqli_query($con,$sql);

//$sql2 = "UPDATE `inventory` SET `Stock_Items`= ABS(Stock_Items + $quant) WHERE `Product_ID` = $pid";
//$final_query2 = mysqli_query($con, $sql2);

/*
      if ($final_query) {
    # code...
            if ($final_query2) {
              # code...
              ?>
                <script>
                  alert('Order Cancelled');
                </script>
              <?php
            }


      } */



?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gricee Grocery | Admin Panel</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <style>
      .sactive{
        color: white !important;
        background-color: #007bff !important;
      }
  </style>
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
        <img src="..\..\..\..\images/GriceeGroceryfinal.png" alt="Gricee Grocery Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
        <span class="brand-text font-weight-light">Gricee Grocery</span>
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
              <a href="../../dashboard.php" class="nav-link ">
                <i class="nav-icon fas fa-tachometer-alt"></i>
                <p>
                  Dashboard
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="user-list.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  User List
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../forms/add-products.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Add Products
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="../forms/add-category.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Add Category
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="product-list.php" class="nav-link">
                <i class="nav-icon fas fa-edit "></i>
                <p>
                  Product List
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="category-list.php" class="nav-link">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Category List
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="orders-list.php" class="nav-link active">
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
              <h1>Orders List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">All Orders List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
      <div class="content row" style="margin-left:350px !important;">
        <div class="row justify-content-center" >
          <div class="col-md-10 mb-5 text-center" >
            <table class="table table-bordered table-striped">
              <th class="<?php if (!isset($_GET['status']) || $page =='Processing'):echo "sactive"; ?>

              <?php endif; ?>">
              <a href="?status=Processing" class="<?php if (!isset($_GET['status']) || $page =='Processing'):echo "sactive"; ?>

              <?php endif; ?>">Processing</a>
            </th>

              <th class="<?php if ($page =='Dispatched'):echo "sactive"; ?>

              <?php endif; ?>">
              <a href="?status=Dispatched" class="<?php if ($page =='Dispatched'):echo "sactive"; ?>

              <?php endif; ?>">Dispatched</a>
              </th>

              <th class="<?php if ($page =='Cancelled'):echo "sactive"; ?>

              <?php endif; ?>">
                <a href="?status=Cancelled" class="<?php if ($page =='Cancelled'):echo "sactive"; ?>

                <?php endif; ?>">Cancelled</a>
             </th>

              <th class="<?php if ($page =='Delivered'):echo "sactive"; ?>

              <?php endif; ?>">
                <a href="?status=Delivered" class="<?php if ($page =='Delivered'):echo "sactive"; ?>

                <?php endif; ?>">Delivered</a>
              </th>
            </table>
          </div>
        </div>
      </div>
      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"><?php echo $page ?> Orders</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Order ID</th>
                      <th>User ID</th>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Order Status</th>
                      <th>Payment Type</th>
                      <th>Payment Status</th>
                      <th>Date of Purchase</th>
                      <th>Cancel Status</th>
                      <th>Transport Status</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    //$sql = "SELECT * FROM total_orders WHERE Order_Status = 'Processing'";
                    //$res_data = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($res_data)) {
                      // code...

                    ?>
                      <tr>
                        <td><?php echo $row['Order_No']; ?></td>
                        <td><?php echo $row['User_ID']; ?></td>
                        <td><?php echo $row['Product_ID']; ?></td>
                        <td><?php echo $row['Product_Name']; ?></td>
                        <td><?php echo $row['Quantity']; ?></td>
                        <td>₹<?php echo $row['Total_Price']; ?></td>
                        <td><?php echo $row['Order_Status']; ?></td>
                        <td><?php echo $row['Payment_Type']; ?></td>
                        <td><?php echo $row['Payment_Status']; ?></td>
                        <td><?php echo $row['Purchase_Date']; ?></td>
                        <td>
                          <?php if ($page == "Delivered" or $page == "Cancelled") {
    												// code...
    												?>
    												   Order Already <?php echo $page; ?>
    												<?php
                          }
                          else {
                            // code...
                            ?>
                            <a href="update-order.php?q=<?php echo $row['Order_No'] ?>&r=<?php echo $row['Product_ID'] ?>&p=<?php echo $row['Quantity'] ?>&o=<?php echo $row['User_ID']; ?>"><button type="submit" class="btn btn-info btn-sm" name="cancel">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Cancel
                              </button></a>
                            <?php
                          }
    						           ?>

                          </td>
                        <td>
                          <?php if ($page == "Delivered" or $page == "Cancelled") {
    												// code...
    												?>
    												   Order Already <?php echo $page; ?>
    												<?php
                          }
                          elseif($page == "Processing") {
                            // code...
                            ?>
                            <a href="dispatch-order.php?q=<?php echo $row['Order_No'] ?>&r=<?php echo $row['Product_ID'] ?>&p=<?php echo $row['Quantity'] ?>&o=<?php echo $row['User_ID']; ?>"><button type="submit" class="btn btn-info btn-sm" name="deliver">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Dispatch
                              </button></a>
                            <?php
                          }
                          else {
                            // code...
                            ?>
                            <a href="deliver-order.php?q=<?php echo $row['Order_No'] ?>&r=<?php echo $row['Product_ID'] ?>&p=<?php echo $row['Quantity'] ?>&o=<?php echo $row['User_ID']; ?>"><button type="submit" class="btn btn-info btn-sm" name="deliver">
                                <i class="fas fa-pencil-alt">
                                </i>
                                Delivered
                              </button></a>
                            <?php
                          }
                          ?>
                          </td>
                      </tr>
                    <?php

                    }
                    ?>



                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Order ID</th>
                      <th>User ID</th>
                      <th>Product ID</th>
                      <th>Product Name</th>
                      <th>Quantity</th>
                      <th>Total Price</th>
                      <th>Order Status</th>
                      <th>Payment Type</th>
                      <th>Payment Status</th>
                      <th>Date of Purchase</th>
                      <th>Cancel Status</th>
                      <th>Transport Status</th>
                    </tr>
                  </tfoot>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
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
  <!-- DataTables -->
  <script src="../../plugins/datatables/jquery.dataTables.js"></script>
  <script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <!-- AdminLTE App -->
  <script src="../../dist/js/adminlte.min.js"></script>
  <!-- AdminLTE for demo purposes -->
  <script src="../../dist/js/demo.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $("#example2").DataTable();
      $("#example3").DataTable();
    });
  </script>
</body>

</html>
