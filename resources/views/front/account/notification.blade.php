<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="ZimboDelights">
    <meta name="keywords" content="ZimboDelights">
    <meta name="author" content="ZimboDelights">
    <link rel="manifest" href="./manifest.json">
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <title>ZimboDelights PWA App</title>
    <link rel="icon" href="assets/images/favicon.png" type="image/x-icon" />
    <link rel="apple-touch-icon" href="assets/images/favicon.png">
    <meta name="theme-color" content="#ff4c3b" />
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <meta name="apple-mobile-web-app-title" content="ZimboDelights">
    <meta name="msapplication-TileImage" content="assets/images/favicon.png">
    <meta name="msapplication-TileColor" content="#FFFFFF">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />

    <!--Google font-->
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

    <!-- bootstrap css -->
    <link rel="stylesheet" id="rtl-link" type="text/css" href="assets/css/vendors/bootstrap.css">

    <!-- slick css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick-theme.css">
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/slick.css">

    <!-- iconly css -->
    <link rel="stylesheet" type="text/css" href="assets/css/vendors/iconly.css">

    <!-- Theme css -->
    <link rel="stylesheet" id="change-link" type="text/css" href="assets/css/style.css">

</head>

<body>


    <!-- loader strat -->
    <div class="loader">
        <span></span>
        <span></span>
    </div>
    <!-- loader end -->


    <!-- header start -->
    <header>
        <div class="back-links">
            <a href="index.html">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>notification</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->


    <!-- tab section start -->
    <section class="pt-0 tab-section section-b-space">
        <div class="title-section px-15">
            <h2>Find your Style</h2>
            <h3>Super Summer Sale</h3>
        </div>

        <div class="px-15">
            <ul class="filter-title" id="filterOptions">
                <li class="active"><a href="#" class="all">All</a></li>
                <li><a href="#" class="order">Order Info</a></li>
                <li><a href="#" class="offers">Offers</a></li>
                <li><a href="#" class="payment">Payment</a></li>
                <li><a href="#" class="return">return</a></li>
            </ul>

            <div id="ourHolder" class="filter-content">
                <div class="item order">
                    <div class="media">
                        <img src="assets/images/notification/1.jpg" class="img-fluid" alt="">
                        <div class="media-body">
                            <h4>Exclusive Brand Day Sale!! HURRY, LIMITED period offer!</h4>
                            <h6 class="content-color">10 July, 2021</h6>
                        </div>
                    </div>
                </div>
                <div class="item offers">
                    <div class="media">
                        <img src="assets/images/notification/2.jpg" class="img-fluid" alt="">
                        <div class="media-body">
                            <h4>Order Placed successfully. It will be delivered on Mon 15 July, 2021</h4>
                            <h6 class="content-color">5 July, 2021</h6>
                        </div>
                    </div>
                </div>
                <div class="item order">
                    <div class="media">
                        <img src="assets/images/notification/3.jpg" class="img-fluid" alt="">
                        <div class="media-body">
                            <h4>We have got coupons. collect now and save extras !!!</h4>
                            <h6 class="content-color">5 June, 2021</h6>
                        </div>
                    </div>
                </div>
                <div class="item payment">
                    <div class="media">
                        <img src="assets/images/notification/4.jpg" class="img-fluid" alt="">
                        <div class="media-body">
                            <h4>Payment Failed. You can retry making a payment on order sections.</h4>
                            <h6 class="content-color">20 April, 2021</h6>
                        </div>
                    </div>
                </div>
                <div class="item payment">
                    <div class="media">
                        <img src="assets/images/notification/5.jpg" class="img-fluid" alt="">
                        <div class="media-body">
                            <h4>Exclusive Brand Day Sale!! HURRY, LIMITED period offer!</h4>
                            <h6 class="content-color">10 July, 2021</h6>
                        </div>
                    </div>
                </div>
                <div class="item offers">
                    <div class="media">
                        <img src="assets/images/notification/6.jpg" class="img-fluid" alt="">
                        <div class="media-body">
                            <h4>Your order is delivered on time. for any further assistance please contact us. </h4>
                            <h6 class="content-color">5 July, 2021</h6>
                        </div>
                    </div>
                </div>
                <div class="item order">
                    <div class="media">
                        <img src="assets/images/notification/3.jpg" class="img-fluid" alt="">
                        <div class="media-body">
                            <h4>We have got coupons. collect now and save extras !!!</h4>
                            <h6 class="content-color">5 June, 2021</h6>
                        </div>
                    </div>
                </div>
                <div class="item payment">
                    <div class="media">
                        <img src="assets/images/notification/4.jpg" class="img-fluid" alt="">
                        <div class="media-body">
                            <h4>Payment Failed. You can retry making a payment on order sections.</h4>
                            <h6 class="content-color">20 April, 2021</h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- tab section end -->

    <!-- latest jquery-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick.js"></script>

    <!-- Filter js -->
    <script src="assets/js/filter.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>

</body>

</html>
