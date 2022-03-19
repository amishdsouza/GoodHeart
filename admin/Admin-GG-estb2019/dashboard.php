 <?php
  require_once '../../configs/db.php';
  session_start();
  if ((isset($_SESSION['adminlogin']))) {
    # code...
    $aname = $_SESSION['AName'];
  } else {
    # code...
    header('location:index.php?sourcead=dashboard.php');
  }


  $count_orders_query = mysqli_query($db, "SELECT COUNT(*) AS `count` FROM `donation`");
  $row_orders = mysqli_fetch_assoc($count_orders_query);
  $count_orders = $row_orders['count'];

  $net_profit_query = mysqli_query($db, "SELECT SUM(Donation_Amount) as `profit` FROM `donation` WHERE `Pay_Status` = 'Paid'");

  $row_net = mysqli_fetch_assoc($net_profit_query);

  $net_profit = $row_net['profit'];

  $user_no_query = mysqli_query($db, "SELECT COUNT(*) as `sum_use` FROM `customer_registration`");

  $row_user = mysqli_fetch_assoc($user_no_query);

  $user_no = $row_user['sum_use'];

  $paidDonation_query = mysqli_query($db, "SELECT COUNT(*) AS `delcount` FROM `donation` WHERE `Pay_Status` = 'Paid'");
  $paidDonation_orders = mysqli_fetch_assoc($paidDonation_query);
  $paidDonation = $paidDonation_orders['delcount'];


  if (isset($_POST['MYsubmit'])) {
    // code...
    $year = $_POST['SelYear'];
    $month = $_POST['SelMonth'];

    $don_query = mysqli_query($db, "SELECT SUM(Donation_Amount) as total,COUNT(Donation_ID) as noOfDon, DATE_FORMAT(Donation_Date,'%M') as monthDon FROM total_orders WHERE YEAR(Donation_Date) = $year AND MONTH(Date_OF_Purchase) = $month AND `Pay_Status` = 'Paid'");

    $don_row = mysqli_fetch_assoc($don_query);

    $count_don = $sel_row['noOfDon'];
    $sum_don = $sel_row['total'];
    $month_name = $sel_row['monthDon'];
  }
  ?>

 <!DOCTYPE html>
 <html>

 <head>
   <meta charset="utf-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <title>Good Heart | Dashboard</title>
   <!-- Tell the browser to be responsive to screen width -->
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <!-- Font Awesome -->
   <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
   <!-- Ionicons -->
   <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
   <!-- Tempusdominus Bbootstrap 4 -->
   <link rel="stylesheet" href="plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
   <!-- iCheck -->
   <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
   <!-- JQVMap -->
   <link rel="stylesheet" href="plugins/jqvmap/jqvmap.min.css">
   <!-- Theme style -->
   <link rel="stylesheet" href="dist/css/adminlte.min.css">
   <!-- overlayScrollbars -->
   <link rel="stylesheet" href="plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
   <!-- Daterange picker -->
   <link rel="stylesheet" href="plugins/daterangepicker/daterangepicker.css">
   <!-- summernote -->
   <link rel="stylesheet" href="plugins/summernote/summernote-bs4.css">
   <!-- Google Font: Source Sans Pro -->
   <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

 </head>

 <body class="hold-transition sidebar-mini layout-fixed">
   <div class="wrapper">

     <!-- Navbar -->
     <nav class="main-header navbar navbar-expand navbar-white navbar-light">
       <!-- Left navbar links -->
       <ul class="navbar-nav">
         <li class="nav-item">
           <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
         </li>
         <li class="navbar-nav">
           <a class="nav-link" href="logout.php">Log Out</a>
         </li>

     </nav>
     <!-- /.navbar -->

     <!-- Main Sidebar Container -->
     <aside class="main-sidebar sidebar-dark-primary elevation-4">
       <!-- Brand Logo -->
       <a href="index.php" class="brand-link">
         <img src="..\..\img\banner\good_heart_new_trans_white.png" alt="good heart Logo" class="brand-image img-circle elevation-3" style="opacity: 1">
         <span class="brand-text font-weight-light">Good Heart</span>
       </a>

       <!-- Sidebar -->
       <div class="sidebar">
         <!-- Sidebar user panel (optional) -->
         <div class="user-panel mt-3 pb-3 mb-3 d-flex">
           <div class="image">
             <img src="dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
           </div>
           <div class="info">
             <a href="index.php" class="d-block"><?php echo $aname ?></a>
           </div>
         </div>

         <!-- Sidebar Menu -->
         <nav class="mt-2">
           <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
             <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
             <li class="nav-item has-treeview ">
               <a href="dashboard.php" class="nav-link active">
                 <i class="nav-icon fas fa-tachometer-alt"></i>
                 <p>
                   Dashboard
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/tables/user-list.php" class="nav-link">
                 <i class="nav-icon fas fa-edit"></i>
                 <p>
                   User List
                 </p>
               </a>
             </li>
             <!-- <li class="nav-item">
               <a href="pages/forms/add-products.php" class="nav-link">
                 <i class="nav-icon fas fa-edit"></i>
                 <p>
                   Add Products
                 </p>
               </a>
             </li> -->
             <li class="nav-item">
               <a href="pages/forms/add-category.php" class="nav-link">
                 <i class="nav-icon fas fa-edit"></i>
                 <p>
                   Add Category
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/tables/product-list.php" class="nav-link">
                 <i class="nav-icon fas fa-edit"></i>
                 <p>
                   Product List
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/tables/category-list.php" class="nav-link">
                 <i class="nav-icon fas fa-edit"></i>
                 <p>
                   Category List
                 </p>
               </a>
             </li>
             <li class="nav-item">
               <a href="pages/tables/orders-list.php" class="nav-link">
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
       <div class="content-header">
         <div class="container-fluid">
           <div class="row mb-2">
             <div class="col-sm-6">
               <h1 class="m-0 text-dark">Dashboard</h1>
             </div><!-- /.col -->
             <div class="col-sm-6">
               <ol class="breadcrumb float-sm-right">
                 <li class="breadcrumb-item"><a href="#">Home</a></li>
                 <li class="breadcrumb-item active">Dashboard</li>
               </ol>
             </div><!-- /.col -->
           </div><!-- /.row -->
         </div><!-- /.container-fluid -->
       </div>
       <!-- /.content-header -->

       <!-- Main content -->
       <section class="content">
         <div class="container-fluid">
           <!-- Small boxes (Stat box) -->
           <div class="row">
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-info">
                 <div class="inner">
                   <h3><?php echo $count_orders; ?></h3>

                   <p>All Orders</p>
                 </div>
                 <div class="icon">
                   <i class="ion ion-bag"></i>
                 </div>
                 <a href="pages/tables/orders-list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-success">
                 <div class="inner">
                   <h3>₹<?php echo $net_profit; ?></h3>

                   <p>Total Donation</p>
                 </div>
                 <div class="icon">
                   <i class="ion ion-stats-bars"></i>
                 </div>
                 <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-warning">
                 <div class="inner">
                   <h3><?php echo $user_no; ?></h3>

                   <p>User Registrations</p>
                 </div>
                 <div class="icon">
                   <i class="ion ion-person-add"></i>
                 </div>
                 <a href="pages/tables/user-list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->
             <div class="col-lg-3 col-6">
               <!-- small box -->
               <div class="small-box bg-danger">
                 <div class="inner">
                   <h3><?php echo $paidDonation ?></h3>

                   <p>Delivered Orders</p>
                 </div>
                 <div class="icon">
                   <i class="ion ion-pie-graph"></i>
                 </div>
                 <a href="pages/tables/orders-list.php" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
               </div>
             </div>
             <!-- ./col -->
           </div>

           <form method="post" id="formDur">
             <h4>Month</h4>
             <select class="form-control" name="SelMonth" required id="SelMonth">
               <option value="">Select Month</option>
               <option value="1">January</option>
               <option value="2">February</option>
               <option value="3">March</option>
               <option value="4">April</option>
               <option value="5">May</option>
               <option value="6">June</option>
               <option value="7">July</option>
               <option value="8">August</option>
               <option value="9">September</option>
               <option value="10">October</option>
               <option value="11">November</option>
               <option value="12">December</option>
             </select>

             <select class="form-control" name="SelYear" style="margin-top:15px;" required id="SelYear">
               <option value="2022">2022</option>
               <option value="2023">2023</option>
               <option value="2024">2022</option>
               <option value="2025">2023</option>
               <option value="2026">2022</option>
               <option value="2027">2023</option>
             </select>

             <button type="submit" name="MYsubmit" style="margin-top:15px;" class="btn btn-primary" id="MYsubmit">Submit</button>
           </form>
           <!-- /.row -->
           <!-- Main row -->
           <h2>
             <?php
              if (isset($month_name)) {
                # code...
                echo $month_name;
              } ?></h2>
           <div class="row" style="margin-top:15px;">
             <!-- Left col -->
             <section class="col-lg-12">
               <!-- Custom tabs (Charts with tabs)-->
               <div class="card">
                 <div class="card-header">
                   <h3 class="card-title">
                     <i class="fas fa-chart-pie mr-1"></i>
                     Sales
                   </h3>
                   <div class="card-tools">
                     <ul class="nav nav-pills ml-auto">
                       <li class="nav-item">
                         <a class="nav-link active" href="#revenue-chart" data-toggle="tab">Area</a>
                       </li>
                       <li class="nav-item">
                         <a class="nav-link" href="#sales-chart" data-toggle="tab">Bar</a>
                       </li>
                     </ul>
                   </div>
                 </div><!-- /.card-header -->
                 <div class="card-body">
                   <div class="tab-content p-0">
                     <!-- Morris chart - Sales -->
                     <div class="chart tab-pane active" id="revenue-chart" style="position: relative; height: 500px;">

                       <canvas id="revenue-chart-canvas" height="300" style="height: 300px;"></canvas>

                     </div>
                     <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 500px;">

                       <canvas id="sales-chart-bar" height="300" style="height: 300px;"></canvas>

                     </div>

                   </div>
                 </div><!-- /.card-body -->
               </div> <!-- /.card -->

               <div class="card">
                 <div class="card-header border-transparent">
                   <h3 class="card-title">Latest Donations</h3>

                   <div class="card-tools">
                     <button type="button" class="btn btn-tool" data-card-widget="collapse">
                       <i class="fas fa-minus"></i>
                     </button>
                     <button type="button" class="btn btn-tool" data-card-widget="remove">
                       <i class="fas fa-times"></i>
                     </button>
                   </div>
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body p-0">
                   <div class="table-responsive">
                     <table class="table m-0">
                       <thead>
                         <tr>
                           <th>Donation ID</th>
                           <th>Donors Name</th>
                           <th>Donation Amount</th>
                           <th>Donation Date</th>
                           <th>Pay Status</th>
                         </tr>
                       </thead>
                       <tbody>
                         <?php
                          $query_or = mysqli_query($db, "SELECT * FROM `donation` ORDER BY Donation_ID DESC LIMIT 5");
                          while ($row_or = mysqli_fetch_assoc($query_or)) {
                          ?>
                           <tr>
                             <td><?php echo $row_or['Donation_ID']; ?></td>
                             <td><?php echo $row_or['Donors_Name']; ?></td>
                             <td><?php echo $row_or['Donation_Amount']; ?></td>
                             <td><?php echo $row_or['Donation_Date']; ?></td>
                             <td><span class="badge badge-success"><?php echo $row_or['Order_Status']; ?></span></td>
                           </tr>
                         <?php
                          }
                          ?>
                       </tbody>
                     </table>
                   </div>
                   <!-- /.table-responsive -->
                 </div>
                 <!-- /.card-body -->
                 <div class="card-footer clearfix">
                   <a href="pages/tables/orders-list.php" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                 </div>
                 <!-- /.card-footer -->
               </div>

               <!-- /.card -->
             </section>
             <!-- /.Left col -->
             <!-- right col (We are only adding the ID to make the widgets sortable)-->
             <section class="col-lg-12">
               <!-- Calendar -->
               <div class="card bg-gradient-success">
                 <div class="card-header border-0">

                   <h3 class="card-title">
                     <i class="far fa-calendar-alt"></i>
                     Calendar
                   </h3>
                   <!-- tools card -->
                   <!-- /. tools -->
                 </div>
                 <!-- /.card-header -->
                 <div class="card-body pt-0">
                   <!--The calendar -->
                   <div id="calendar" style="width: 100%"></div>
                 </div>
                 <!-- /.card-body -->
               </div>
               <!-- /.card -->
             </section>
             <!-- right col -->
           </div>
           <!-- /.row (main row) -->
         </div><!-- /.container-fluid -->
       </section>
       <!-- /.content -->
     </div>
     <!-- /.content-wrapper -->
     <footer class="main-footer">
       <strong>Copyright &copy; 2014-2019 <a href="http://adminlte.io">AdminLTE.io</a>.</strong>
       All rights reserved.
       <div class="float-right d-none d-sm-inline-block">
         <b>Version</b> 3.0.3-pre
       </div>
     </footer>

     <!-- Control Sidebar -->
     <aside class="control-sidebar control-sidebar-dark">
       <!-- Control sidebar content goes here -->
     </aside>
     <!-- /.control-sidebar -->
   </div>
   <!-- ./wrapper -->

   <!-- jQuery -->
   <script src="plugins/jquery/jquery.min.js"></script>
   <!-- jQuery UI 1.11.4 -->
   <script src="plugins/jquery-ui/jquery-ui.min.js"></script>
   <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
   <script>
     $.widget.bridge('uibutton', $.ui.button)
   </script>
   <!-- Bootstrap 4 -->
   <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
   <!-- ChartJS -->
   <script src="plugins/chart.js/Chart.min.js"></script>
   <!-- Sparkline -->
   <script src="plugins/sparklines/sparkline.js"></script>
   <!-- JQVMap -->
   <script src="plugins/jqvmap/jquery.vmap.min.js"></script>
   <script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>
   <!-- jQuery Knob Chart -->
   <script src="plugins/jquery-knob/jquery.knob.min.js"></script>
   <!-- daterangepicker -->
   <script src="plugins/moment/moment.min.js"></script>
   <script src="plugins/daterangepicker/daterangepicker.js"></script>
   <!-- Tempusdominus Bootstrap 4 -->
   <script src="plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
   <!-- Summernote -->
   <script src="plugins/summernote/summernote-bs4.min.js"></script>
   <!-- overlayScrollbars -->
   <script src="plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
   <!-- AdminLTE App -->
   <script src="dist/js/adminlte.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.js">
   </script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.js"></script>
   <!-- AdminLTE dashboard demo (This is only for demo purposes) -->

   <script src="dist/js/pages/dashboard.js"></script>
   <script src="dist/js/pages/dashboard3.js"></script>
   <script type="text/javascript">
     var DoninRs = "<?= $sum_don ?>"
     var DoninNo = "<?= $count_don ?>"
   </script>

   <!-- AdminLTE for demo purposes -->
   <script src="dist/js/demo.js"></script>
   <script>
     $('#formDur').validate();
   </script>
 </body>

 </html>