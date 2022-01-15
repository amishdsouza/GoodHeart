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
    $no_of_items = 0;
}


?>

<!doctype html>
<html class="no-js" lang="">
    <head>
        <style>
            #acart {
                pointer-events: none;
                cursor: default;
            }
        </style>
    </head>

<body>
    <!--[if lte IE 9]>

        <![endif]-->
    <!-- preloader -->
    <div id="loader-wrapper">
        <div id="loader"></div>
    </div>



    <section>
        <div class="shop-body mb-90">
            <div class="container-fluid">
                <div class="shop-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="filter-heading">
                                <div class="row">
                                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                        <div class="filter-shown-item">
                                            <p class="mb-0">Showing <span>1</span>–<span>24</span> of <span class="total_count">56</span> results</p>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-12">
                                        <div class="shop-filter-tab">
                                            <ul class="nav nav-pills">
                                                <li><span>Views</span></li>
                                                <li class="nav-item">
                                                    <a data-toggle="pill" href="#shop-tab-1" data-toggle="tooltip" data-placement="top" title="2 grid"><i class="fal fa-line-columns"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a data-toggle="pill" href="#shop-tab-2" data-placement="top" title="3 grid"><i class="fal fa-border-none"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a data-toggle="pill" href="#shop-tab-3" data-placement="top" title="4 grid" class="active"><i class="fal fa-border-center-v"></i></a>
                                                </li>
                                                <li class="nav-item">
                                                    <a data-toggle="pill" href="#shop-tab-4" data-placement="top" title="list view"><i class="fal fa-list"></i></a>
                                                </li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-12 d-flex justify-content-end position-static">
                                        <div class="sorting d-inline-block">
                                            <select name="sort" id="shop-sort">
                                                <option value="default">Default sorting</option>
                                                <option value="default">Short by popularity</option>
                                                <option value="default">Sort by average rating</option>
                                                <option value="default">Sort by latest</option>
                                                <option value="default">Sort by price: low to high</option>
                                                <option value="default">Sort by price: high to low</option>
                                            </select>
                                        </div>
                                        <div class="filter">
                                            <h6 class="d-inline-block filter-widget-toggle">Filter</h6>
                                            <div class="filter-popup">
                                                <div class="row">
                                                    <div class="col-xl-3 col-lg-3 col-md-6 col-sm-6 col-12 position-static">
                                                        <div class="widget">
                                                            <h4 class="mb-30">Popular Tags</h4>
                                                            <div class="category-list">
                                                                <ul>
                                                                    <li><a href="shop.php">Accessories</a></li>
                                                                    <li><a href="shop.php">Clothing</a></li>
                                                                    <li><a href="shop.php">fashion</a></li>
                                                                    <li><a href="shop.php">Fly</a></li>
                                                                    <li><a href="shop.php">Glasses</a></li>
                                                                    <li><a href="shop.php">men</a></li>
                                                                    <li><a href="shop.php">Product</a></li>
                                                                    <li><a href="shop.php">version</a></li>
                                                                    <li><a href="shop.php">women</a></li>
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

                            <!-- /. filter heading -->
                            <div class="filter-content">
                                <div class="tab-content">
                                    <div class="tab-pane fade" id="shop-tab-1">
                                        <div class="product-wrapper mt-55">
                                            <div class="row show_data"></div>

                                            <div class="text-center mt-20">
                                                <a href="shop.php" class="load-more">LOAD MORE...</a>
                                            </div>

                                            <div class="text-center mt-20" id="pagination">

                                            </div>

   
