<?php
include_once '../../../../php/config.php';
session_start();
if (!isset($_SESSION['adminlogin'])) {
  // code...
  header('location:../../index.php');
}

if (isset($_GET['catid'])) {
  # code...
  $catid = $_GET['catid'];
  $cat_data = mysqli_query($con, "SELECT * FROM `categories` WHERE `Category_ID`= '$catid' ");


  $cat_row = mysqli_fetch_assoc($cat_data);
}


//$name = $prod_row['Product_Name']



if (isset($_POST['up_submit'])) {
  // code...
  $cid = $_POST['cat_id'];
  $cat_name = $_POST['cat_name'];


  $update_query_cat = mysqli_query($con, "UPDATE `categories` SET `Category_Name`='$cat_name' WHERE `Category_ID` = '$cid'");

  if ($update_query_cat) {
    # code...

    # code...
?>

    <script>
      alert('Data Updated');
    </script>

  <?php

  }
}

if (isset($_POST['del_submit'])) {
  # code...
  $del_cat = mysqli_query($con, "DELETE FROM `categories` WHERE `Category_ID`= '$catid' ");

  if ($del_cat) {
    # code...\
  ?>

    <script>
      alert('Data Deleeted');
    </script>

<?php
  }
}


?>


<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>Gricee Grocery | Admin Panel | Category List</title>
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
    .modal {
      display: block;
      position: static;
      z-index: 1;
      padding-top: 0px;
      left: 16.5%;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto;
      background-color: #fefefe;
    }

    .modal-content {
      position: relative;
      background-color: #fefefe;
      margin: auto;
      padding: 0;
      width: 90%;
    }

    .close {
      color: white;
      position: absolute;
      top: 10px;
      right: 25px;
      font-size: 35px;
      font-weight: bold;
    }

    .close:hover,
    .close:focus {
      color: #999;
      text-decoration: none;
      cursor: pointer;
    }

    .cursor {
      cursor: pointer;
    }
  </style>


  <script>
    function openModal() {
      document.getElementById("myModal").style.display = "block";
    }

    function closeModal() {
      document.getElementById("myModal").style.display = "none";
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
          <a class="nav-link" href="../../logout.php">Log Out</a>
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
              <a href="category-list.php" class="nav-link active">
                <i class="nav-icon fas fa-edit"></i>
                <p>
                  Category List
                </p>
              </a>
            </li>
            <li class="nav-item">
              <a href="orders-list.php" class="nav-link ">
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
              <h1>Category List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="../../dashboard.php">Home</a></li>
                <li class="breadcrumb-item active">Category List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>

      <!-- Main content -->
      <section class="content">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title"></h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Category ID</th>
                      <th>Category Image</th>
                      <th>Category Name</th>
                      <th>Load Data</td>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $sql = "SELECT * FROM `categories`";
                    $res_data = mysqli_query($con, $sql);

                    while ($row = mysqli_fetch_assoc($res_data)) {
                      // code...

                    ?>
                      <tr>
                        <td><?php echo $row['Category_ID']; ?></td>
                        <td><?php echo "<img src=\"data:image;base64," . $row['Category_Image_Temp'] . "\" alt=" . $row['Category_Image_Name'] . " width=\"50px\" height=\"50px\">"; ?></td>
                        <td><?php echo $row['Category_Name']; ?></td>
                        <td><a href="?catid=<?php echo $row['Category_ID']; ?>" class="btn btn-info btn-sm" onclick="openModal()">
                            <i class=" fas fa-pencil-alt">
                            </i>
                            Load
                          </a></td>

                      </tr>
                    <?php

                    }
                    ?>



                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Category ID</th>
                      <th>Category Image</th>
                      <th>Category Name</th>
                      <th>Load Data</th>
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
        <?php
            if (isset($_GET['catid'])) {
              // code...
              ?>
              <div class="modal" id="myModal">
                <!-- jquery validation -->

                <div class="card card-primary">
                  <div class="card-header">
                    <h3 class="card-title">Add Products</h3>
                    <span class="close cursor" onclick="closeModal()">&times;</span>
                  </div>
                  <!-- /.card-header -->
                  <!-- form start -->
                  <form id="form1" method="post">
                    <div class="card">
                      <div class="form-group">

                        <input type="hidden" name="cat_id" class="form-control" id="cat_id" onkeypress="return (event.charCode > 64 &&
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32" value="<?php if (isset($cat_row['Category_ID'])) {
                                                                                                                                echo $cat_row['Category_ID'];
                                                                                                                              }  ?>">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Category Name</label>
                        <input type="text" name="cat_name" class="form-control" id="cat_name" required onkeypress="return (event.charCode > 64 &&
                        event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32" value="<?php if (isset($cat_row['Category_Name'])) {
                                                                                                                                echo $cat_row['Category_Name'];
                                                                                                                              }  ?>">
                      </div>
                    </div>
                    <!-- /.card-body -->
                    <div class="card-footer">
                      <button type="submit" name="up_submit" class="btn btn-primary">Submit</button>
                      <button class="btn btn-danger btn-sm" type="submit" name="del_submit">
                        <i class="fas fa-trash">
                        </i>
                        Delete
                      </button>
                    </div>

                </div>
                </form>
                <!-- /.row -->
          </div>

              <?php
            } else {
              // code...
              ?>
                <h1>Kindly Load the data</h1>
              <?php
            }


         ?>

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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
  <!-- page script -->
  <script>
    $(function() {
      $("#example1").DataTable();
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
      });
    });
  </script>
  <script type="text/javascript">
    $(document).ready(function() {

      $('#form1').validate();
    });
  </script>
</body>

</html>
