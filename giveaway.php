<?php
require_once 'configs/db.php';
include("header.php");

session_start();

function loginStart($db)
{
    $no_of_items = 0;
    $uid = $_SESSION['ID'];

    $query = "SELECT * FROM `shopping_cart` WHERE `Customer_ID` = '$uid'";

    $sql = $db->query($query) or die($db->error);
    $row = $sql->fetch_assoc();
    $cart_id = $row['Cart_ID'];

    $query2 = "SELECT COUNT(*) AS `count` FROM `shopping_cart_details` WHERE `Cart_ID` = '$cart_id'";
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

if (isset($_POST['name']) && isset($_POST['description']) ) {
	$name = $_POST['name'];
	$description = $_POST['description'];
	$file = $_FILES['image']['name'];
    $location = "img/uploadImages/$file";
    echo $location;
    echo $db->error;
    $query = "INSERT INTO products(Product_Name,Product_Description,Product_Image_Name, Product_Image_Location) VALUES('$name','$description','$file','$location')";
    $res = mysqli_query($db,$query);

    
        if ($res) {
        move_uploaded_file($_FILES['image']['uploadImages']['tmp_name'], "img/$file");

        $name = "";
        header("Location: shop.php");
        }
        else{
            echo $db->error;
        }
}

?>

<!doctype html>
<html class="no-js" lang="">

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
                    <div class="col-xl-2 col-lg-1 col-md-6 col-sm-6 col-3">
                        <div class="logo">
                            <a href="index.php"><img src="../img/logo/logo1.png" alt=""></a>
                        </div>
                    </div>

                    <div class="col-xl-6 col-lg-8 hidden-md position-static">
                        <div class="header-nav">
                            <nav>
                                <ul>
                                    <li><a href="index.php" class="active"><span>Home </span></a></li>

                                    <li class="position-static"><a href="shop.php"><span>Shop <i class="fal fa-angle-down"></i></span></a>
                                        <div class="mega-menu">
                                            <div class="col-xl-7 pl-0 position-static">

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
                                    <li><a href="javascript:void(0)"><span>Blog <i class="fal fa-angle-down"></i></span>
                                        </a>
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
                                        </ul>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>

                    <div class="col-xl-4 col-lg-3 col-6 col-md-6 col-sm-6 col-9">
                        <div class="header-right">
                            <ul class="text-right">
                            
    
                            <li> <i class="fas fa-gift"> </i>
                                <a href="giveaway.php" class="active">
                                    Giveaway
                                </a>

                            </li>

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
                                                <li><a href="javascript:void(0)" class="active">All categories</a>
                                                </li>
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
                                                            <img src="../img/product/1.jpg" class="w-100" alt="">
                                                        </div>
                                                        <div class="search-result-desc pl-10">
                                                            <a href="shop2.php" class="title px-0">ELLE - Recliner syntheti
                                                                chair</a>
                                                            <div class="price">$<span>399</span></div>
                                                        </div>
                                                    </li>
                                                    <li class="d-block d-flex align-items-center">
                                                        <div class="search-result-img">
                                                            <img src="../img/product/2.jpg" class="w-100" alt="">
                                                        </div>
                                                        <div class="search-result-desc pl-10">
                                                            <a href="shop2.php" class="title px-0">RIMINI - Folding leather
                                                                deck chair</a>
                                                            <div class="price">$<span>399</span></div>
                                                        </div>
                                                    </li>
                                                    <li class="d-block d-flex align-items-center">
                                                        <div class="search-result-img">
                                                            <img src="../img/product/3.jpg" class="w-100" alt="">
                                                        </div>
                                                        <div class="search-result-desc pl-10">
                                                            <a href="shop2.php" class="title px-0">LANDSCAPE - Folding
                                                                fabric deck chair</a>
                                                            <div class="price">$<span>399</span></div>
                                                        </div>
                                                    </li>
                                                    <li class="d-block d-flex align-items-center">
                                                        <div class="search-result-img">
                                                            <img src="img/product/1.jpg" class="w-100" alt="">
                                                        </div>
                                                        <div class="search-result-desc pl-10">
                                                            <a href="shop2.php" class="title px-0">ELLE - Recliner syntheti
                                                                chair</a>
                                                            <div class="price">$<span>399</span></div>
                                                        </div>
                                                    </li>
                                                    <li class="d-block d-flex align-items-center">
                                                        <div class="search-result-img">
                                                            <img src="../img/product/2.jpg" class="w-100" alt="">
                                                        </div>
                                                        <div class="search-result-desc pl-10">
                                                            <a href="shop2.php" class="title px-0">RIMINI - Folding leather
                                                                deck chair</a>
                                                            <div class="price">$<span>399</span></div>
                                                        </div>
                                                    </li>
                                                    <li class="d-block d-flex align-items-center">
                                                        <div class="search-result-img">
                                                            <img src="img/product/3.jpg" class="w-100" alt="">
                                                        </div>
                                                        <div class="search-result-desc pl-10">
                                                            <a href="shop2.php" class="title px-0">LANDSCAPE - Folding
                                                                fabric deck chair</a>
                                                            <div class="price">$<span>399</span></div>
                                                        </div>
                                                    </li>
                                                </ul>
                                            </div>
                                        </div>


                                    </div>
                                </div>
                            </li>

                            <li>
                                <a href="wishlist.php" data-toggle="tooltip" data-placement="bottom" title="view wishlist">
                                    <i class="fal fa-heart"><span>0</span></i>
                                </a>
                            </li>

                            <li><a href="javascript:void(0)"><i class="fal fa-shopping-bag">
                                        <span>
                                            <?php
                                            if (isset($_SESSION['login_Sess'])) {
                                                echo loginStart($db);
                                            } else {
                                                echo "0";
                                            }
                                            ?>
                                        </span>
                                    </i></a>
                                <div class="minicart">
                                    <div class="minicart-body">
                                        <div class="minicart-content">
                                            <ul class="text-left">
                                                <li>
                                                    <div class="minicart-img">
                                                        <a href="single-product-3.php" class="p-0"><img src="img/product/1.jpg" class="w-100" alt=""></a>
                                                    </div>
                                                    <div class="minicart-desc">
                                                        <a href="single-product-3.php" class="p-0">Capitalize on low hanging fruit
                                                            t</a>
                                                        <strong>1 × $250.00</strong>
                                                    </div>
                                                    <div class="remove">
                                                        <i class="fal fa-times"></i>
                                                    </div>
                                                </li>

                                                <li>
                                                    <div class="minicart-img">
                                                        <a href="single-product-3.php" class="p-0"><img src="img/product/2.jpg" class="w-100" alt=""></a>
                                                    </div>
                                                    <div class="minicart-desc">
                                                        <a href="single-product-3.php" class="p-0">Leather Courriere duffle ba</a>
                                                        <strong>1 × $150.00</strong>
                                                    </div>
                                                    <div class="remove">
                                                        <i class="fal fa-times"></i>
                                                    </div>
                                                </li>


                                                <li>
                                                    <div class="minicart-img">
                                                        <a href="single-product-3.php" class="p-0"><img src="img/product/3.jpg" class="w-100" alt=""></a>
                                                    </div>
                                                    <div class="minicart-desc">
                                                        <a href="single-product-3.php" class="p-0">Party Supplies Around Cupcake</a>
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
                                            <a href="cart.php" class="generic-btn black-hover-btn text-uppercase w-100 mb-20">View
                                                cart</a>
                                            <a href="checkout.php" class="generic-btn black-hover-btn text-uppercase w-100 mb-20">Checkout</a>
                                        </div>
                                    </div>
                                </div>
                            </li>

                               
                                
                                <li>
                                    <?php
                                    if (isset($_SESSION['login_Sess'])) {
                                        # code...
                                    ?>
                                        <a href="" class="account"><i class="fal fa-user-friends"></i>
                                            <article class="account-registar d-inline-block">
                                                <?php echo $_SESSION['CName']; ?>
                                            </article>
                                        </a>
                                        <ul class="submenu text-right">
                                            <li><a href="">My Account</a></li>
                                            <li><a href="shop.php">Shop</a></li>
                                            <li><a href="wishlist.php">Wishlist</a></li>
                                            <li><a href="logout.php">Log Out</a></li>
                                        </ul>
                                    </li>
                                    
                                    <?php
                                    } else {
                                        # code...
                                    ?>
                                        <a href="login.php" class="account"><i class="fal fa-user-friends"></i>
                                            <article class="account-registar d-inline-block">
                                                Login/Sign up
                                            </article>
                                        </a>
                                    <?php
                                    }

                                    ?>

                                </li>
                                
                            </ul>
                        </div>
                    </div>
                </div>
            </div>


            <div class="mobile-menu visible-sm">
                <div id="mobile-menu">
                    <ul>
                        <li><a  class="pl-3" href="javascript:void(0)">Home</a>
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
                        <li><a  class="pl-3" href="javascript:void(0)">Shop</a>
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


    <!-- contact-area start -->
    <section class="contact-area pb-30" data-background="assets/img/bg/bg-map.png">
        <div class="has-breadcrumb-bg mb-120" style="background-image: url('img/bg/3.jpg');">
            <div class="breadcrumb-content d-flex justify-content-center align-items-center" style="flex-direction: column;">
             <h2 class="title">Contact</h2>
             <nav aria-label="breadcrumb" class="mb-40">
                 <ol class="breadcrumb p-0 m-0">
                     <li class="breadcrumb-item"><a href="index2.php">Home</a></li>
                     <li class="breadcrumb-item active" aria-current="page">Contact</li>
                 </ol>
             </nav>
            </div>
         </div>
        <div class="container container-1430">
            <div class="row">
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="contact text-center mb-30">
                        <i class="fas fa-envelope"></i>
                        <h3>Mail Here</h3>
                        <p>Admin@BasicTheme.com</p>
                        <p>Info@Themepur.com</p>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4 col-md-4">
                    <div class="contact text-center mb-30">
                        <i class="fas fa-map-marker-alt"></i>
                        <h3>Visit Here</h3>
                        <p>27 Division St, New York, NY 10002,
                            Jaklina, United Kingpung</p>
                    </div>
                </div>
                <div class="col-xl-4  col-lg-4 col-md-4 ">
                    <div class="contact text-center mb-30">
                        <i class="fas fa-phone"></i>
                        <h3>Call Here</h3>
                        <p>+8 (123) 985 789</p>
                        <p>+787 878897 87</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-area end -->




    <!-- contact-form-area start -->
    <section class="contact-form-area grey-bg pt-100 pb-100">
        <div class="container container-1430">
            <div class="form-wrapper">
                <div class="row align-items-center">
                    <div class="col-xl-8 col-lg-8">
                        <div class="section-title mb-55">
                            <p><span></span> Anything On your Mind</p>
                            <h1>Estimate Your Idea</h1>
                        </div>
                    </div>
                    <div class="col-xl-4 col-lg-3 d-none d-xl-block ">
                        <div class="section-link mb-80 text-right">
                            <a class="btn theme-btn" href="tel:+8123985789"><i class="fas fa-phone"></i> make call</a>
                        </div>
                    </div>
                </div>
                <div class="contact-form">
                    <form id="give-form" method="POST" enctype="multipart/form-data">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="form-box user-icon mb-30">
                                    <input type="text" name="name" placeholder="Name of the product">
                                    <img src = img\logo\info-lg.svg> 
                                </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-box message-icon mb-30">
                                    <textarea name="description" id="description" cols="30" rows="10" placeholder="Description"></textarea>
                                </div>

                                <div class="form-box message-icon mb-30">
                                <input type="text"  placeholder="Upload Image" disabled>
                                    <input type="file" class="form-control" id="image" name="image"/>
                                </div>
                                
                                <div class="contact-btn text-center ">
                                    <button class="btn theme-btn" name="add" id="add" type="submit">get action</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <p class="ajax-response text-center"></p>
                </div>
            </div>
        </div>
    </section>

    <section class="contact-form-area pt-100 pb-100">
        <div class="container container-1430">
            <div class="row  service-row">
                <div class="col-md-4">
                    <div class="service-box service-box-2">
                        <div class="service-logo text-center">
                            <img src="img/logo/icon-1.jpg" alt="" class="service-img">
                        </div>
                        <div class="service-content text-center">
                            <h6 class="title">Creative Design</h6>
                            <p>Duis autem vel eum iriure dolor in hendrerit vulputate <br> velit esse molestie consequat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-box service-box-2">
                        <div class="service-logo text-center">
                            <img src="img/logo/icon-2.jpg" alt="" class="service-img">
                        </div>
                        <div class="service-content text-center">
                            <h6 class="title">Strong Branding</h6>
                            <p>Duis autem vel eum iriure dolor in hendrerit vulputate <br> velit esse molestie consequat.</p>
                        </div>
                    </div>
                </div>

                <div class="col-md-4">
                    <div class="service-box service-box-2">
                        <div class="service-logo text-center">
                            <img src="img/logo/icon-3.jpg" alt="" class="service-img">
                        </div>
                        <div class="service-content text-center">
                            <h6 class="title">Project Development</h6>
                            <p>Duis autem vel eum iriure dolor in hendrerit vulputate <br> velit esse molestie consequat.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- contact-form-area end -->









    <!-- footer section start -->
    <section class="footer">

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
                                <a href="single-product-4.php" class="all-feature">See all feature</a>
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

    
    <script src="js/main.js"></script>
</body>

</html>