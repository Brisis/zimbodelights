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
            <a href="profile.html">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Payments</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->


    <!-- save cards section start -->
    <section class="top-space save-card-section pt-0">
        <h2 class="page-title px-15">Saved Cards</h2>
        <div class="payment-slider slick-default overflow-hidden">
            <div>
                <div class="card-box blue-card">
                    <div class="card-top">
                        <h4>Credit Card</h4>
                        <h4 class="ms-auto">Bank Name</h4>
                    </div>
                    <img src="assets/svg/payment/chip.svg" class="img-fluid chip-img" alt="">
                    <div class="card-number">
                        <span>1234</span>
                        <span>5678</span>
                        <span>****</span>
                        <span>9123</span>
                    </div>
                    <div class="card-bottom">
                        <h4>Paige Turner</h4>
                        <div class="valid-threw">
                            <span>VALID <br>THRU</span>
                            <h6>XX/XX</h6>
                        </div>
                    </div>
                </div>
                <div class="card-buttons">
                    <a href="#">Remove</a>
                    <a href="#">Edit</a>
                </div>
            </div>
            <div>
                <div class="card-box yellow-card">
                    <div class="card-top">
                        <h4>Credit Card</h4>
                        <h4 class="ms-auto">Bank Name</h4>
                    </div>
                    <img src="assets/svg/payment/chip.svg" class="img-fluid chip-img" alt="">
                    <div class="card-number">
                        <span>1234</span>
                        <span>5678</span>
                        <span>****</span>
                        <span>9123</span>
                    </div>
                    <div class="card-bottom">
                        <h4>Paige Turner</h4>
                        <div class="valid-threw">
                            <span>VALID <br>THRU</span>
                            <h6>XX/XX</h6>
                        </div>
                    </div>
                </div>
                <div class="card-buttons">
                    <a href="#">Remove</a>
                    <a href="#">Edit</a>
                </div>
            </div>
            <div>
                <div class="card-box pink-card">
                    <div class="card-top">
                        <h4>Credit Card</h4>
                        <h4 class="ms-auto">Bank Name</h4>
                    </div>
                    <img src="assets/svg/payment/chip.svg" class="img-fluid chip-img" alt="">
                    <div class="card-number">
                        <span>1234</span>
                        <span>5678</span>
                        <span>****</span>
                        <span>9123</span>
                    </div>
                    <div class="card-bottom">
                        <h4>Paige Turner</h4>
                        <div class="valid-threw">
                            <span>VALID <br>THRU</span>
                            <h6>XX/XX</h6>
                        </div>
                    </div>
                </div>
                <div class="card-buttons">
                    <a href="#">Remove</a>
                    <a href="#">Edit</a>
                </div>
            </div>
        </div>
    </section>
    <div class="divider"></div>
    <!-- save cards section end -->


    <!-- wallet section start  -->
    <section class="px-15 pt-0 section-b-space">
        <div class="wallet-link-section">
            <h2 class="page-title">Wallets</h2>
            <ul>
                <li>
                    <img src="assets/images/wallet/paytm.png" class="img-fluid" alt="">
                    <div class="content">
                        <h4>Paytm Wallet</h4>
                        <h6>Balance: <span>$25.00</span></h6>
                    </div>
                    <a href="#">Delink</a>
                </li>
                <li>
                    <img src="assets/images/wallet/cash.png" class="img-fluid" alt="">
                    <div class="content">
                        <h4>Cash App</h4>
                        <h6>Balance: <span>$25.00</span></h6>
                    </div>
                    <a href="#">Delink</a>
                </li>
                <li>
                    <img src="assets/images/wallet/google.png" class="img-fluid" alt="">
                    <div class="content">
                        <h4>Google Wallet</h4>
                        <h6>Balance: <span>00</span></h6>
                    </div>
                    <a href="#">Delink</a>
                </li>
            </ul>
        </div>
    </section>
    <!-- wallet section emd  -->


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
