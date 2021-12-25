<?php
include_once '../../../../php/config.php';
session_start();
# code...

if (!isset($_SESSION['adminlogin'])) {
  // code...
  header('location:../../index.php');
}

if (isset($_GET['prodid'])) {
  # code...
  $prodid = $_GET['prodid'];
  $prod_data = mysqli_query($con, "SELECT products.Product_ID,products.Product_Name,products.Product_Description,products.Product_Price,products.Product_Dis_Price,products.Product_Image_Temp,products.Product_Image,categories.Category_Name,categories.Category_ID,inventory.Stock_Items FROM products INNER JOIN categories ON products.Category_ID = categories.Category_ID INNER JOIN inventory ON products.Product_ID = inventory.Product_ID WHERE products.Product_ID = '$prodid' ");


  $prod_row = mysqli_fetch_assoc($prod_data);


}

# code...

//$name = $prod_row['Product_Name']



if (isset($_POST['up_submit'])) {
  // code...
  $pid = $_POST['prod_id'];
  $pro_name = $_POST['prod_name'];
  $pro_des = $_POST['prod_des'];
  $pro_price = $_POST['prod_price'];
  $pro_dis = $_POST['prod_dis'];
  $pro_cat = $_POST['prod_cat'];
  $stock = $_POST['prod_stock'];



  $update_query_prod = mysqli_query($con, "UPDATE `products` SET `Product_Name`='$pro_name',`Product_Description`='$pro_des',`Product_Price`='$pro_price',`Product_Dis_Price`='$pro_dis',`Category_ID` = '$pro_cat' WHERE `Product_ID` = '$pid'");


  $update_stock_query = mysqli_query($con, "UPDATE `inventory` SET `Stock_Items`='$stock' WHERE `Product_ID`= '$pid'");
  if ($update_query_prod) {
    # code...
    if ($update_stock_query) {
      # code...
?>

      <script>
        alert('Data Updated');
      </script>

    <?php
    header('location:product-list.php');
    }
  }
}

if (isset($_POST['image_submit'])) {
  // code...
  $pro_image = addslashes($_FILES['prod_image']['name']);
  $pro_image_tmp = addslashes($_FILES['prod_image']['tmp_name']);

  $pro_image_tmp = file_get_contents($pro_image_tmp);
  $pro_image_tmp = base64_encode($pro_image_tmp);

  $query_update_image = mysqli_query($con,"UPDATE `products` SET `Product_Image`='$pro_image',`Product_Image_Temp`='$pro_image_tmp' WHERE `Product_ID` = '$prodid'");

  if ($query_update_image) {
    // code...
    ?>
      <script type="text/javascript">
        alert('Image Updated');
      </script>
    <?php
  }

}

