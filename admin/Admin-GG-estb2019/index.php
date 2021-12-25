<?php
require_once '../../configs/db.php';
session_start();

if (isset($_GET['sourcead'])) {
  // code...
  $sourcead = $_GET['sourcead'];
}

if (isset($_POST['submit'])) {
  // code...
  $uemail = $_POST['email'];
  $password = $_POST['password'];

  $encryptPass = md5($password);

  $selectLogin = "SELECT `A_ID`,`Admin_Name` FROM `admin` WHERE Admin_Username = ? AND Admin_Password = ?";

  $pstmtLogin = $db->prepare($selectLogin);
  $pstmtLogin->bind_param("ss", $uemail, $encryptPass);
  $pstmtLogin->execute();
  $pstmtLogin->store_result();
  $row = $pstmtLogin->num_rows();
  $pstmtLogin->bind_result($aid, $aname);

  if ($row > 0) {
    // code...

    while ($pstmtLogin->fetch()) {
      $_SESSION['AID'] = $aid;
      $_SESSION['AName'] = $aname;
    }
    $_SESSION['adminlogin'] = "1";

    # code...
    header("location:dashboard.php");
    # code...


  } else {
    $_SESSION['adminlogin'] = "";
?>
    <script type="text/javascript">
      alert('Wrong Email and Password');
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
  <title>Good Heart | Admin Panel </title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Font Awesome -->
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

  <style>
    .error {
      color: red;
    }
  </style>
</head>

<body class="hold-transition login-page">
  <div class="login-box">
    <div class="login-logo">
      <a href="#">
        <img src="..\..\img\banner\good_heart_new_trans.png" alt="good heart Logo" class="brand-image img-circle elevation-3" style="opacity: 1; width: 80px; height:50px;">
        <b>Good Heart</b> Admin
      </a>
    </div>
    <!-- /.login-logo -->
    <div class="card">
      <div class="card-body login-card-body">
        <p class="login-box-msg">Sign In</p>

        <form id="adlogin" method="post">
          <div class="input-group mb-3">
            <input type="text" class="form-control" placeholder="Username" name="email" id="email" required data-error="#err1">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-envelope"></span>
              </div>
            </div>
          </div>
          <div class="err"><span id="err1"></span></div>
          <div class="input-group mb-3">
            <input type="password" class="form-control" placeholder="Password" name="password" id="password" required data-error="#err2">
            <div class="input-group-append">
              <div class="input-group-text">
                <span class="fas fa-lock"></span>
              </div>
            </div>
          </div>
          <div class="err"><span id="err2"></span></div>

          <div class="row">

            <!-- /.col -->
            <div class="col-4">
              <button type="submit" name="submit" class="btn btn-primary btn-block">Sign In</button>
            </div>
            <!-- /.col -->
          </div>
        </form>




      </div>
      <!-- /.login-card-body -->
    </div>
  </div>
  <!-- /.login-box -->

  <!-- jQuery -->
  <script src="plugins/jquery/jquery.min.js"></script>
  <!-- Bootstrap 4 -->
  <script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
  <!-- AdminLTE App -->
  <script src="dist/js/adminlte.min.js"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/additional-methods.min.js" integrity="sha256-vb+6VObiUIaoRuSusdLRWtXs/ewuz62LgVXg2f1ZXGo=" crossorigin="anonymous"></script>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.1/jquery.validate.min.js" integrity="sha256-sPB0F50YUDK0otDnsfNHawYmA5M0pjjUf4TvRJkGFrI=" crossorigin="anonymous"></script>


  <script>
    $("#adlogin").validate({
      messages: {},
      errorPlacement: function(error, element) {
        var placement = $(element).data('error');
        if (placement) {
          $(placement).append(error)
        } else {
          error.insertAfter(element);
        }
      }
    });
  </script>

</body>

</html>