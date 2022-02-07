<?php
require_once 'configs/db.php';

include 'header.php';

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

if (isset($_SESSION['login_Sess'])) {
    # code...
    loginStart($db);
    $id = $_SESSION['ID'];
    $cart_details = "SELECT shopping_cart_details.Cart_Details_ID,products.Product_ID, products.Product_Name, products.Product_Description,products.Product_Image_Location,shopping_cart_details.Item_Date_Added FROM products LEFT JOIN shopping_cart_details ON products.Product_ID = shopping_cart_details.Product_ID WHERE shopping_cart_details.Customer_ID = $id ";

    $result = $db->query($cart_details);


} else {
    # code... = 0;
    $no_of_items = 0;
    header('location:login.php?source=cart.php');
}







?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Good Heart | Cart</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="manifest" href="site.webmanifest">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
    <!-- Place favicon.ico in the root directory -->

    <!-- CSS here -->
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/owl.carousel.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">
    <link rel="stylesheet" href="css/jquery-ui.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/magnific-popup.css">
    <link rel="stylesheet" href="css/fontawesome-all.min.css">
    <link rel="stylesheet" href="css/meanmenu.css">
    <link rel="stylesheet" href="css/slick.css">
    <link rel="stylesheet" href="css/default.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/responsive.css">
</head>

<body>
    <!--[if lte IE 9]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="https://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</p>
        <![endif]-->

    <!-- preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>



    <!-- header section start -->

    <!-- header section end -->



    <!-- shop body section start -->
    <section class="cart-body mb-90 gray-border-top pt-35">
        <div class="has-breadcrumb-content">
            <div class="container container-1430">
                <div class="breadcrumb-content" style="flex-direction: column;">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb p-0 m-0">
                            <li class="breadcrumb-item"><a href="index2.html">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Cart</li>
                        </ol>
                    </nav>
                    <h2 class="cart-title mt-40">Cart</h2>
                </div>

                <div class="cart-body-content">
                    <div class="row">
                        <div class="col-xl-8">

                            <div class="product-content">
                                <form action="#">
                                    <div class="table-responsive">
                                        <table class="table table-2">
                                            <thead>
                                                <tr>
                                                    <th class="remove-porduct"></th>
                                                    <th class="product-image"></th>
                                                    <th class="product-title">Product</th>
                                                    <th class="total">Description</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <?php
                                                if (isset($_SESSION['login_Sess'])) {
                                                    if ($noCart = $result->num_rows == 0) {
                                                        # code...
                                                ?>

                                                        <p class="title">Cart is Empty</p>

                                                        <?php
                                                    } else {
                                                        while ($row = $result->fetch_assoc()) { {
                                                                # code...
                                                        ?>
                                                                <tr>
                                                                    <td>
                                                                        <div class="table-data">
                                                                            <a href='remove-cart.php?cid=<?php echo $row['Cart_Details_ID'] ?>' class="close-btn"><i class="fal fa-times"></i></button>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table-data">
                                                                            <img src="<?php echo $row['Product_Image_Location'] ?>" width="80" alt="">
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table-data">
                                                                            <h6><a href="single-product-3.html" class="title"><?php echo $row['Product_Name'] ?></a></h6>
                                                                        </div>
                                                                    </td>
                                                                    <td>
                                                                        <div class="table-data">
                                                                            <p><?php echo $row['Product_Description'] ?></p>
                                                                        </div>
                                                                    </td>
                                                                </tr>

                                                <?php
                                                            }
                                                        }
                                                    }
                                                }

                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- shop body section end -->





    <!-- footer section start -->
  <?php include 'footer.php'; ?>
    <!-- footer section end -->







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
    <script src="js/wow.min.js"></script>
    <script src="js/jquery-ui.js"></script>
    <script src="js/jquery.scrollUp.min.js"></script>
    <script src="js/imagesloaded.pkgd.min.js"></script>
    <script src="js/jquery.magnific-popup.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/main.js"></script>
</body>

</html>