if (isset($_POST['del_submit'])) {
  # code...
  $del_prod = mysqli_query($con, "DELETE FROM `products` WHERE `Product_ID`= '$prodid' ");

  if ($del_prod) {
    # code...\
    ?>

    <script>
      alert('Data Deleted');
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
  <title>Good Heart | Admin Panel</title>
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
              <a href="product-list.php" class="nav-link active">
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
              <a href="orders-list.php" class="nav-link">
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
              <h1>User List</h1>
            </div>
            <div class="col-sm-6">
              <ol class="breadcrumb float-sm-right">
                <li class="breadcrumb-item"><a href="#">Home</a></li>
                <li class="breadcrumb-item active">User List</li>
              </ol>
            </div>
          </div>
        </div><!-- /.container-fluid -->
      </section>
  <section class="content">
      <!-- Main content -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title"></h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form method="POST">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Image</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Stock Left</th>
                      <th>Load Data</th>
                    </tr>
                  </thead>
                  <tbody>

                    <?php
                    $sql = "SELECT products.Product_ID,products.Product_Name,products.Product_Description,products.Product_Price,products.Product_Dis_Price,products.Product_Image_Temp,products.Product_Image,categories.Category_Name,inventory.Stock_Items FROM products INNER JOIN categories ON products.Category_ID = categories.Category_ID INNER JOIN inventory ON products.Product_ID = inventory.Product_ID";
                    $res_data = mysqli_query($con, $sql);



                    while ($row = mysqli_fetch_assoc($res_data)) {
                      // code...

                    ?>

                      <tr>
                        <td><?php echo $row['Product_ID']; ?></td>
                        <td><?php echo "<img src=\"data:image;base64," . $row['Product_Image_Temp'] . "\" alt=" . $row['Product_Image'] . " width=\"50px\" height=\"50px\">"; ?></td>
                        <td><?php echo $row['Product_Name']; ?></td>
                        <td><?php echo $row['Product_Description']; ?></td>
                        <td><?php echo $row['Product_Price']; ?></td>
                        <td><?php echo $row['Product_Dis_Price']; ?></td>
                        <td><?php echo $row['Stock_Items']; ?></td>

                        <td><a href="?prodid=<?php echo $row['Product_ID']; ?>" class="btn btn-info btn-sm" onclick="openModal()">
                            <i class=" fas fa-pencil-alt">
                            </i>
                            Load
                          </a></td>


                        <input type="hidden" name="product_id" value="<?php echo $row['Product_ID']; ?>">
                      </tr>

                    <?php

                    }
                    ?>



                  </tbody>
                  <tfoot>
                    <tr>
                      <th>Product ID</th>
                      <th>Product Image</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>Price</th>
                      <th>Discount</th>
                      <th>Stock Left</th>
                      <th>Load Data</th>
                    </tr>
                  </tfoot>
                </table>
              </form>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
      <?php
        if (isset($_GET['prodid'])) {
          // code...
          ?>
            <!--form-->

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

                      <input type="hidden" name="prod_id" class="form-control" id="prod_id" onkeypress="return (event.charCode > 64 &&
                      event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32" value="<?php if (isset($prod_row['Product_ID'])) {
                                                                                                                              echo $prod_row['Product_ID'];
                                                                                                                            }  ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Name</label>
                      <input type="text" name="prod_name" class="form-control" id="prod_name" required value="<?php if (isset($prod_row['Product_Name'])) {
                                                                                                                              echo $prod_row['Product_Name'];
                                                                                                                            }  ?>">
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Description</label>
                      <textarea name="prod_des" class="form-control" id="prod_des" required rows="8" cols="20"><?php if (isset($prod_row['Product_Description'])) {
                                                                                                                        echo $prod_row['Product_Description'];
                                                                                                                      }  ?></textarea>
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Price</label>
                      <input type="text" name="prod_price" class="form-control" id="prod_price" required onkeypress="return isNumber(event);" value="<?php if (isset($prod_row['Product_Price'])) {
                                                                                                                                                        echo $prod_row['Product_Price'];
                                                                                                                                                      }  ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Discount</label>
                      <input type="text" name="prod_dis" class="form-control" id="prod_dis" required onkeypress="return isNumber(event);" value=" <?php if (isset($prod_row['Product_Dis_Price'])) {
                                                                                                                                                    echo $prod_row['Product_Dis_Price'];
                                                                                                                                                  }  ?>">
                    </div>
                    <div class="form-group">
                      <label for="exampleInputEmail1">Category</label>
                      <select class="form-control" name="prod_cat" id="prod_cat" required>
                        <option value="<?php if (isset($prod_row['Category_ID'])) {
                                          echo $prod_row['Category_ID'];
                                        }  ?>"> <?php if (isset($prod_row['Category_Name'])) {
                                                  echo $prod_row['Category_Name'];
                                                }  ?></option>
                        <option value="">---Change Category---</option>
                        <?php
                        $query_cat = mysqli_query($con, "SELECT * FROM `categories`");
                        while ($row3 = mysqli_fetch_array($query_cat)) {
                          // code...
                          echo "<option value='" . $row3['Category_ID'] . "'>" . $row3['Category_Name'] . "</option>";
                        }
                        ?>

                      </select>
                    </div>

                    <div class="form-group">
                      <label for="exampleInputEmail1">Product Stock</label>
                    <input type="text" name="prod_stock" class="form-control" id="prod_stock" value="<?php if (isset($prod_row['Stock_Items'])) {
                                                                                                        echo $prod_row['Stock_Items'];
                                                                                                      }  ?>" required onkeypress="return isNumber(event);">
                  </div>
              </div>
              <!-- /.card-body -->
              <div class="card-footer">
                <button type="submit" name="up_submit" class="btn btn-primary">
                  <i class=" fas fa-pencil-alt">
                  </i>
                  Submit</button>
                <button type="submit" name="del_submit" class="btn btn-danger">
                  <i class="fas fa-trash">
                  </i>
                  Delete
                </button>
            </form>

          <form method="post" id="image_val" enctype="multipart/form-data">
            <div class="form-group" style="margin-top:15px;">
              <label for="exampleInputFile">Product Image</label>
              <div class="input-group">
                <div class="custom-file">
                  <input type="file" name="prod_image" id="prod_image" required accept="image/*">
                </div>
              </div>
            </div>
                <button type="submit" name="image_submit" id="image_submit" class="btn btn-primary" style="margin-top:10px;">
                  <i class=" fas fa-pencil-alt">
                  </i>
                  Update Image</button>

          </form>
              </div>

            </div>

            <!-- /.card -->
        </div>
        <!--form end-->


          <?php
        } else {
          // code...
          ?>
              <h1>Kindly Load The Data</h1>
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
  <!-- page script -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
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

      $('#image_val').validate();

    });
  </script>
</body>

</html>
