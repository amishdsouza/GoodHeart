<?php
require_once 'configs/db.php';
include("header.php");

//session_start();

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
    $no_of_items = 0;
}


?>

<!doctype html>
<html lang="en">


<body>
    <!-- preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>


    <!-- header section start -->
    
    <!-- header section end -->




    <!-- slider section start -->
    <section class="slider">
        <div class="slider-active">
            <div class="single-slider d-flex align-items-center h-950" data-background="img/slider/1.jpg">
                <div class="container">
                    <div class="single-slider-inner d-flex align-items-center justify-content-start">
                        <div class="single-slider-content text-left light-content">
                            <div class="slider-heading">
                                <h2 class="mb-0" data-animation="fadeInUp" data-delay=".2s">Perfect</h2>
                                <h2 class="mb-0" data-animation="fadeInUp" data-delay=".4s">Kids Collection</h2>
                            </div>
                            <div class="slider-desc" data-animation="fadeInUp" data-delay=".6s">
                                <p class="mt-35 mb-0">New Spring drops from Over. Shop the Collection</p>
                            </div>
                            <div class="slider-link" data-animation="fadeInUp" data-delay=".8s">
                                <a href="shop2.php" class="generic-btn mt-70 red-hover-btn text-uppercase">Discover
                                    now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider d-flex align-items-center h-950" data-background="img/slider/2.jpg">
                <div class="container">
                    <div class="single-slider-inner d-flex align-items-center justify-content-start">
                        <div class="single-slider-content text-left light-content">
                            <div class="slider-heading">
                                <h2 class="mb-0" data-animation="fadeInUp" data-delay=".2s">Enjoy This</h2>
                                <h2 class="mb-0" data-animation="fadeInUp" data-delay=".4s">Summer Trends</h2>
                            </div>
                            <div class="slider-desc" data-animation="fadeInUp" data-delay=".6s">
                                <p class="mt-35 mb-0">New Spring drops from Over. Shop the Collection</p>
                            </div>
                            <div class="slider-link" data-animation="fadeInUp" data-delay=".8s">
                                <a href="shop2.php" class="generic-btn mt-70 red-hover-btn text-uppercase">Discover
                                    now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="single-slider d-flex align-items-center h-950" data-background="img/slider/3.jpg">
                <div class="container">
                    <div class="single-slider-inner d-flex align-items-center justify-content-start">
                        <div class="single-slider-content text-left light-content">
                            <div class="slider-heading">
                                <h2 class="mb-0">Sale Off</h2>
                                <h2 class="mb-0">Clothing For Man</h2>
                            </div>
                            <div class="slider-desc" data-animation="fadeInUp" data-delay=".6s">
                                <p class="mt-35 mb-0">New Spring drops from Over. Shop the Collection</p>
                            </div>
                            <div class="slider-link" data-animation="fadeInUp" data-delay=".8s">
                                <a href="shop2.php" class="generic-btn mt-70 red-hover-btn text-uppercase">Discover
                                    now</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- slider section end -->

    <!-- category section start -->
    <section class="category mt-100">
        <div class="container">
            <div class="row">
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12 left-category">
                    <div class="category-box">
                        <div class="category-wrapper">
                            <div class="category-img">
                                <img src="img/banner/categorie_1.jpg" class="w-100" alt="">
                            </div>
                            <div class="category-content">
                                <a href="shop2.php" class="title">Clothing</a>
                                <p class="category-item">(<span>8</span> items)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-6 col-md-6 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 ">
                            <div class="row">
                                <div class="col-12 mb-27">
                                    <div class="category-box">
                                        <div class="category-wrapper">
                                            <div class="category-img">
                                                <img src="img/banner/categorie_2.jpg" class="w-100" alt="">
                                            </div>
                                            <div class="category-content">
                                                <a href="shop2.php" class="title">Handbag</a>
                                                <p class="category-item">(<span>20</span> items)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="category-box">
                                        <div class="category-wrapper">
                                            <div class="category-img">
                                                <img src="img/banner/categorie_3.jpg" class="w-100" alt="">
                                            </div>
                                            <div class="category-content">
                                                <a href="shop2.php" class="title">Sneaker</a>
                                                <p class="category-item">(<span>11</span> items)</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6 col-12 category-right">
                            <div class="category-box">
                                <div class="category-wrapper">
                                    <div class="category-img">
                                        <img src="img/banner/categorie_4.jpg" class="w-100" alt="">
                                    </div>
                                    <div class="category-content">
                                        <a href="shop2.php" class="title">Women</a>
                                        <p class="category-item">(<span>17</span> items)</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- category section end -->

    <!-- footer section start -->
    <section class="footer">
        <div class="footer-top mt-120 pb-120 pt-115" style="background-color: #f5f5f5;">
            <div class="footer-top-wrapper">
                <div class="newsletter ">
                    <div class="row">
                        <div class="col-xl-6 col-lg-6">
                            <h2 class="title m-0">Sign Up For Our Newsletter</h2>
                            <p>Subscribe our newsletter and get discount 20% Off</p>
                        </div>
                        <div class="col-xl-6 col-lg-6">
                            <div class="newsletter-form">
                                <form action="#" method="POST">
                                    <input type="text" placeholder="Search for our newsletter...">
                                    <button type="submit" class="generic-btn red-hover-btn text-uppercase float-right">Subscribe
                                        Now</button>
                                </form>
                            </div>
                        </div>

                    </div>
                </div>

                <!-- /. footer bottom -->
            </div>

        </div>
        <!-- footer top -->
        <div class="footer-bottom pt-77" style="background-color: #292929;">
            <div class="container-1180">
                <div class="footer-bottom-wrapper">
                    <div class="footer-bottom-primary pb-60">
                        <div class="row">
                            <div class="col-xl-5 col-lg-5 col-md-9">
                                <div class="footer-item has-desc">
                                    <div class="footer-logo mb-25">
                                        <img src="img/logo/logo2.png" width="120" height="31" alt="">
                                    </div>
                                    <div class="footer-desc">
                                        <p class="mb-10">Mazia store is a premium theme with advanced admin module. It’s
                                            extremely customizable, easy to use and fully responsive and retina ready.
                                        </p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-xl-7 col-lg-7 col-md-12">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6">
                                        <div class="footer-menu">
                                            <ul>
                                                <li><a href="javascript:void(0)" class="title">MY ACCOUNT</a></li>
                                                <li><a href="login.php">My account</a></li>
                                                <li><a href="checkout.php">Checkout</a></li>
                                                <li><a href="shop2.php">Shop</a></li>
                                                <li><a href="wishlist.php">Wishlist</a></li>
                                                <li><a href="question.php">Frequently</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6">
                                        <div class="footer-menu">
                                            <ul>
                                                <li><a href="javascript:void(0)" class="title">Quick Links</a></li>
                                                <li><a href="shop2.php">Special Offers</a></li>
                                                <li><a href="shop2.php">Gift Cards</a></li>
                                                <li><a href="shop2.php">F21 Red</a></li>
                                                <li><a href="about.php">Privacy Policy</a></li>
                                                <li><a href="about.php">Teams of Use</a></li>
                                                <li><a href="portfolio.php">Portfolio</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 hidden-sm">
                                        <div class="footer-menu">
                                            <ul>
                                                <li><a href="javascript:void(0)" class="title">Company Info</a></li>
                                                <li><a href="about.php">About us</a></li>
                                                <li><a href="blog.php">Careers</a></li>
                                                <li><a href="portfolio2.php">Business With Us</a></li>
                                                <li><a href="shop2.php">Find a Store</a></li>
                                                <li><a href="question.php">Teams of Use</a></li>
                                                <li><a href="portfolio3.php">Press & Talent</a></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </section>
    <!-- footer section end -->

    <!-- product popup start -->
    <section id="product-popup">
        <div class="product-popup-overlay"></div>
        <div class="product-popup-container">
            <div class="product-inner w-100">
                <div class="product-inner-content">
                    <div class="quick-close-action"><i class="fal fa-times"></i></div>
                    <div class="row">
                        <div class="col-xl-5 col-lg-5 col-md-5 col-sm-6">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="product-popup-1">
                                    <div class="product-popup-img">
                                        <img src="img/product/10.jpg" class="w-100" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product-popup-2">
                                    <div class="product-popup-img">
                                        <img src="img/product/11.jpg" class="w-100" alt="">
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="product-popup-3">
                                    <div class="product-popup-img">
                                        <img src="img/product/12.jpg" class="w-100" alt="">
                                    </div>
                                </div>
                            </div>
                            <ul class="nav nav-pills justify-content-center mt-10">
                                <li class="nav-item">
                                    <a class="active" data-toggle="pill" href="#product-popup-1">
                                        <img src="img/product/10.jpg" class="w-100" alt="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="" data-toggle="pill" href="#product-popup-2">
                                        <img src="img/product/11.jpg" class="w-100" alt="">
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="" data-toggle="pill" href="#product-popup-3">
                                        <img src="img/product/12.jpg" class="w-100" alt="">
                                    </a>
                                </li>
                            </ul>
                        </div>
                        <div class="col-xl-7 col-lg-7 col-md-7 col-sm-6">
                            <div class="product-content">
                                <div class="product-title">
                                    <h2>Nari Narwhal Usb...</h2>
                                </div>
                                <div class="price">$<span>44.00</span>–<span>$250.00</span></div>
                                <a href="single-product-3.php" class="all-feature">See all feature</a>
                                <div class="quick-quantity mt-30">
                                    <form action="#" method="POST">
                                        <input type="number" value="1">
                                        <button type="submit" class="generic-btn red-hover-btn text-capitalize">add to
                                            cart</button>
                                    </form>
                                </div>

                                <div class="product-desc pb-20 mt-25 gray-border-top">
                                    <p class="mb-0">Typi non habent claritatem insitam, est usus legentis in iis qui
                                        facit eorum claritatem. Investigationes demonstraverunt lectores legere me lius
                                        quod ii legunt saepius. Claritas est etiam processus A Capitalize on low hanging
                                        fruit to identify a ballpark value added activity to beta test. Override the
                                        digital...ditional clickthroughs from DevOps. Nanotechnology immersion along the
                                        information highway will close the […]</p>
                                </div>
                                <div class="product-list mt-25">
                                    <ul>
                                        <li>– Light green crewneck sweatshirt.</li>
                                        <li>– Hand pockets.</li>
                                        <li>– Relaxed fit.</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- product popup end -->

    <!-- startup popup start -->

    <!-- startup popup end -->

    <script src="js/main.js"></script>
</body>

</html>