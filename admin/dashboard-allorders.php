<?php
session_start();
include_once '../php/config.php';


if (isset($_GET['pageno'])) {
    $pageno = $_GET['pageno'];
} else {
    $pageno = 1;
}

$no_of_records_per_page = 3;
$offset = ($pageno-1) * $no_of_records_per_page;


$total_pages_sql = "SELECT COUNT(*) FROM `total_orders`";
$result = mysqli_query($con,$total_pages_sql);
$total_rows = mysqli_fetch_array($result)[0];
$total_pages = ceil($total_rows / $no_of_records_per_page);

$sql = "SELECT * FROM `total_orders`";
$res_data = mysqli_query($con,$sql);

$or_st = mysqli_query($con,"SELECT `Order_Status` from `total_orders`");

 ?>

  <html>
  <title>Admin Panel</title>
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="../css/dashboard.css">
  <link rel="stylesheet" href="../css/login.css">
  <link href="https://fonts.googleapis.com/css?family=Poppins:400,700&display=swap" rel="stylesheet">
    <head>
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
      <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css"/>
      <script src="https://cdn.datatables.net/1.10.20/js/jquery.dataTables.min.js"></script>
    </head>
    <body>
      <div class="area">
        <h1 style="text-align: center;">All Orders</h2>
<table id="myTable" class="display" >
          <?php
            if(mysqli_num_rows($res_data)==0)
            {
              echo "<div class=\"row-user\">";
              echo "<div class=\"user-id\">";
              echo "<h3>No Records Found</h3>";
              echo "</div>";
              echo "</div>";
            }

            else {
              echo "<thead>";
              echo "<tr>";
              echo "<th><span class=\"tb-text\">Order ID</span></th>";
              echo "<th><span class=\"tb-text\">User ID</span></th>";
              echo "<th><span class=\"tb-text\">Product ID</span></th>";
              echo "<th><span class=\"tb-text\">Product Name</span></th>";
              echo "<th><span class=\"tb-text\">Quantity</span></th>";
              echo "<th><span class=\"tb-text\">Total Price</span></th>";
              echo "<th><span class=\"tb-text\">Order Status</span></th>";
              echo "<th><span class=\"tb-text\">Payment Type</span></th>";
              echo "<th><span class=\"tb-text\">Payment Status</span></th>";
              echo "<th><span class=\"tb-text\">Date of Purchase</span></th>";
              echo "</tr>";
              echo "</thead>";

              echo "<tbody>";
              while ($data = mysqli_fetch_array($res_data)) {
                // code...

                echo "<tr>";
                echo "<th><span class=\"tb-text\">".$data['Order_No']."</span></th>";
                echo "<th><span class=\"tb-text\">".$data['User_ID']."</span></th>";
                echo "<th><span class=\"tb-text\">".$data['Product_ID']."</span></th>";
                echo "<th><span class=\"tb-text\">".$data['Product_Name']."</span></th>";
                echo "<th><span class=\"tb-text\">".$data['Quantity']."</span></th>";
                echo "<th><span class=\"tb-text\">".$data['Total_Price']."</span></th>";
                echo "<th>";
                echo "<select name=\"ord_sta\" class=\"inputemail\">";
                echo "<option value=''>".$data['Order_Status']."</option></span>";
                echo "</select>";
                echo "</th>";
                echo "<th><span class=\"tb-text\">".$data['Payment_Type']."</span></th>";
                echo "<th><span class=\"tb-text\">".$data['Payment_Status']."</span></th>";
                echo "<th><span class=\"tb-text\">".$data['Date_OF_Purchase']."</span></th>";

                echo "</tr>";
              }
                echo "</tbody>";
            }

           ?>
           </table>
           <!-- <ul class="pagination">
             <li><a href="?pageno=1">First</a></li>
                <li class="<?php if($pageno <= 1){ echo 'disabled'; } ?>">
                <a href="<?php if($pageno <= 1){ echo '#'; } else { echo "?pageno=".($pageno - 1); } ?>">Prev</a>
              </li>
          <li class="<?php if($pageno >= $total_pages){ echo 'disabled'; } ?>">
              <a href="<?php if($pageno >= $total_pages){ echo '#'; } else { echo "?pageno=".($pageno + 1); } ?>">Next</a>
          </li>
            <li><a href="?pageno=<?php echo $total_pages; ?>">Last</a></li>
        </ul> -->
        
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
                      <a href="#" style="pointer-events:none;">
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
    <script >
          $(document).ready( function () {
              $('#myTable').DataTable();
            } );
    </script>
      </html>
