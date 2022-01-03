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
                    <h2>settings</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->


    <!-- section start -->
    <section class="px-15 top-space pt-0 ratio_40">
        <div class="help-img rounded-1">
            <img src="assets/images/setting.jpg" class="img-fluid bg-img bg-top" alt="">
        </div>
    </section>
    <!-- section end -->


    <!-- setting section start -->
    <section class="px-15 pt-3">
        <h2 class="mb-2">Settings</h2>
        <div class="row">
            <div class="form-group toggle-sec col-12 mb-3">
                <label>Dark <span>Lorem ipsum dolor sit amet
                    </span></label>
                <div class="button toggle-btn">
                    <input id="darkButton" type="checkbox" class="checkbox">
                    <div class="knobs">
                        <span></span>
                    </div>
                    <div class="layer"></div>
                </div>
            </div>
            <div class="form-group toggle-sec col-12 mb-3">
                <label>RTL
                    <span>Lorem ipsum dolor sit amet</span>
                </label>
                <div class="button toggle-btn">
                    <input id="rtlButton" type="checkbox" class="checkbox">
                    <div class="knobs">
                        <span></span>
                    </div>
                    <div class="layer"></div>
                </div>
            </div>
            <div class="form-group toggle-sec col-12">
                <label>Notification
                    <span>Lorem ipsum dolor sit amet</span>
                </label>
                <div class="button toggle-btn">
                    <input type="checkbox" class="checkbox">
                    <div class="knobs">
                        <span></span>
                    </div>
                    <div class="layer"></div>
                </div>
            </div>
        </div>
    </section>
    <!-- setting section end -->



    <!-- panel space start -->
    <section class="panel-space"></section>
    <!-- panel space end -->


    <!-- bottom panel start -->
    <div class="bottom-panel">
        <ul>
            <li>
                <a href="index.html">
                    <div class="icon">
                        <i class="iconly-Home icli"></i>
                        <i class="iconly-Home icbo"></i>
                    </div>
                    <span>home</span>
                </a>
            </li>
            <li>
                <a href="category.html">
                    <div class="icon">
                        <i class="iconly-Category icli"></i>
                        <i class="iconly-Category icbo"></i>
                    </div>
                    <span>category</span>
                </a>
            </li>
            <li>
                <a href="cart.html">
                    <div class="icon">
                        <i class="iconly-Buy icli"></i>
                        <i class="iconly-Buy icbo"></i>
                    </div>
                    <span>cart</span>
                </a>
            </li>
            <li>
                <a href="wishlist.html">
                    <div class="icon">
                        <i class="iconly-Heart icli"></i>
                        <i class="iconly-Heart icbo"></i>
                    </div>
                    <span>wishlist</span>
                </a>
            </li>
            <li>
                <a href="profile.html">
                    <div class="icon">
                        <i class="iconly-Profile icli"></i>
                        <i class="iconly-Profile icbo"></i>
                    </div>
                    <span>profile</span>
                </a>
            </li>
        </ul>
    </div>
    <!-- bottom panel end -->


    <!-- latest jquery-->
    <script src="assets/js/jquery-3.3.1.min.js"></script>

    <!-- Bootstrap js-->
    <script src="assets/js/bootstrap.bundle.min.js"></script>

    <!-- Slick js-->
    <script src="assets/js/slick.js"></script>

    <!-- script js -->
    <script src="assets/js/script.js"></script>

</body>

</html>