<header  class="header pt-85 pb-30  header-static" ></header>


                                        </div>
                                    </div>

                                    <div class="tab-pane fade" id="shop-tab-2">
                                        <div class="product-wrapper mt-55">
                                            <div class="row">
                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/5.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/5-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Light green crewnec...</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$58.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/4.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/4-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Tassels Pendant
                                                                    Earrings</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$85.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/7.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/7-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Shoes</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Sneaker</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Women</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Leather Courriere duffle
                                                                    bag</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$3.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/8.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/8-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                                <span class="sale bg-red text-white">sale!</span>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Shoes</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Sneaker</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Wood design bedroom
                                                                    clook</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$45-$10.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/4.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/4-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Tassels Pendant
                                                                    Earrings</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$85.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/9.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/9-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                                <span class="sale bg-red text-white">sale!</span>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Capitalize on low hanging
                                                                    fruit to</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$250.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/4.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/4-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Tassels Pendant
                                                                    Earrings</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$85.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/8.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/8-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                                <span class="sale bg-red text-white">sale!</span>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Shoes</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Sneaker</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Wood design bedroom
                                                                    clook</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$45-$10.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/6.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/6-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Handbag</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Handbag</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Coating design lighting
                                                                    lamp</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$7.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/4.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/4-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Tassels Pendant
                                                                    Earrings</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$85.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/7.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/7-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Shoes</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Sneaker</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Women</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Leather Courriere duffle
                                                                    bag</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$3.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-4 col-md-4 col-6">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/8.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/8-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                                <span class="sale bg-red text-white">sale!</span>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Shoes</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Sneaker</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Wood design bedroom
                                                                    clook</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$45-$10.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-20">
                                                <a href="shop.php" class="load-more">LOAD MORE...</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade  show active" id="shop-tab-3">
                                        <div class="product-wrapper mt-55">
                                            <div class="row">
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/5.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/5-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Light green crewnec...</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$58.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/4.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/4-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Tassels Pendant
                                                                    Earrings</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$85.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/7.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/7-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Shoes</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Sneaker</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Women</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Leather Courriere duffle
                                                                    bag</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$3.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/8.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/8-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                                <span class="sale bg-red text-white">sale!</span>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Shoes</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Sneaker</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Wood design bedroom
                                                                    clook</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$45-$10.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/4.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/4-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Tassels Pendant
                                                                    Earrings</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$85.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/9.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/9-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                                <span class="sale bg-red text-white">sale!</span>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Capitalize on low hanging
                                                                    fruit to</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$250.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>


                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/4.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/4-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Tassels Pendant
                                                                    Earrings</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$85.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/8.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/8-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                                <span class="sale bg-red text-white">sale!</span>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Shoes</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Sneaker</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Wood design bedroom
                                                                    clook</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$45-$10.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/6.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/6-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Handbag</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Handbag</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Coating design lighting
                                                                    lamp</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$7.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/4.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/4-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Woman</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Tassels Pendant
                                                                    Earrings</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$85.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/7.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/7-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Shoes</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Sneaker</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Women</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Leather Courriere duffle
                                                                    bag</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$3.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-xl-3 col-lg-3 col-md-4 col-sm-6 col-12">
                                                    <div class="product-box mb-40">
                                                        <div class="product-box-wrapper">
                                                            <div class="product-img">
                                                                <img src="img/product/8.jpg" class="w-100" alt="">
                                                                <a href="single-product-4.php" class="d-block">
                                                                    <div class="second-img">
                                                                        <img src="img/product/8-hover.jpg" alt="" class="w-100">
                                                                    </div>
                                                                </a>
                                                                <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                    view</a>
                                                                <span class="sale bg-red text-white">sale!</span>
                                                            </div>

                                                            <div class="product-desc pb-20">
                                                                <div class="product-desc-top">
                                                                    <div class="categories">
                                                                        <a href="shop.php" class="product-category"><span>Shoes</span></a>
                                                                        <a href="shop.php" class="product-category"><span>Sneaker</span></a>
                                                                    </div>
                                                                    <a href="wishlist.php" class="wishlist float-right"><span><i class="fal fa-heart"></i></span></a>
                                                                </div>
                                                                <a href="single-product-4.php" class="product-title">Wood design bedroom
                                                                    clook</a>
                                                                <div class="price-switcher">
                                                                    <span class="price switcher-item">$45-$10.00</span>
                                                                    <a href="cart.php" class="add-cart text-capitalize switcher-item">+add
                                                                        to cart</a>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="text-center mt-20">
                                                <a href="shop.php" class="load-more">LOAD MORE...</a>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="tab-pane fade" id="shop-tab-4">
                                        <div class="product-wrapper mt-55">
                                            <div class="product-box mb-40">
                                                <div class="product-box-wrapper">
                                                    <div class="list-product mb-50">
                                                        <div class="list-product-wrapper">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                                    <div class="list-product-img">
                                                                        <div class="product-img">
                                                                            <img src="img/product/8.jpg" class="w-100" alt="">
                                                                            <a href="single-product-4.php" class="d-block">
                                                                                <div class="second-img">
                                                                                    <img src="img/product/8-hover.jpg" alt="" class="w-100">
                                                                                </div>
                                                                            </a>
                                                                            <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                                view</a>
                                                                            <span class="sale bg-red text-white">sale!</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8 col-md-8">
                                                                    <div class="list-product-desc">
                                                                        <h3><a href="single-product-4.php" class="title mb-15">Blandit vel eros condimentum ulla</a></h3>
                                                                        <div class="rating">
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        </div>
                                                                        <div class="price"><span>$90.00</span></div>
                                                                        <div class="desc">
                                                                            <p>Typi non habent claritatem insitam, est usus
                                                                                legentis in iis qui facit eorum claritatem.
                                                                                Investigationes demonstraverunt lectores legere
                                                                                me lius quod ii legunt saepius. Claritas est
                                                                                etiam processus A Capitalize on low hanging
                                                                                fruit to identify a ballpark value added
                                                                                activity to beta test. Override the digital
                                                                                divide with additional clickthroughs from DevOps
                                                                                […]</p>
                                                                            <ul>
                                                                                <li>– Light green crewneck sweatshirt.</li>
                                                                                <li>– Hand pockets.</li>
                                                                                <li>– Relaxed fit.</li>
                                                                            </ul>
                                                                            <a href="cart.php" class="list-add-cart-btn text-capitalize mt-40">+add
                                                                                to cart</a>
                                                                            <a href="wishlist.php" data-toggle="tooltip" data-placement="top" title="wishlist"><span><i class="fal fa-heart"></i></span></a>
                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="compare"><span><i class="fal fa-abacus"></i></span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /. list product -->
                                                </div>
                                            </div>
                                            <div class="product-box mb-40">
                                                <div class="product-box-wrapper">
                                                    <div class="list-product mb-50">
                                                        <div class="list-product-wrapper">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                                    <div class="list-product-img">
                                                                        <div class="product-img">
                                                                            <img src="img/product/9.jpg" class="w-100" alt="">
                                                                            <a href="single-product-4.php" class="d-block">
                                                                                <div class="second-img">
                                                                                    <img src="img/product/9-hover.jpg" alt="" class="w-100">
                                                                                </div>
                                                                            </a>
                                                                            <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                                view</a>
                                                                            <span class="sale bg-red text-white">sale!</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8 col-md-8">
                                                                    <div class="list-product-desc">
                                                                        <h3><a href="single-product-4.php" class="title mb-15">Blossom Porcelain Side Plates</a></h3>
                                                                        <div class="rating">
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        </div>
                                                                        <div class="price"><span class="red-color">$399</span><del>$499</del></div>
                                                                        <div class="desc">
                                                                            <p>Typi non habent claritatem insitam, est usus
                                                                                legentis in iis qui facit eorum claritatem.
                                                                                Investigationes demonstraverunt lectores legere
                                                                                me lius quod ii legunt saepius. Claritas est
                                                                                etiam processus A Capitalize on low hanging
                                                                                fruit to identify a ballpark value added
                                                                                activity to beta test. Override the digital
                                                                                divide with additional clickthroughs from DevOps
                                                                                […]</p>
                                                                            <ul>
                                                                                <li>– Light green crewneck sweatshirt.</li>
                                                                                <li>– Hand pockets.</li>
                                                                                <li>– Relaxed fit.</li>
                                                                            </ul>
                                                                            <a href="cart.php" class="list-add-cart-btn text-capitalize mt-40">+add
                                                                                to cart</a>
                                                                            <a href="wishlist.php" data-toggle="tooltip" data-placement="top" title="wishlist"><span><i class="fal fa-heart"></i></span></a>
                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="compare"><span><i class="fal fa-abacus"></i></span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /. list product -->
                                                </div>
                                            </div>
                                            <div class="product-box mb-40">
                                                <div class="product-box-wrapper">
                                                    <div class="list-product mb-50">
                                                        <div class="list-product-wrapper">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                                    <div class="list-product-img">
                                                                        <div class="product-img">
                                                                            <img src="img/product/farniture-1.jpg" class="w-100" alt="">
                                                                            <a href="single-product-4.php" class="d-block">
                                                                                <div class="second-img">
                                                                                    <img src="img/product/farniture-1-hover.jpg" alt="" class="w-100">
                                                                                </div>
                                                                            </a>
                                                                            <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                                view</a>
                                                                            <span class="sale bg-red text-white">sale!</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8 col-md-8">
                                                                    <div class="list-product-desc">
                                                                        <h3><a href="single-product-4.php" class="title mb-15">Blossom Porcelain Side Platess</a></h3>
                                                                        <div class="rating">
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        </div>
                                                                        <div class="price"><span class="red-color">$399</span><del>$499</del></div>
                                                                        <div class="desc">
                                                                            <p>Typi non habent claritatem insitam, est usus
                                                                                legentis in iis qui facit eorum claritatem.
                                                                                Investigationes demonstraverunt lectores legere
                                                                                me lius quod ii legunt saepius. Claritas est
                                                                                etiam processus A Capitalize on low hanging
                                                                                fruit to identify a ballpark value added
                                                                                activity to beta test. Override the digital
                                                                                divide with additional clickthroughs from DevOps
                                                                                […]</p>
                                                                            <ul>
                                                                                <li>– Light green crewneck sweatshirt.</li>
                                                                                <li>– Hand pockets.</li>
                                                                                <li>– Relaxed fit.</li>
                                                                            </ul>
                                                                            <a href="cart.php" class="list-add-cart-btn text-capitalize mt-40">+add
                                                                                to cart</a>
                                                                            <a href="wishlist.php" data-toggle="tooltip" data-placement="top" title="wishlist"><span><i class="fal fa-heart"></i></span></a>
                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="compare"><span><i class="fal fa-abacus"></i></span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /. list product -->
                                                </div>
                                            </div>
                                            <div class="product-box mb-40">
                                                <div class="product-box-wrapper">
                                                    <div class="list-product mb-50">
                                                        <div class="list-product-wrapper">
                                                            <div class="row">
                                                                <div class="col-xl-4 col-lg-4 col-md-4">
                                                                    <div class="list-product-img">
                                                                        <div class="product-img">
                                                                            <img src="img/product/farniture-2.jpg" class="w-100" alt="">
                                                                            <a href="single-product-4.php" class="d-block">
                                                                                <div class="second-img">
                                                                                    <img src="img/product/farniture-2-hover.jpg" alt="" class="w-100">
                                                                                </div>
                                                                            </a>
                                                                            <a href="javascript:void(0)" class="product-img-link quick-view-1 text-capitalize">Quick
                                                                                view</a>
                                                                            <span class="sale bg-red text-white">sale!</span>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="col-xl-8 col-lg-8 col-md-8">
                                                                    <div class="list-product-desc">
                                                                        <h3><a href="single-product-4.php" class="title mb-15">Blandit vel eros condimentum ulla</a></h3>
                                                                        <div class="rating">
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star active"></i>
                                                                            <i class="fal fa-star"></i>
                                                                        </div>
                                                                        <div class="price"><span>$90.00</span></div>
                                                                        <div class="desc">
                                                                            <p>Typi non habent claritatem insitam, est usus
                                                                                legentis in iis qui facit eorum claritatem.
                                                                                Investigationes demonstraverunt lectores legere
                                                                                me lius quod ii legunt saepius. Claritas est
                                                                                etiam processus A Capitalize on low hanging
                                                                                fruit to identify a ballpark value added
                                                                                activity to beta test. Override the digital
                                                                                divide with additional clickthroughs from DevOps
                                                                                […]</p>
                                                                            <ul>
                                                                                <li>– Light green crewneck sweatshirt.</li>
                                                                                <li>– Hand pockets.</li>
                                                                                <li>– Relaxed fit.</li>
                                                                            </ul>
                                                                            <a href="cart.php" class="list-add-cart-btn text-capitalize mt-40">+add
                                                                                to cart</a>
                                                                            <a href="wishlist.php" data-toggle="tooltip" data-placement="top" title="wishlist"><span><i class="fal fa-heart"></i></span></a>
                                                                            <a href="javascript:void(0)" data-toggle="tooltip" data-placement="top" title="compare"><span><i class="fal fa-abacus"></i></span></a>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- /. list product -->
                                                </div>
                                            </div>
                                            <!-- /. product box -->
                                            <div class="text-center mt-20">
                                                <a href="shop.php" class="load-more">LOAD MORE...</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /. filter content -->
                        </div>
                        <!-- /. shop products -->
                    </div>
                </div>
            </div>
        </div>
    </div>
