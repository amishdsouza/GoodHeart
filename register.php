<?php
require_once 'configs/db.php';

session_start();
//header("Content-type: application/json");





?>


<!doctype html>
<html class="no-js" lang="">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Mazia - Clean Minimal eCommerce HTML5 Template</title>
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

    <style>
        .error {
            color: red !important;
        }
    </style>

    </style>
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
    <header class="header pt-30 pb-30  header-sticky header-static" style="padding-top: 30px; padding-bottom: 15px; top: 0px;">
        <div class="container-fluid">
            <div class="header-nav position-relative">
                <div class="row align-items-center">


                    <div class="col-xl-5 col-lg-6 hidden-md position-static">
                        <div class="header-nav">
                            <nav>
                                <ul>
                                    <li><a href="javascript:void(0)" class="active"><span>Home <i class="fal fa-angle-down"></i></span></a>

                                        <ul class="submenu">
                                            <li><a href="index.php">Home Fashion 1</a></li>
                                            <li><a href="index2.php">Home Fashion 2</a></li>
                                            <li><a href="index3.php">Home Fashion 3</a></li>
                                            <li><a href="index4.php">Home Fashion 4</a></li>
                                            <li><a href="index5.php">Home Fashion 5</a></li>
                                            <li><a href="index6.php">Home Fashion 6</a></li>
                                            <li><a href="index7.php">Home Fashion 7</a></li>

                                        </ul>
                                    </li>
                                    <li class="position-static"><a href="javascript:void(0)"><span>Shop <i class="fal fa-angle-down"></i></span></a>
                                        <div class="mega-menu">
                                            <div class="col-xl-7 pl-0 position-static">
                                                <ul>
                                                    <li><a href="shop.php">Shop Layout</a></li>
                                                    <li><a href="shop4.php">Masonry – Grid</a></li>
                                                    <li><a href="shop3.php">Pagination</a></li>
                                                    <li><a href="shop2.php">Ajax Load More</a></li>
                                                    <li><a href="shop2.php">Infinite Scroll</a></li>
                                                    <li><a href="shop2.php">Sidebar Right</a></li>
                                                    <li><a href="shop.php">Sidebar Left</a></li>
                                                </ul>

                                                <ul>
                                                    <li><a href="shop.php">Shop Pages</a></li>
                                                    <li><a href="shop2.php">List View</a></li>
                                                    <li><a href="shop3.php">Small Products</a></li>
                                                    <li><a href="shop2.php">Large Products</a></li>
                                                    <li><a href="shop3.php">Shop — 3 Items</a></li>
                                                    <li><a href="shop3.php">Shop — 4 Items</a></li>
                                                    <li><a href="shop4.php">Shop — 5 Items</a></li>
                                                </ul>

                                                <ul>
                                                    <li><a href="single-product-2.php">Product Layout</a></li>
                                                    <li><a href="single-product.php">Description Sticky</a></li>
                                                    <li><a href="single-product-2.php">Product Carousels</a></li>
                                                    <li><a href="single-product-3.php">Gallery Modern</a></li>
                                                    <li><a href="single-product-4.php">Thumbnail Left</a></li>
                                                    <li><a href="single-product-5.php">Thumbnail Right</a></li>
                                                    <li><a href="single-product-6.php">Thumbnail Botttom</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </li>
                                    <li><a href="javascript:void(0)"><span>Blog <i class="fal fa-angle-down"></i></span> </a>
                                        <ul class="submenu">
                                            <li><a href="blog.php">Grid layout</a></li>
                                            <li><a href="blog2.php">Large image</a></li>
                                            <li><a href="blog3.php">Left Sidebar</a></li>
                                            <li><a href="blog4.php">Right Sidebar</a></li>
                                            <li><a href="blog5.php">No sidebar</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)"><span>Portfolio <i class="fal fa-angle-down"></i></span> </a>
                                        <ul class="submenu">
                                            <li><a href="portfolio.php">Single project</a></li>
                                            <li><a href="portfolio2.php">Two Columns</a></li>
                                            <li><a href="portfolio3.php">Three Columns</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="javascript:void(0)"><span>Page</span> <i class="fal fa-angle-down"></i></a>
                                        <ul class="submenu">
                                            <li><a href="about.php">About</a></li>
                                            <li><a href="question.php">Frequently Questions</a></li>
                                            <li><a href="contact.php">Contact</a></li>
                                        </ul>
                                    </li>
                                    <li><a href="contact.php"><span>Contact</span></a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-3">
                        <div class="logo">
                            <a href="index3.php"><img src="img/logo/logo1.png" alt=""></a>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-3 col-6 col-md-6 col-sm-6 col-9">
                        <div class="header-right">
                            <ul class="text-right">
                                <li><a href="login.php" class="account"><i class="fal fa-user-friends"></i>
                                        <article class="account-registar d-inline-block">Login/Sign up</article>
                                    </a></li>
                                <li><a href="javascript:void(0)"><i class="fal fa-search"></i></a>

                                    <!-- search popup -->
                                    <div id="search-popup">
                                        <div class="close-search-popup">
                                            <i class="fal fa-times"></i>
                                        </div>
                                        <div class="search-popup-inner mt-135">
                                            <div class="search-title text-center">
                                                <h2>Search</h2>
                                            </div>

                                            <div class="search-content pt-55">
                                                <ul class="text-center">
                                                    <li><a href="javascript:void(0)" class="active">All categories</a></li>
                                                    <li><a href="javascript:void(0)">Clothing</a></li>
                                                    <li><a href="javascript:void(0)">Gift Cards</a></li>
                                                    <li><a href="javascript:void(0)">Handbag</a></li>
                                                    <li><a href="javascript:void(0)">Kids</a></li>
                                                    <li><a href="javascript:void(0)">Shoes</a></li>
                                                    <li><a href="javascript:void(0)">Sneaker</a></li>
                                                    <li><a href="javascript:void(0)">Women</a></li>
                                                </ul>

                                                <div class="search-form mt-35">
                                                    <form action="#" method="post">
                                                        <input type="text" placeholder="Search Products...">
                                                        <button type="submit"><i class="fal fa-search"></i></button>
                                                    </form>
                                                </div>

                                                <div class="search-result-list">
                                                    <ul class="text-left">
                                                        <li class="d-block d-flex align-items-center">
                                                            <div class="search-result-img">
                                                                <img src="img/product/1.jpg" class="w-100" alt="">
                                                            </div>
                                                            <div class="search-result-desc pl-10">
                                                                <a href="single-product-4.php" class="title px-0">ELLE - Recliner syntheti chair</a>
                                                                <div class="price">$<span>399</span></div>
                                                            </div>
                                                        </li>
                                                        <li class="d-block d-flex align-items-center">
                                                            <div class="search-result-img">
                                                                <img src="img/product/2.jpg" class="w-100" alt="">
                                                            </div>
                                                            <div class="search-result-desc pl-10">
                                                                <a href="single-product-4.php" class="title px-0">RIMINI - Folding leather deck chair</a>
                                                                <div class="price">$<span>399</span></div>
                                                            </div>
                                                        </li>
                                                        <li class="d-block d-flex align-items-center">
                                                            <div class="search-result-img">
                                                                <img src="img/product/3.jpg" class="w-100" alt="">
                                                            </div>
                                                            <div class="search-result-desc pl-10">
                                                                <a href="single-product-4.php" class="title px-0">LANDSCAPE - Folding fabric deck chair</a>
                                                                <div class="price">$<span>399</span></div>
                                                            </div>
                                                        </li>
                                                        <li class="d-block d-flex align-items-center">
                                                            <div class="search-result-img">
                                                                <img src="img/product/1.jpg" class="w-100" alt="">
                                                            </div>
                                                            <div class="search-result-desc pl-10">
                                                                <a href="single-product-4.php" class="title px-0">ELLE - Recliner syntheti chair</a>
                                                                <div class="price">$<span>399</span></div>
                                                            </div>
                                                        </li>
                                                        <li class="d-block d-flex align-items-center">
                                                            <div class="search-result-img">
                                                                <img src="img/product/2.jpg" class="w-100" alt="">
                                                            </div>
                                                            <div class="search-result-desc pl-10">
                                                                <a href="single-product-4.php" class="title px-0">RIMINI - Folding leather deck chair</a>
                                                                <div class="price">$<span>399</span></div>
                                                            </div>
                                                        </li>
                                                        <li class="d-block d-flex align-items-center">
                                                            <div class="search-result-img">
                                                                <img src="img/product/3.jpg" class="w-100" alt="">
                                                            </div>
                                                            <div class="search-result-desc pl-10">
                                                                <a href="single-product-4.php" class="title px-0">LANDSCAPE - Folding fabric deck chair</a>
                                                                <div class="price">$<span>399</span></div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div>


                                        </div>
                                    </div>
                                </li>
                                <li><a href="wishlist.php" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="view wishlist"><i class="fal fa-heart"><span>0</span></i></a></li>
                                <li><a href="cart.php"><i class="fal fa-shopping-bag"><span>5</span></i></a>
                                    <div class="minicart">
                                        <div class="minicart-body">
                                            <div class="minicart-content">
                                                <ul class="text-left">
                                                    <li>
                                                        <div class="minicart-img">
                                                            <a href="single-product-4.php" class="p-0"><img src="img/product/1.jpg" class="w-100" alt=""></a>
                                                        </div>
                                                        <div class="minicart-desc">
                                                            <a href="single-product-4.php" class="p-0">Capitalize on low hanging fruit t</a>
                                                            <strong>1 × $250.00</strong>
                                                        </div>
                                                        <div class="remove">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </li>

                                                    <li>
                                                        <div class="minicart-img">
                                                            <a href="single-product-4.php" class="p-0"><img src="img/product/2.jpg" class="w-100" alt=""></a>
                                                        </div>
                                                        <div class="minicart-desc">
                                                            <a href="single-product-4.php" class="p-0">Leather Courriere duffle ba</a>
                                                            <strong>1 × $150.00</strong>
                                                        </div>
                                                        <div class="remove">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </li>


                                                    <li>
                                                        <div class="minicart-img">
                                                            <a href="single-product-4.php" class="p-0"><img src="img/product/3.jpg" class="w-100" alt=""></a>
                                                        </div>
                                                        <div class="minicart-desc">
                                                            <a href="single-product-4.php" class="p-0">Party Supplies Around Cupcake</a>
                                                            <strong>1 × $150.00</strong>
                                                        </div>
                                                        <div class="remove">
                                                            <i class="fal fa-times"></i>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>
                                        <div class="minicart-checkout">
                                            <div class="minicart-checkout-heading mt-8 mb-25 overflow-hidden">
                                                <strong class="float-left">Subtotal:</strong>
                                                <span class="price float-right">503.00</span>
                                            </div>
                                            <div class="minicart-checkout-links">
                                                <a href="cart.php" class="generic-btn black-hover-btn text-uppercase w-100 mb-20">View cart</a>
                                                <a href="checkout.php" class="generic-btn black-hover-btn text-uppercase w-100 mb-20">Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li><a href="javascript:void(0)"><i class="fal fa-align-right"></i></a>
                                    <ul class="submenu bold-content text-right">
                                        <li><a href="login.php">My Account</a></li>
                                        <li><a href="checkout.php">Checkout</a></li>
                                        <li><a href="shop.php">Shop</a></li>
                                        <li><a href="wishlist.php">Wishlist</a></li>
                                        <li><a href="question.php">Frequently</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="mobile-menu visible-sm">
                <div id="mobile-menu">
                    <ul>
                        <li><a class="pl-3" href="javascript:void(0)">Home</a>
                            <ul class="pl-4">
                                <li><a href="index.php">Home Fashion 1</a></li>
                                <li><a href="index2.php">Home Fashion 2</a></li>
                                <li><a href="index3.php">Home Fashion 3</a></li>
                                <li><a href="index4.php">Home Fashion 4</a></li>
                                <li><a href="index5.php">Home Fashion 5</a></li>
                                <li><a href="index6.php">Home Fashion 6</a></li>
                                <li><a href="index7.php">Home Fashion 7</a></li>

                            </ul>
                        </li>
                        <li><a class="pl-3" href="javascript:void(0)">Shop</a>
                            <ul>
                                <li><a href="shop.php">Shop Layout</a></li>
                                <li><a href="shop4.php">Masonry – Grid</a></li>
                                <li><a href="shop3.php">Pagination</a></li>
                                <li><a href="shop2.php">Ajax Load More</a></li>
                                <li><a href="shop2.php">Infinite Scroll</a></li>
                                <li><a href="shop2.php">Sidebar Right</a></li>
                                <li><a href="shop.php">Sidebar Left</a></li>
                                <li><a href="shop.php">Shop Pages</a></li>
                                <li><a href="shop2.php">List View</a></li>
                                <li><a href="shop3.php">Small Products</a></li>
                                <li><a href="shop2.php">Large Products</a></li>
                                <li><a href="shop3.php">Shop — 3 Items</a></li>
                                <li><a href="shop3.php">Shop — 4 Items</a></li>
                                <li><a href="shop4.php">Shop — 5 Items</a></li>
                                <li><a href="single-product-2.php">Product Layout</a></li>
                                <li><a href="single-product.php">Description Sticky</a></li>
                                <li><a href="single-product-2.php">Product Carousels</a></li>
                                <li><a href="single-product-3.php">Gallery Modern</a></li>
                                <li><a href="single-product-4.php">Thumbnail Left</a></li>
                                <li><a href="single-product-5.php">Thumbnail Right</a></li>
                                <li><a href="single-product-6.php">Thumbnail Botttom</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Blog</a>
                            <ul>
                                <li><a href="blog.php">Grid layout</a></li>
                                <li><a href="blog2.php">Large image</a></li>
                                <li><a href="blog3.php">Left Sidebar</a></li>
                                <li><a href="blog4.php">Right Sidebar</a></li>
                                <li><a href="blog5.php">No sidebar</a></li>
                            </ul>
                        </li>
                        <li><a href="javascript:void(0)">Portfolio</a>
                            <ul>
                                <li><a href="portfolio.php">Single project</a></li>
                                <li><a href="portfolio2.php">Two Columns</a></li>
                                <li><a href="portfolio3.php">Three Columns</a></li>
                            </ul>
                        </li>
                        <li><a href="contact.php">Contact</a></li>
                    </ul>
                </div>
            </div>
            <!-- /. mobile nav -->
        </div>
    </header>
    <!-- header section end -->



    <!-- shop body section start -->
    <main>

        <!-- breadcrumb-area-start -->
        <section class="breadcrumb-area" data-background="img/bg/page-title.png">
            <div class="container">
                <div class="row">
                    <div class="col-xl-12">
                        <div class="breadcrumb-content" style="flex-direction: column;">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb p-0 m-0">
                                    <li class="breadcrumb-item"><a href="index4.php">Home</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Login</li>
                                </ol>
                            </nav>
                            <h2 class="login-title mt-40">Login</h2>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- breadcrumb-area-end -->

        <!-- login Area Strat-->
        <section class="login-area pt-100 pb-100">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2">
                        <div class="basic-login">
                            <h3 class="text-center mb-60">Signup From Here</h3>
                            <form method="POST" id="reg">

                                <label for="uname">Name <span>*</span></label>
                                <input id="uname" type="text" name="uname" placeholder="Enter Your Full Name" onkeypress="return(event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32" required />

                                <label for="uemail">Email Address <span>*</span></label>
                                <input id="uemail" type="email" name="uemail" placeholder="Enter Email address" required />
                                <div class="alert alert-danger" id="errorEmail" style="display:none;">
                                    This Email Already Exist.
                                </div>

                                <label for="pass">Password <span>*</span></label>
                                <input type="password" id="pass" name="pass" class="form-control" placeholder="" required pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" minlength="8">

                                <div class="alert alert-danger" id="errorPass" style="display:none;">
                                    This Password Already Exist.
                                </div>

                                <label for="Conpass">Confirm Password <span>*</span></label>
                                <input type="password" id="Con_Pass" name="Con_Pass" class="form-control" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Please Match The Password" minlength="8" placeholder="" required>

                                <label for="StreetAddress">Street Address <span>*</span></label>
                                <input class="form-control" name="StreetAddress" id="StreetAddress" placeholder="Enter Your Address" required />

                                <label for="houseNo">House Number/Name or Bldg Name/Floor Number<span>*</span></label>
                                <input class="form-control" type="text" name="houseNo" id="houseNo" placeholder="Enter Your House Number / Flat Number" required />

                                <label for="place">Town / City <span>*</span></label>
                                <input class="form-control" name="place" type="text" id="place" placeholder="Enter Place" required onkeypress="return(event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32" />

                                <label for="state">State <span>*</span></label>
                                <input class="form-control" name="state" type="text" id="state" placeholder="Enter State" required onkeypress="return(event.charCode > 64 && event.charCode < 91) || (event.charCode > 96 && event.charCode < 123) || event.charCode == 32" />

                                <label for="zip">Zip Code <span>*</span></label>
                                <input class="form-control" name="zip" type="text" id="zip" placeholder="Enter Zip Code" required onkeypress="return isNumber(event);" maxlength="6" minlength="6" />

                                <label for="dob">Date of Birth <span>*</span></label>
                                <input id="dob" name="dob" type="date" placeholder="Enter Date of Birth" required />

                                <label for="mobileNo">Mobile Number <span>*</span> </label>
                                <input id="mobileNo" type="text" name="mobileNo" placeholder="Enter Mobile Number" required onkeypress="return isNumber(event);" maxlength="10" minlength="10" />

                                <div class="alert alert-danger" id="errorMobile" style="display:none;">
                                    This Mobile Number Already Exist.
                                </div>

                                <div class="mt-10"></div>
                                <br>
                                <br>
                                <button type="button" name="register_btn" id="btnotp" class="btn theme-btn w-100">Send OTP</button>
                                <div class="alert alert-success" role="alert" style="display:none;" id="otp-success">
                                    OTP Sent Successfully
                                </div>
                                <br>
                                <br>
                                <div class="col-md-6" style="margin-left: 12em !important; display:none;" id="txtDiv">
                                    <div class="form-group">
                                        <input id="textInput" type="text" class="form-control" placeholder="Enter OTP" id="otp_input" name="otp_input" minlength="4" maxlength="4" onkeypress="return isNumber(event);" required>
                                    </div>
                                </div>
                                <button type="button" name="btnotpsub" id="btnotpsub" class="btn theme-btn w-100" style="display:none;">Submit OTP</button>

                                <button type="button" name="btnreg" id="btnreg" class="btn theme-btn w-100" style="display:none;">Register Now</button>
                                <br>
                                <br>
                                <div class="alert alert-success" role="alert" style="display:none;" id="msgSuccess">
                                    User Successfuly Created
                                </div>
                                <!--<div class="or-divide"><span>or</span></div>!-->
                                <button id class="btn theme-btn w-100" id="btnlogin" onclick="location.href='login.php'" style="display:none;">login Now</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- login Area End-->


    </main>






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
                <!-- /.newsletter -->
                <div class="service pt-57 mt-40 gray-border-top">
                    <div class="row justify-content-center">
                        <div class="col-xl-4 col-md-6 service-item">
                            <div class="service-box service-box-2">
                                <div class="service-box-content">
                                    <h4 class="title">Worldwide Shipping</h4>
                                    <p class="service-desc">Duis autem vel eum iriure dolor in hendrerit velit esse
                                        molestie consequat.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-md-6 service-item">
                            <div class="service-box service-box-2">
                                <div class="service-box-content">
                                    <h4 class="title">Online Support 24/7</h4>
                                    <p class="service-desc">Duis autem vel eum iriure dolor in hendrerit velit esse
                                        molestie consequat.</p>
                                </div>
                            </div>
                        </div>

                        <div class="col-xl-4 col-lg-6 hidden-md service-item">
                            <div class="service-box service-box-2">
                                <div class="service-box-content">
                                    <h4 class="title">Money Return Guarantee</h4>
                                    <p class="service-desc">Duis autem vel eum iriure dolor in hendrerit velit esse
                                        molestie consequat.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /. service -->
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
                                    <div class="footer-img mt-65">
                                        <img src="img/logo/paypal.png" alt="">
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
                            <div class="tab-content" id="pills-tabContent">
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
                            <ul class="nav nav-pills justify-content-center mt-10" id="pills-tab" role="tablist">
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
                                <a href="single-product-5.php" class="all-feature">See all feature</a>
                                <div class="quick-quantity mt-30">
                                    <form action="#" method="POST">
                                        <input type="number" value="1">
                                        <button type="submit" class="generic-btn red-hover-btn text-capitalize">add to
                                            cart</a>
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
                                        <li>– Light green crewnec...t.</li>
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
    <section id="startup-popup">
        <div class="product-popup-overlay has-startup" style="opacity: 1;visibility: visible"></div>
        <div class="startup-popup-body">
            <div class="startup-body-content h-100">
                <div class="row justify-content-end h-100">
                    <div class="col-6 h-100">
                        <div class="startup-popup-inner h-100">
                            <div class="close-search-popup">
                                <i class="fal fa-times"></i>
                            </div>
                            <div class="startup-popup-main-content">
                                <h2>Get Our Email Letter</h2>
                                <p class="mb-0">Subscribe to the Mazia store mailing list to receive updates on new
                                    arrivals, special offers
                                    and other discount information.</p>
                                <div class="startup-subscribe-form">
                                    <form action="#" method="POST">
                                        <input type="text" placeholder="Subscribe to our newsletter" class="mb-30">
                                        <button class="generic-btn red-hover-btn text-uppercase">Subscribe now</button>
                                    </form>
                                </div>
                            </div>
                            <div class="startup-popup-sub-content">
                                <div class="popup-warning">
                                    <input type="checkbox" id="startup-popup-hidden">
                                    <label for="startup-popup-hidden">Do not show the popup again</label>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
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
    <script src="js/textbox.js"></script>
    <script src="js/datepicker.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/jquery.validate.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.3/additional-methods.js"></script>
    <script src="http://cdn.jsdelivr.net/jquery.mixitup/latest/jquery.mixitup.min.js"></script>

    <script>
        $(document).ready(function() {
            $("#reg").validate({
                rules: {
                    Con_Pass: {
                        equalTo: "#pass"
                    }


                },
                messages: {
                    pass: "Recomended Password(UpperCase, LowerCase, Number / SpecialChar and min 8 Chars)"

                }
            });

            $('#btnotpsub').on('click', function() {
                var otpsub = $('#otp_input').val();

                $.ajax({
                    type: "POST",
                    url: "otp-process.php",
                    data: {
                        type: 3,
                        otpsub: otpsub
                    },
                    success: function(dataResult) {
                        var dataResult = JSON.parse(dataResult);

                        if (dataResult == 200) {
                            $('btnotpsub').hide();
                            $('btnreg').show();
                            $('#btnlogin').show();

                        } else {

                        }
                    }
                });
            });

            $('#btnotp').on('click', function() {
                var mobileNo = $('#mobileNo').val();
                var uemail = $('#uemail').val();
                var pass = $('#pass').val();

                if (!$('#reg').valid()) {
                    return false;
                } else {
                    $.ajax({
                        type: "POST",
                        url: "otp_process.php",
                        data: {
                            type: 1,
                            uemail: uemail,
                            pass: pass,
                            mobileNo: mobileNo,
                        },
                        success: function(dataResult) {
                            //var db = JSON.stringify(dataResult)
                            var dataResult = JSON.parse(dataResult);
                            alert(dataResult);
                            if (dataResult.statusCode == 201) {
                                $('#btnotp').hide();
                                $('#btnotpsub').show()
                                $("#txtDiv").show();
                                //$('#btnreg').show();
                                $('#btnlogin').show();
                                $('#otp_success').show();
                            } else {
                                alert('not sent')
                            }
                        }
                    });
                }

            });

            $('#btnreg').on('click', function() {
                var uname = $('#uname').val();
                var uemail = $('#uemail').val();
                var pass = $('#pass').val();
                var StreetAddress = $('#StreetAddress').val();
                var houseNo = $('#houseNo').val();
                var place = $('#place').val();
                var state = $('#state').val();
                var zip = $('#zip').val();
                var dob = $('#dob').val();
                var mobileNo = $('#mobileNo').val();
                //$('#errorEmail').show();


                $.ajax({
                    type: "POST",
                    url: "insertCust.php",
                    data: {
                        uname: uname,
                        uemail: uemail,
                        pass: pass,
                        StreetAddress: StreetAddress,
                        houseNo: houseNo,
                        place: place,
                        state: state,
                        zip: zip,
                        dob: dob,
                        mobileNo: mobileNo

                    },
                    success: function(dataResult) {
                        //var dr = JSON.stringify(dataResult.statusCode);
                        var dataResult = JSON.parse(dataResult);
                        // alert(dataResult)

                        // alert(dataResult.statusCode).toString;
                        if (dataResult.statusCode == 201) {
                            //alert("true")
                            $('#errorEmail').show();
                            $("#errorPass").hide();
                            $("#errorMobile").hide();
                        } else if (dataResult.statusCode == 202) {
                            $("#errorPass").show();
                            $("#errorEmail").hide();
                            $("#errorMobile").hide();
                        } else if (dataResult.statusCode == 203) {
                            $("#errorMobile").show();
                            $("#errorEmail").hide();
                            $("#errorPass").hide();
                        } else if (dataResult.statusCode == 200) {
                            $('#msgSuccess').show();
                            $("#errorEmail").hide();
                            $("#errorPass").hide();
                            $("#errorMobile").hide();
                        }

                    }
                });

            });

        });
    </script>
</body>

</html>