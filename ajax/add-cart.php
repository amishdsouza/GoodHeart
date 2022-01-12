<?php
session_start();
require_once '../configs/db.php';
if (isset($_SESSION['login_Sess'])) {
  if (isset($_GET['id'])) {
    $id = $_GET['id'];
  }
  $uid = $_SESSION['ID'];
  $insertCart = "INSERT INTO `shopping_cart_details`(`Product_ID`, `Customer_ID`) VALUES (?,?)";

  $pstmtCart = $db->prepare($insertCart);
  $pstmtCart->bind_param("ii", $id, $uid);
  if ($pstmtCart->execute()) {
    # code...
    header("location:../cart.php");
  } else {
    # code...
?>
    <script>
      alert("Not Added to the Car");
    </script>
  <?php
  }
} else {
  ?>
  <script>
    alert("You are not loggged in. Kindly Log In");
  </script>
<?php
  header("location:../login.php?source=shop.php");
}




?>