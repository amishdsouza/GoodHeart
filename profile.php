<?php
require_once 'configs/db.php';
include("header.php");
function loginStart($db)
{
    $no_of_items = 0;
    $uid = $_SESSION['ID'];
    $query2 = "SELECT COUNT(*) AS `count` FROM `shopping_cart_details` WHERE `Customer_ID` = '$uid'";
    $sql2 = $db->query($query2) or die($db->error);
    $row2 = $sql2->fetch_assoc();

    $no_of_items = $row2['count'];

    return $no_of_items;
}

//session_start();
if (isset($_SESSION['login_Sess'])) {
    # code...
    loginStart($db);
} else {
    # code... = 0;
    $no_of_items = 0;
}
$uid = $_SESSION['ID'];
$customer_query = "SELECT * FROM `customer_registration` WHERE `Customer_ID` = '$uid'";
$customer_sql = $db->query($customer_query) or die($db->error);
$customer_row = $customer_sql->fetch_assoc();

?>
<!doctype html>
<html class="no-js" lang="">


<body>
    <!-- preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>
    <!-- about start -->
    <section class="about-body mb-90">
        <div class="has-breadcrumb-bg mb-120" data-background="img/banner/about-us.jpg">
            <div class="breadcrumb-content d-flex justify-content-center align-items-center" style="flex-direction: column;">
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="generic-title">
                    <strong class="red-color">Profile</strong>
                    <h2 class="mb-50">See your Information.</h2>
                    <div class="container">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Street Address</th>
                                    <th>House number</th>
                                    <th>Place</th>
                                    <th>State</th>
                                    <th>PinCode</th>
                                    <th>DOB </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><?php echo $customer_row['Customer_Name'] ?></td>
                                    <td><?php echo $customer_row['Customer_Email'] ?></td>
                                    <td><?php echo $customer_row['Customer_Street_Address'] ?></td>
                                    <td><?php echo $customer_row['Customer_HouseNo'] ?></td>
                                    <td><?php echo $customer_row['Customer_Place'] ?></td>
                                    <td><?php echo $customer_row['Customer_PinCode'] ?></td>
                                    <td><?php echo $customer_row['Date_Of_Birth'] ?></td>
                                    <td><?php echo $customer_row['Mobile_Number'] ?></td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
        <div class="contact-btn text-center">
            <!-- <button class="btn theme-btn" id="fsubmit" name="fsubmit" type="button">Update profile</button> -->
        </div>







        <?php
        include("footer.php");
        ?>

        <!-- product popup start -->

        <!-- product popup end -->

        <!-- startup popup start -->

        <!-- startup popup end -->



        <!-- JS here -->
        <script src="js/vendor/jquery-1.12.4.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/isotope.pkgd.min.js"></script>
        <script src="js/one-page-nav-min.js"></script>
        <script src="js/slick.min.js"></script>
        <script src="js/jquery.meanmenu.min.js"></script>
        <script src="js/ajax-form.js"></script>
        <script src="js/fontawesome.min.js"></script>
        <script src="js/mixitup.min.js"></script>
        <script src="js/wow.min.js"></script>
        <script src="js/jquery-ui.js"></script>
        <script src="js/jquery.scrollUp.min.js"></script>
        <script src="js/imagesloaded.pkgd.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/plugins.js"></script>
        <script src="js/main.js"></script>
</body>

</html>