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
            <a href="pages.html">
                <i class="iconly-Arrow-Left icli"></i>
                <div class="content">
                    <h2>Tabs</h2>
                </div>
            </a>
        </div>
    </header>
    <!-- header end -->

    <!-- section start -->
    <section class="alert-classic top-space section-b-space pt-0">
        <div class="tab-section">
            <ul class="nav nav-tabs theme-tab pl-15">
              <li class="nav-item">
                <button class="nav-link active" data-bs-toggle="tab" data-bs-target="#trending" type="button">Trending
                  Now</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#top" type="button">Top Picks</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#featured" type="button">Featured
                  Products</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#rated" type="button">Top Rated</button>
              </li>
              <li class="nav-item">
                <button class="nav-link" data-bs-toggle="tab" data-bs-target="#ship" type="button">Ready to ship</button>
              </li>
            </ul>
            <div class="tab-content px-15">
              <div class="tab-pane fade show active" id="trending">
                <div class="row gy-3 gx-3">
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/4.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/5.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/6.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/7.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/6.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/7.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="top">
                <div class="row gy-3 gx-3">
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/6.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/7.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/4.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/5.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="featured">
                <div class="row gy-3 gx-3">
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/7.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/4.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/5.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/6.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="rated">
                <div class="row gy-3 gx-3">
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/5.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/4.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/7.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/6.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <div class="tab-pane fade" id="ship">
                <div class="row gy-3 gx-3">
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/4.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/6.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/7.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="product-box ratio_square">
                      <div class="img-part">
                        <a href="product.html"><img src="assets/images/products/5.jpg" alt="" class="img-fluid bg-img"></a>
                        <div class="wishlist-btn">
                          <i class="iconly-Heart icli"></i>
                          <i class="iconly-Heart icbo"></i>
                          <div class="effect-group">
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                            <span class="effect"></span>
                          </div>
                        </div>
                      </div>
                      <div class="product-content">
                        <ul class="ratings">
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo"></i></li>
                          <li><i class="iconly-Star icbo empty"></i></li>
                        </ul>
                        <a href="product.html">
                          <h4>Blue Denim Jacket</h4>
                        </a>
                        <div class="price">
                          <h4>$32.00 <del>$35.00</del><span>20%</span></h4>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
    </section>
    <!-- section end -->


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
