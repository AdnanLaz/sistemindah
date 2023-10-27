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
    <title>Formulir Rekapan A.D.A</title>
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
                                <a href="packing.php" aria-expanded="true"><i class="fa fa-tags"></i><span>Packing</span></a>
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
                </div>
            </div>
            <!-- header area end -->
            <!-- page title area start -->
            <div class="page-title-area">
                <div class="row align-items-center">
                    <div class="col-sm-6">
                        <div class="breadcrumbs-area clearfix">
                            <h4 class="page-title pull-left">A.D.A Souvenir</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Tagihan A.D.A Souvenir</span></li>
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
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#daftarInvoice"
                                        role="tab" aria-controls="home" aria-selected="true">Daftar Invoice Kiriman</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#inputInvoice" role="tab"
                                        aria-controls="profile" aria-selected="false">Input Invoice Kiriman</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="daftarInvoice" role="tabpanel" aria-labelledby="home-tab">
                                    <br><br>
                                    <h4 class="header-title">Daftar Invoice Kiriman</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover" align="center">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Invoice Kiriman</th>
                                                    <th>Aksi</th>
                                                </tr>
                                            </thead>
                                            <div align="right">
                                                <a href="update-invoice.php" class="btn btn-rounded btn-primary mb-3">Update Data Invoice</a>
                                            </div>
                                            <?php
                                                include "proses/koneksi.php";

                                                // Menghitung jumlah total data
                                                $jumlah_data = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM invoice"));

                                                // Menentukan jumlah data per halaman
                                                $data_per_halaman = 10;

                                                // Menghitung jumlah halaman yang diperlukan
                                                $total_halamanKayu = ceil($jumlah_data / $data_per_halaman);

                                                // Mendapatkan halaman yang diminta dari parameter URL
                                                $halaman_sekarangKayu = isset($_GET['page']) ? $_GET['page'] : 1;

                                                // Menghitung offset
                                                $offset = ($halaman_sekarangKayu - 1) * $data_per_halaman;

                                                // Mengambil data sesuai dengan halaman yang diminta
                                                $query = "SELECT * FROM invoice ORDER BY waktu_input DESC LIMIT $offset, $data_per_halaman";
                                                $result = mysqli_query($konek, $query);

                                                $no = $offset + 1; // Inisialisasi nomor awal
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($data = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $data['nama_invoice']; ?></td>
                                                    <td><a href='srtdash/<?php echo $data['url']?>'><i class='ti-eye'>Test</i></a></td>
                                                </tr>
                                            <?php }
                                                } else {
                                                    echo "<tr><td colspan='6'>Tidak ada data yang ditemukan.</td></tr>";
                                                }
                                            ?>
                                        </table>
                                    </div>

                                    <!-- Menampilkan navigasi halaman -->
                                    <div class="pagination">
                                        <?php
                                            if ($halaman_sekarangKayu > 1) {
                                                echo " <ul class='pagination'><li class='page-item'><a class='page-link' href='form-ada.php?page=".($halaman_sekarangKayu-1)."#dataKayu'>Previous</a></li>";
                                            }
                                            for ($i = 1; $i <= $total_halamanKayu; $i++) {
                                                $active = ($i == $halaman_sekarangKayu) ? "active" : "";?>
                                                <?php echo "<li class='page-item $active'><a class='page-link' href='form-ada.php?page=$i#dataKayu'>$i</a></li>";
                                            }
                                            if ($halaman_sekarangKayu < $total_halamanKayu) {
                                                echo "<li class='page-item'><a class='page-link' href='form-ada.php?page=".($halaman_sekarangKayu+1)."#dataKayu'>Next</a></li></ul>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="inputInvoice" role="tabpanel" aria-labelledby="profile-tab">
                                    <br><br>
                                    <h4 class="header-title">Input Tagihan A.D.A Souvenir</h4>
                                    <form id="inputAda-form">
                                        <div class="form-group">
                                            <label for="example-date-input" class="col-form-label">Tanggal Form Ambilan</label>
                                            <input class="form-control" type="date" value="yy-mm-dd" id="tanggal" required>
                                        </div>
                                        <div class="input-group mb-3">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text">Rp.</span>
                                            </div>
                                            <input type="number" id="nominal" class="form-control" min="0"required>
                                        </div>
                                        <button type="button" onclick="inputAda()"class="btn btn-primary mt-4 pr-4 pl-4">Tambah</button>
                                    </form>
                                    <div class="main-content-inner">
                                        <div class="row">
                                            <div class="col-lg-6 col-ml-12">
                                                <div class="row">
                                                    <div class="col-12 mt-5">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <div id="hasilInput"></div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6 col-ml-12">
                                                <div class="row">
                                                    <div class="col-12 mt-5">
                                                        <div class="card">
                                                            <div class="card-body">
                                                                <h4 class="header-title">Jumlah Deposit</h4>
                                                                <form id="Deposit-form">
                                                                    <select id="jumlahInput" onchange="ubahJumlahInput()" class="form-control col-2">
                                                                        <option value="1">1</option>
                                                                        <option value="2">2</option>
                                                                        <option value="3">3</option>
                                                                    </select>
                                                                    <br>
                                                                    <div id="kolomInput"></div>
                                                                    <div align="right">
                                                                        <button id="submitButton" type="button" onclick="Deposit()"class="btn btn-secondary mt-4 pr-4 pl-4">Tambah</button>
                                                                    </div>
                                                                    
                                                                </form>
                                                            </div>
                                                            <button id="tombolCetak" type="button" onclick="cetakHasilInput()">Cetak</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

    <!-- start chart js -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.2/Chart.min.js"></script>
    <!-- start highcharts js -->
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <!-- start zingchart js -->
    <script src="https://cdn.zingchart.com/zingchart.min.js"></script>
    <script>
        zingchart.MODULESDIR = "https://cdn.zingchart.com/modules/";
        ZC.LICENSE = ["569d52cefae586f634c54f86dc99e6a9", "ee6b7db5b51705a13dc2339db3edaf6d"];
    </script>
    <!-- all line chart activation -->
    <script src="assets/js/line-chart.js"></script>
    <!-- all pie chart -->
    <script src="assets/js/pie-chart.js"></script>
    <!-- others plugins -->
    <script src="assets/js/plugins.js"></script>
    <script src="assets/js/scripts.js"></script>
    <script src="assets/js/proses.js"></script>
    <script>
        window.onload = function() {
            ubahJumlahInput();
        };
    </script>
</body>

</html>