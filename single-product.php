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

if (isset($_SESSION['login_Sess'])) {
    # code...
    loginStart($db);
} else {
    # code... = 0;
    //header('location:login.php');
    $no_of_items = 0;
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $query = "SELECT * FROM `products` WHERE `Product_ID` = '$id'";
    $query2 = "SELECT customer_registration.Mobile_Number,customer_registration.Customer_Email FROM customer_registration INNER JOIN product_customer_relation ON customer_registration.Customer_ID = customer_registration.Customer_ID WHERE product_customer_relation.Product_ID = '$id'";

    $sql2 = $db->query($query2) or die($db->error);
    $row2 = $sql2->fetch_assoc();

    $sql = $db->query($query) or die($db->error);
    $row = $sql->fetch_assoc();
}
?>

<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Good Heart</title>
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



    <!-- single product start -->
    <section class="single-product mb-90">
        <div class="container-fluid">
            <nav aria-label="breadcrumb" class="mb-40">
                <ol class="breadcrumb p-0 m-0">
                    <li class="breadcrumb-item"><a href="index4.html">Home</a></li>
                    <li class="breadcrumb-item" aria-current="page">Product</li>
                    <li class="breadcrumb-item active" aria-current="page">single Product</li>
                </ol>
            </nav>
            <div class="shop-wrapper">
                <div class="single-product-top">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-4 col-12">
                            <div class="shop-img ">
                                <a href="<?php echo $row['Product_Image_Location'] ?>" class="popup-image"><img src="<?php echo $row['Product_Image_Location'] ?>" class="w-100 mb-30" alt=""></a>

                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-8 col-12">
                            <div class="single-product-sidebar">
                                <div class="product-content">
                                    <div class="single-product-title">
                                        <h2><?php echo $row['Product_Name'] ?></h2>
                                    </div>
                                    <!-- <div class="single-product-price">$<span>44.00</span>–<span>$250.00</span></div> -->
                                    <div class="single-product-desc mb-25">

                                        <div class="product-list single-product-list">

                                        </div>
                                    </div>
                                    <?php if (isset($_SESSION['login_Sess'])) {
                                    ?>
                                        <div class="quick-quantity mt-0">
                                            <form action="#" method="POST">
                                                <a href="https://api.whatsapp.com/send?phone=91<?php echo $row2['Mobile_Number']; ?>&text=Hi There, I'm Interested in buying your product <?php echo $row['Product_Name'] ?>" target="_blank"><button type="button" class="list-add-cart-btn red-hover-btn border-0" style="padding-left: 80px;padding-right: 80px;transition: all .5s;">Chat with Owner on WhatsApp
                                                    </button></a>

                                                <a href="mailto:<?php echo $row2['Customer_Email']; ?>?subject=Hi There, I'm Interested in buying your product <?php echo $row['Product_Name'] ?>&body=Please Write the body!!!" target="_blank"><button type="button" class="list-add-cart-btn red-hover-btn border-0" style="padding-left: 80px;padding-right: 80px;transition: all .5s; margin-top:10px;">Chat with Owner on Email
                                                    </button></a>

                                            </form>
                                        </div>
                                    <?php
                                    } else {
                                    ?>
                                        <div class="quick-quantity mt-0">
                                            <form action="#" method="POST">
                                                <a href="login.php" target="_blank"><button type="button" class="list-add-cart-btn red-hover-btn border-0" style="padding-left: 80px;padding-right: 80px;transition: all .5s;">Kindly login ot Chat with the owner
                                                    </button></a>
                                            </form>
                                        </div>
                                            <?php
                                        }
                                            ?>


                                            <!-- <div class="single-product-action mt-35">
                                        <ul>
                                            <li><a href="wishlist.html"><i class="fal fa-heart"></i> add to wishlist</a></li>
                                            <li><a href="javascript:void(0)"><i class="fal fa-abacus"></i> add to compare</a></li>
                                        </ul>
                                    </div> -->
                                            <!-- <div class="single-product-category mt-20">
                                        <ul>
                                            <li><a href="javascript:void(0)" class="title">Categories: </a></li>
                                            <li><a href="shop4.html">Chair & Table</a></li>
                                            <li><a href="shop4.html">Chairs</a></li>
                                            <li><a href="shop4.html">Handbeg</a></li>
                                        </ul>
                                    </div> -->
                                            <div class="share-product mt-20">
                                                <ul>
                                                    <li><a href="javascript:void(0)" class="title">Share this product</a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="facebook"><i class="fab fa-facebook-f"></i></a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="twitter"><i class="fab fa-twitter"></i></a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="pinterest"><i class="fab fa-pinterest"></i></a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="google +"><i class="fab fa-google-plus-g"></i></a></li>
                                                    <li><a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="Linkdin"><i class="fab fa-linkedin-in"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="single-product-bottom mt-115">
                        <ul class="nav nav-pills justify-content-center">
                            <li class="nav-item">
                                <a class="active" data-toggle="pill" href="#desc-tab-1">Description</a>
                            </li>
                            <!-- <li class="nav-item">
                            <a class="" data-toggle="pill" href="#desc-tab-2">Reviews (0)</a>
                        </li> -->
                        </ul>
                        <div class="container container-1200">
                            <div class="tab-content mt-60">
                                <div class="tab-pane fade show active" id="desc-tab-1">
                                    <div class="single-product-tab-content">
                                        <h3 class="title mb-30"></h3>
                                        <p><?php echo $row['Product_Description'] ?></p>
                                    </div>
                                </div>
                                <!-- <div class="tab-pane fade" id="desc-tab-2">
                                <div class="single-product-tab-content">
                                    <h3 class="title mb-30">Reviews</h3>
                                    <div class="review-box-item">
                                        <div class="row">
                                            <div class="col-xl-1 col-lg-2 col-md-2 col-3 pr-xl-0">
                                                <div class="review-box-img d-block text-right">
                                                    <img src="img/small-img/1.jpg" width="60" height="60" class="avatar-img" alt="">
                                                </div>
                                            </div>
                                            <div class="col-xl-11 col-lg-10 col-9 pl-0">
                                                <div class="review-box-content">
                                                    <div class="row">
                                                        <div class="col-7">
                                                            <div class="author-name">
                                                                <h6>John96</h6>
                                                                <div class="content">
                                                                    <p class="mb-0">Awesome</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-5 pr-5-px pl-0">
                                                            <div class="rating text-right">
                                                                <i class="fal fa-star red-color"></i>
                                                                <i class="fal fa-star red-color"></i>
                                                                <i class="fal fa-star red-color"></i>
                                                                <i class="fal fa-star"></i>
                                                                <i class="fal fa-star"></i>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <p>There are no reviews yet.</p>
                                    <h4>Add a review</h4>

                                    <form action="#" method="POST">
                                        <label for="rating">Your Rating</label>
                                        <input type="text" id="rating" class="d-none">
                                    </form>
                                    <p class="star-rating">
                                        <a href="javascript:void(0)"><i class="fal fa-star"></i></a>
                                        <a href="javascript:void(0)"><i class="fal fa-star"></i></a>
                                        <a href="javascript:void(0)"><i class="fal fa-star"></i></a>
                                        <a href="javascript:void(0)"><i class="fal fa-star"></i></a>
                                        <a href="javascript:void(0)"><i class="fal fa-star"></i></a>
                                    </p>

                                    <div class="form-group">
                                        <label for="review">Review</label>
                                        <textarea name="review" id="review" cols="30" rows="6" class="form-control"></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="name">Name <span class="required">*</span></label>
                                        <input type="text" name="name" id="name" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email <span class="required">*</span></label>
                                        <input type="email" name="email" id="email" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <div class="checkbox-input">
                                            <input type="checkbox" id="condition" name="condition">
                                        </div>
                                        <label for="condition">Save my name, email, and website in this browser for the next time I comment.</label>
                                    </div>
                                    <div class="form-group">
                                        <button type="submit" class="generic-btn red-hover-btn" style="font-size: 14px !important;">Submit</button>
                                    </div>
                                </div>
                            </div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
    <!-- single product end -->

    <!-- related product start -->
    <!-- <section class="related-product mt-120">
        <div class="container-fluid">
            <div class="generic-title text-center">
                <h2 class="mb-20">Related Product</h2>
            </div>
            <div class="main-product-carousel owl-carousel red-nav mt-50">
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="img/product/farniture-1.jpg" class="w-100" alt="">
                                    <a href="single-product-3.html" class="d-block">
                                        <div class="second-img">
                                            <img src="img/product/farniture-1-hover.jpg" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick view</a>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="shop3.html" class="product-category"><span>Woman</span></a>
                                        </div>
                                        <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-3.html" class="product-title">Light green crewneck sweatshir</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$58.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="img/product/farniture-2.jpg" class="w-100" alt="">
                                    <a href="single-product-3.html" class="d-block">
                                        <div class="second-img">
                                            <img src="img/product/farniture-2-hover.jpg" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick view</a>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="shop3.html" class="product-category"><span>Woman</span></a>
                                        </div>
                                        <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-3.html" class="product-title">Light green crewneck sweatshir</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$58.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="img/product/farniture-4.jpg" class="w-100" alt="">
                                    <a href="single-product-3.html" class="d-block">
                                        <div class="second-img">
                                            <img src="img/product/farniture-4-hover.jpg" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick view</a>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="shop3.html" class="product-category"><span>Woman</span></a>
                                        </div>
                                        <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-3.html" class="product-title">Tassels Pendant Earrings</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$85.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box mb-40">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="img/product/farniture-5.jpg" class="w-100" alt="">
                                    <a href="single-product-3.html" class="d-block">
                                        <div class="second-img">
                                            <img src="img/product/farniture-5-hover.jpg" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick view</a>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="shop3.html" class="product-category"><span>Shoes</span></a>
                                            <a href="shop3.html" class="product-category"><span>Sneaker</span></a>
                                            <a href="shop3.html" class="product-category"><span>Women</span></a>
                                        </div>
                                        <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-3.html" class="product-title">Leather Courriere duffle bag</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$3.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box mb-40">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="img/product/farniture-6.jpg" class="w-100" alt="">
                                    <a href="single-product-3.html" class="d-block">
                                        <div class="second-img">
                                            <img src="img/product/farniture-6-hover.jpg" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick view</a>
                                    <span class="sale bg-red text-white">sale!</span>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="shop3.html" class="product-category"><span>Shoes</span></a>
                                            <a href="shop3.html" class="product-category"><span>Sneaker</span></a>
                                        </div>
                                        <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-3.html" class="product-title">Wood design bedroom clook</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$45-$10.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box mb-40">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="img/product/farniture-7.jpg" class="w-100" alt="">
                                    <a href="single-product-3.html" class="d-block">
                                        <div class="second-img">
                                            <img src="img/product/farniture-7-hover.jpg" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick view</a>
                                    <span class="sale bg-red text-white">sale!</span>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="shop3.html" class="product-category"><span>Woman</span></a>
                                        </div>
                                        <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-3.html" class="product-title">Capitalize on low hanging fruit to</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$250.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box mb-40">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="img/product/farniture-8.jpg" class="w-100" alt="">
                                    <a href="single-product-3.html" class="d-block">
                                        <div class="second-img">
                                            <img src="img/product/farniture-8-hover.jpg" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick view</a>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="shop3.html" class="product-category"><span>Woman</span></a>
                                        </div>
                                        <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-3.html" class="product-title">Light green crewneck sweatshir</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$58.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="carousel-single-item">
                    <div class="col-12">
                        <div class="product-box mb-40">
                            <div class="product-box-wrapper">
                                <div class="product-img">
                                    <img src="img/product/farniture-9.jpg" class="w-100" alt="">
                                    <a href="single-product-3.html" class="d-block">
                                        <div class="second-img">
                                            <img src="img/product/farniture-9-hover.jpg" alt="" class="w-100">
                                        </div>
                                    </a>
                                    <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick view</a>
                                </div>

                                <div class="product-desc pb-20">
                                    <div class="product-desc-top">
                                        <div class="categories">
                                            <a href="shop3.html" class="product-category"><span>Woman</span></a>
                                        </div>
                                        <a href="wishlist.html" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                    </div>
                                    <a href="single-product-3.html" class="product-title">Tassels Pendant Earrings</a>
                                    <div class="price-switcher">
                                        <span class="price switcher-item">$85.00</span>
                                        <a href="cart.html" class="add-cart text-capitalize switcher-item">+add to cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section> -->
    <!-- related product end -->




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