<section>

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
                                                <li><a href="shop.php">Shop</a></li>
                                                <li><a href="wishlist.php">Wishlist</a></li>
                                                <li><a href="question.php">Frequently</a></li>
                                            </ul>
                                        </div>
                                    </div>

                                    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-4 col-6">
                                        <div class="footer-menu">
                                            <ul>
                                                <li><a href="javascript:void(0)" class="title">Quick Links</a></li>
                                                <li><a href="shop.php">Special Offers</a></li>
                                                <li><a href="shop.php">Gift Cards</a></li>
                                                <li><a href="shop.php">F21 Red</a></li>
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
                                                <li><a href="shop.php">Find a Store</a></li>
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
                                <a href="single-product-4.php" class="all-feature">See all feature</a>
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



    <script src="js/main.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            load_data();

            function load_data(page) {
                $.ajax({
                    url: "ajax/load_data.php",
                    method: "POST",
                    data: {
                        page: page
                    },
                    dataType: "JSON",
                    success: function(data) {
                        $(".show_data").html(data.output);
                        $("#pagination").html(data.pagination);
                    }
                });
            }

            $(document).on("click", ".pagination a", function(event) {
                event.preventDefault();
                var id = $(this).attr("id");
                load_data(id);
            });


            function show_mycart() {
                $.ajax({
                    url: "ajax/show_mycart.php",
                    method: "POST",
                    dataType: "JSON",
                    success: function(data) {
                        $("#cart").text(data.da);
                    }
                });
            }
        });

        $(document).on("click", ".add_cart", function(event) {
            event.preventDefault();
            var id = $(this).attr("id");
            var name = $("#name" + id + "").val();
            var price = $("#description" + id + "").val();
            var action = "add";
            $.ajax({
                url: "ajax/cart_action.php",
                method: "POST",
                dataType: "JSON",
                data: {
                    id: id,
                    name: name,
                    description: description,
                    action: action
                },
                success: function(data) {}
            });
        });
    </script>

</body>

</html>