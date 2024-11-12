<!doctype html>
<html lang="en" class="light-theme">


<!-- Mirrored from codervent.com/shopingo/demo/shopingo_V1/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 08 Nov 2023 06:49:00 GMT -->

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--favicon-->
    <link rel="icon" href="{{asset('assets/images/favicon-32x32.webp')}}" type="image/webp" />

    <!-- CSS files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cdn.jsdelivr.net/npm/%40fancyapps/ui/dist/fancybox.css') }}" />

    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500;600&amp;display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('cdn.jsdelivr.net/npm/bootstrap-icons%401.7.2/font/bootstrap-icons.css') }}">
    <!-- Plugins -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/slick/slick.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/plugins/slick/slick-theme.css') }}" />

    <link href="{{ asset('assets/css/style.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/css/dark-theme.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    

    <title>Shopingo</title>
</head>

<body>

    @if (session('msg') )
        <script>alert('{{session('msg')}}')</script>
    @endif
    <!--page loader-->
    <div class="loader-wrapper">
        <div
            class="d-flex justify-content-center align-items-center position-absolute top-50 start-50 translate-middle">
            <div class="spinner-border text-dark" role="status">
                <span class="visually-hidden">Loading...</span>
            </div>
        </div>
    </div>
    <!--end loader-->

    <!--start top header-->
    <header class="top-header">
        <nav class="navbar navbar-expand-xl w-100 navbar-dark container gap-3">
            <a class="navbar-brand d-none d-xl-inline" href="{{route('homepage')}}"><img src="{{asset('assets/images/logo.webp')}}"
                    class="logo-img" alt=""></a>
            <a class="mobile-menu-btn d-inline d-xl-none" href="javascript:;" data-bs-toggle="offcanvas"
                data-bs-target="#offcanvasNavbar">
                <i class="bi bi-list"></i>
            </a>
            <div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasNavbar">
                <div class="offcanvas-header">
                    <div class="offcanvas-logo"><img src="{{asset('assets/images/logo.webp')}}" class="logo-img" alt="">
                    </div>
                    <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas"
                        aria-label="Close"></button>
                </div>
                <div class="offcanvas-body primary-menu">
                    <ul class="navbar-nav justify-content-start flex-grow-1 gap-1">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('homepage') }}">Home</a>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="tv-shows.html"
                                data-bs-toggle="dropdown">
                                Categories
                            </a>
                            <div class="dropdown-menu dropdown-large-menu">
                                <div class="row">
                                    <div class="col-12 col-xl-4">
                                        <h6 class="large-menu-title">Fashion</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="javascript:;">Casual T-Shirts</a>
                                            </li>
                                            <li><a href="javascript:;">Formal Shirts</a>
                                            </li>
                                            <li><a href="javascript:;">Jackets</a>
                                            </li>
                                            <li><a href="javascript:;">Jeans</a>
                                            </li>
                                            <li><a href="javascript:;">Dresses</a>
                                            </li>
                                            <li><a href="javascript:;">Sneakers</a>
                                            </li>
                                            <li><a href="javascript:;">Belts</a>
                                            </li>
                                            <li><a href="javascript:;">Sports Shoes</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-12 col-xl-4">
                                        <h6 class="large-menu-title">Electronics</h6>
                                        <ul class="list-unstyled">
                                            <li><a href="javascript:;">Mobiles</a>
                                            </li>
                                            <li><a href="javascript:;">Laptops</a>
                                            </li>
                                            <li><a href="javascript:;">Macbook</a>
                                            </li>
                                            <li><a href="javascript:;">Televisions</a>
                                            </li>
                                            <li><a href="javascript:;">Lighting</a>
                                            </li>
                                            <li><a href="javascript:;">Smart Watch</a>
                                            </li>
                                            <li><a href="javascript:;">Galaxy Phones</a>
                                            </li>
                                            <li><a href="javascript:;">PC Monitors</a>
                                            </li>
                                        </ul>
                                    </div>
                                    <!-- end col-3 -->
                                    <div class="col-12 col-xl-4 d-none d-xl-block">
                                        <div class="pramotion-banner1">
                                            <img src="{{asset('assets/images/menu-img.webp')}}" class="img-fluid" alt="" />
                                        </div>
                                    </div>
                                    <!-- end col-3 -->
                                </div>
                                <!-- end row -->
                            </div>
                        </li>
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                Shop
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="cart.html">Shop Cart</a></li>
                                <li><a class="dropdown-item" href="wishlist.html">Wishlist</a></li>
                                <li><a class="dropdown-item" href="product-details.html">Product Details</a></li>
                                <li><a class="dropdown-item" href="payment-method.html">Payment Method</a></li>
                                <li><a class="dropdown-item" href="billing-details.html">Billing Details</a></li>
                                <li><a class="dropdown-item" href="address.html">Addresses</a></li>
                                <li><a class="dropdown-item" href="shop-grid.html">Shop Grid</a></li>
                                <li><a class="dropdown-item" href="shop-grid-type-4.html">Shop Grid 4</a></li>
                                <li><a class="dropdown-item" href="shop-grid-type-5.html">Shop Grid 5</a></li>
                                <li><a class="dropdown-item" href="search.html">Search</a></li>
                            </ul>
                        </li>

                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle dropdown-toggle-nocaret" href="javascript:;"
                                data-bs-toggle="dropdown">
                                Account
                            </a>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="account-dashboard.html">Dashboard</a></li>
                                <li><a class="dropdown-item" href="account-orders.html">My Orders</a></li>
                                <li><a class="dropdown-item" href="account-profile.html">My Profile</a></li>
                                <li><a class="dropdown-item" href="account-edit-profile.html">Edit Profile</a></li>
                                <li><a class="dropdown-item" href="account-saved-address.html">Addresses</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li>
                                <li><a class="dropdown-item" href="authentication-login.html">Login</a></li>
                                <li><a class="dropdown-item" href="authentication-register.html">Register</a></li>
                                <li><a class="dropdown-item" href="authentication-reset-password.html">Password</a>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </div>
            <ul class="navbar-nav secondary-menu flex-row">
                <li class="nav-item">
                    <a class="nav-link dark-mode-icon" href="javascript:;">
                        <div class="mode-icon">
                            <i class="bi bi-moon"></i>
                        </div>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.search')}}"><i class="bi bi-search"></i></a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.wishlist')}}"><i class="bi bi-suit-heart"></i></a>
                </li>
                <li class="nav-item" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                    <a class="nav-link position-relative" href="{{route('user.cart')}}">
                        <div class="cart-badge">8</div>
                        <i class="bi bi-basket2"></i>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('user.account_dashboard')}}"><i class="bi bi-person-circle"></i></a>
                </li>
            </ul>
        </nav>
    </header>
    <!--end top header-->
