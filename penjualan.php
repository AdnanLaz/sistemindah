<?php
    session_start();
    $username=$_SESSION['username'];
    
    if (empty($_SESSION['username'])) {
        header("location:login2.html?pesan=belum.login");
    }
?>
<!doctype html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <title>Penjualan</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="assets/images/icon/favicon.ico">
    <link rel="stylesheet" href="assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/themify-icons.css">
    <link rel="stylesheet" href="assets/css/metisMenu.css">
    <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="assets/css/slicknav.min.css">
    <!-- amchart css -->
    <link rel="stylesheet" href="https://www.amcharts.com/lib/3/plugins/export/export.css" type="text/css"
        media="all" />
    <!-- others css -->
    <link rel="stylesheet" href="assets/css/typography.css">
    <link rel="stylesheet" href="assets/css/default-css.css">
    <link rel="stylesheet" href="assets/css/styles.css">
    <link rel="stylesheet" href="assets/css/responsive.css">
    <!-- modernizr css -->
    <script src="assets/js/vendor/modernizr-2.8.3.min.js"></script>
</head>

<body>
    <!--[if lt IE 8]>
            <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->
    <!-- preloader area start -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- preloader area end -->
    <!-- page container area start -->
    <div class="page-container">
        <!-- sidebar menu area start -->
        <div class="sidebar-menu">
            <div class="sidebar-header">
                <div class="logo">
                    <a href="index.php"><img src="https://www.hexaexpresindo.com/images/logo%20hexa.jpg" alt="logo"></a>
                </div>
            </div>
            <div class="main-menu">
                <div class="menu-inner">
                    <nav>
                        <ul class="metismenu" id="menu">
                            <li>
                                <a href="index.php" aria-expanded="true"><i
                                        class="ti-dashboard"></i><span>dashboard</span></a>
                            </li>
                            <li>
                                <a href="javascript:void(0)" aria-expanded="true"><i class="ti-file"></i><span>Rekapan
                                        Data Kiriman</span></a>
                                <ul class="collapse">
                                    <li><a href="form-ada.php">A.D.A Souvenir</a></li>
                                    <li><a href="index3-horizontalmenu.html">Nura Souvenir</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="packing.php" aria-expanded="true"><i
                                        class="fa fa-tags"></i><span>Packing</span></a>
                            </li>
                            <li>
                                <a href="penjualan.php" aria-expanded="true"><i
                                        class="fa fa-money"></i><span>Penjualan</span></a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
        <!-- sidebar menu area end -->
        <!-- main content area start -->
        <div class="main-content">
            <!-- header area start -->
            <div class="header-area">
                <div class="row align-items-center">
                    <!-- nav and search button -->
                    <div class="col-md-6 col-sm-8 clearfix">
                        <div class="nav-btn pull-left">
                            <span></span>
                            <span></span>
                            <span></span>
                        </div>
                        <div class="search-box pull-left">
                            <form action="#">
                                <input type="text" name="search" placeholder="Search..." required>
                                <i class="ti-search"></i>
                            </form>
                        </div>
                    </div>
                    <!-- profile info & task notification -->
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">Penjualan</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Informasi Transaksi Penjualan</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 clearfix">
                        <div class="user-profile pull-right">
                            <img class="avatar user-thumb" src="assets/images/author/avatar.png" alt="avatar">
                            <h4 class="user-name dropdown-toggle" data-toggle="dropdown">
                                <?php
                                    include 'proses/koneksi.php';
                                    $username = $_SESSION['username'];
                                    $query= mysqli_query($konek, "SELECT * FROM admins WHERE username='$username' ");
                                    while($data=mysqli_fetch_array($query)){?>
                                <?php echo $data['nama'];?>
                                <?php } ?>
                                <i class="fa fa-angle-down"></i>
                            </h4>
                            <div class="dropdown-menu">
                                <a class="dropdown-item" href="proses/logout.php">Log Out</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- page title area end -->
            <div class="main-content-inner">
                <br><br>
                <div class="row">
                    <div class="col-xl-3 col-ml-6 col-mdl-4 col-sm-6 mt-5">
                        <div class="card">
                            <div class="pricing-list">
                                <div class="prc-head">
                                    <h4>Membership</h4>
                                </div>
                                <div class="prc-list">
                                    <ul>
                                        <li><a href="#">Term financing</a></li>
                                        <li><a href="#">Access up to $10,000</a></li>
                                        <li><a href="#">Get: USD</a></li>
                                        <li><a href="#">3-24 Month Terms</a></li>
                                        <li class="bold"><a href="#">1 SALT/year</a></li>
                                    </ul>
                                    <a href="#">Buy Package</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-ml-6 col-mdl-4 col-sm-6 mt-5">
                        <div class="card">
                            <div class="pricing-list">
                                <div class="prc-head">
                                    <h4>Premier</h4>
                                </div>
                                <div class="prc-list">
                                    <ul>
                                        <li><a href="#">Term Finnacing & Line of Credit</a></li>
                                        <li><a href="#">Access up to $10,000</a></li>
                                        <li><a href="#">Get: USD, EUR, GBP, JPY, RMB</a></li>
                                        <li><a href="#">1 hour - 36 Month Terms</a></li>
                                        <li class="bold"><a href="#">30 SALT/year</a></li>
                                    </ul>
                                    <a href="#">Buy Package</a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-ml-6 col-mdl-4 col-sm-6 mt-5">
                        <div class="card">
                            <div class="pricing-list">
                                <div class="prc-head">
                                    <h4>Enterprise</h4>
                                </div>
                                <div class="prc-list">
                                    <ul>
                                        <li><a href="#">Term Finnacing & Line of Credit</a></li>
                                        <li><a href="#">Access up to $10,000</a></li>
                                        <li><a href="#">Get: Ad Hoc Currency Selection</a></li>
                                        <li><a href="#">24 hour - 1 Year Terms</a></li>
                                        <li class="bold"><a href="#">Contact for Pricing</a></li>
                                    </ul>
                                    <a href="#">Buy Package</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main content area end -->
            <!-- footer area start-->
            <footer>
                <div class="footer-area">
                    <p>© Copyright 2023. TANGGUOK APEK TEAM.</p>
                </div>
            </footer>
            <!-- footer area end-->
        </div>
        <!-- offset area end -->
        <!-- jquery latest version -->
        <script src="assets/js/vendor/jquery-2.2.4.min.js"></script>
        <!-- bootstrap 4 js -->
        <script src="assets/js/popper.min.js"></script>
        <script src="assets/js/bootstrap.min.js"></script>
        <script src="assets/js/owl.carousel.min.js"></script>
        <script src="assets/js/metisMenu.min.js"></script>
        <script src="assets/js/jquery.slimscroll.min.js"></script>
        <script src="assets/js/jquery.slicknav.min.js"></script>
        <!-- all line chart activation -->
        <script src="assets/js/line-chart.js"></script>
        <!-- all pie chart -->
        <script src="assets/js/pie-chart.js"></script>
        <!-- others plugins -->
        <script src="assets/js/plugins.js"></script>
        <script src="assets/js/scripts.js"></script>
</body>

</html>