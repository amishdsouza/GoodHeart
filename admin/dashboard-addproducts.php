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

$query_cat = mysqli_query($con,"SELECT * FROM `categories`");

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


  $query = mysqli_query($con,"INSERT INTO products(Product_Name, Product_Description, Product_Price, Product_Dis_Price, Product_Image, Product_Image_Temp, Category_ID) VALUES ('$pro_name','$pro_des','$pro_price','$pro_dis','$pro_image','$pro_image_tmp','$pro_cat')");




 if ($query) {
   // code...
   $query2 = mysqli_query($con,"SELECT * FROM `products` ORDER BY Product_ID DESC LIMIT 1");

   $pro_row = mysqli_fetch_assoc($query2);

   $product_id = $pro_row['Product_ID'];

   $query3 = mysqli_query($con,"INSERT INTO `inventory`(`Product_ID`, `Product_Name`, `Stock_Items`) VALUES ('$product_id','$pro_name','$stock')");


  ?>
      <script type="text/javascript">
        alert('Records Entered');
       </script>

      <?php
  }
  else {
  //   // code...
    echo("Error description: " . mysqli_error($con));
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
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js"></script>
    	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
    </head>
    <body>
      <div class="area" style="margin-left:60px;">
        <h1 style="text-align: center;">Add Products</h2>

          <form class="" method="post" enctype="multipart/form-data" id="addpro">
            <table class="table table-hover table-dark">
              <tbody>
                  <tr>
                    <th><span class="tb-text">Product Name</span></th>
                    <td><input type="text" name="prod_name" id="prod_name" class="inputemail" style="width:50%;" required></td>
                  </tr>
                  <tr>
                    <th><span class="tb-text">Product Description</span></th>
                    <td><textarea class="inputemail" name="prod_des" id="prod_des" rows="15" cols="10" style="width:50%;" required></textarea></td>
                  </tr>
                  <tr>
                    <th><span class="tb-text">Product Price</span></th>
                    <td><input type="text" name="prod_price" id="prod_price" class="inputemail" style="width:50%;" required></td>
                  </tr>
                  <tr>
                    <th><span class="tb-text">Product Discount</span></th>
                    <td><input type="text" name="prod_dis" id="prod_dis" class="inputemail" style="width:50%;" required></td>
                  </tr>
                  <tr>
                    <th><span class="tb-text">Product Image</span></th>
                    <td><input type="file" name="prod_image" id="prod_image" required accept="image/*"></td>
                  </tr>
                  <?php
                    echo "<tr>";
                    echo "<th><span class=\"tb-text\">Category Name</span></th>";
                    echo "<td><select class=\"inputemail\" name=\"prod_cat\" id=\"prod_cat\" style=\"width:50%;\" required>";
                    echo "<option value=''>Select Category</option>";
                        while ($row = mysqli_fetch_array($query_cat)) {
                          // code...
                          echo "<option value='".$row['Category_ID']."'>".$row['Category_Name']."</option>";
                        }
                    echo "</select>";
                    echo "</td>";
                    echo "</tr>";

                   ?>
                   <tr>
                     <th><span class="tb-text">Product Stock</span></th>
                     <td><input type="text" name="prod_stock" id="prod_stock" class="inputemail" style="width:50%;" required></td>
                   </tr>
                  <tr>
                    <td></td>
                    <td><button type="submit" name="submit" class="login100-form-btn"  style="width:40%;"><b>SUBMIT</b></button></td>
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
                      <a href="dashboard-addproducts.php" style="pointer-events:none;">
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
      $("#addpro").validate();
    </script>

      </html>
