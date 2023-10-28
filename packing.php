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
    <title>Packing</title>
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
                    <a href="index.php"><img src="https://www.hexaexpresindo.com/images/logo%20hexa.jpg"
                            alt="logo"></a>
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
                                        Invoice Kiriman</span></a>
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
                                <a href="penjualan.php" aria-expanded="true"><i class="fa fa-money"></i><span>Cek Tarif</span></a>
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
                            <h4 class="page-title pull-left">Packing</h4>
                            <ul class="breadcrumbs pull-left">
                                <li><a href="index.php">Home</a></li>
                                <li><span>Informasi Packing</span></li>
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
                <div class="col-lg-11">
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg1">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-menu"></i> Jumlah Kayu</div>
                                        <h2>
                                            <?php 
                                            include 'proses/koneksi.php'; 
                                            $query="SELECT SUM(jmlkayum - jmlkayuk) AS totalkayu FROM kayu"; 
                                            $result = mysqli_query($konek, $query);
                                            $row = mysqli_fetch_assoc($result);
                                            $total_kayu = $row['totalkayu'];
                                            echo $total_kayu;
                                            ?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg2">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-package"></i> Jumlah Kardus</div>
                                        <h2>
                                            <?php 
                                                include 'proses/koneksi.php'; 
                                                $query="SELECT SUM(jmlkardusm - jmlkardusk) AS totalkardus FROM kardus"; 
                                                $result = mysqli_query($konek, $query);
                                                $row = mysqli_fetch_assoc($result);
                                                $total_kardus = $row['totalkardus'];
                                                echo $total_kardus;?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 mb-3">
                            <div class="card">
                                <div class="seo-fact sbg3">
                                    <div class="p-4 d-flex justify-content-between align-items-center">
                                        <div class="seofct-icon"><i class="ti-bag"></i> Jumlah Karung</div>
                                        <h2>
                                            <?php 
                                                include 'proses/koneksi.php'; 
                                                $query="SELECT SUM(jmlkarungm - jmlkarungk) AS totalkarung FROM karung"; 
                                                $result = mysqli_query($konek, $query);
                                                $row = mysqli_fetch_assoc($result);
                                                $total_karung = $row['totalkarung'];
                                                echo $total_karung;?>
                                        </h2>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 mt-5">
                    <div class="card">
                        <div class="card-body">
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="home-tab" data-toggle="tab" href="#dataKayu"
                                        role="tab" aria-controls="home" aria-selected="true">Data Kayu</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#dataKardus" role="tab"
                                        aria-controls="profile" aria-selected="false">Data Kardus</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="profile-tab" data-toggle="tab" href="#dataKarung" role="tab"
                                        aria-controls="profile" aria-selected="false">Data Karung</a>
                                </li>
                            </ul>
                            <div class="tab-content mt-3" id="myTabContent">
                                <div class="tab-pane fade show active" id="dataKayu" role="tabpanel" aria-labelledby="home-tab">
                                    <div align="right">
                                        <a href="update-kayu.php" class="btn btn-rounded btn-primary mb-3">Update Data Kayu</a>
                                    </div>
                                    <h4 class="header-title">Riwayat Transaksi Kayu</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Waktu Input</th>
                                                    <th>Nama Petugas</th>
                                                    <th>Jumlah Kayu Masuk</th>
                                                    <th>Jumlah Kayu Keluar</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                include "proses/koneksi.php";

                                                // Menghitung jumlah total data
                                                $jumlah_data = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM kayu"));

                                                // Menentukan jumlah data per halaman
                                                $data_per_halaman = 10;

                                                // Menghitung jumlah halaman yang diperlukan
                                                $total_halamanKayu = ceil($jumlah_data / $data_per_halaman);

                                                // Mendapatkan halaman yang diminta dari parameter URL
                                                $halaman_sekarangKayu = isset($_GET['page']) ? $_GET['page'] : 1;

                                                // Menghitung offset
                                                $offset = ($halaman_sekarangKayu - 1) * $data_per_halaman;

                                                // Mengambil data sesuai dengan halaman yang diminta
                                                $query = "SELECT * FROM kayu ORDER BY waktu_input DESC LIMIT $offset, $data_per_halaman";
                                                $result = mysqli_query($konek, $query);

                                                $no = $offset + 1; // Inisialisasi nomor awal
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($data = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $data['waktu_input']; ?></td>
                                                    <td><?php echo $data['nama_petugas']; ?></td>
                                                    <td><?php echo $data['jmlkayum']; ?></td>
                                                    <td><?php echo $data['jmlkayuk']; ?></td>
                                                    <td><?php echo $data['ket']; ?></td>
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
                                                echo " <ul class='pagination'><li class='page-item'><a class='page-link' href='packing.php?page=".($halaman_sekarangKayu-1)."#dataKayu'>Previous</a></li>";
                                            }
                                            for ($i = 1; $i <= $total_halamanKayu; $i++) {
                                                $active = ($i == $halaman_sekarangKayu) ? "active" : "";?>
                                                <?php echo "<li class='page-item $active'><a class='page-link' href='packing.php?page=$i#dataKayu'>$i</a></li>";
                                            }
                                            if ($halaman_sekarangKayu < $total_halamanKayu) {
                                                echo "<li class='page-item'><a class='page-link' href='packing.php?page=".($halaman_sekarangKayu+1)."#dataKayu'>Next</a></li></ul>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="dataKardus" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div align="right">
                                        <a href="update-kardus.php" class="btn btn-rounded btn-primary mb-3">Update Data Kardus</a>
                                    </div>
                                    <h4 class="header-title">Riwayat Transaksi Kardus</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Waktu Input</th>
                                                    <th>Nama Petugas</th>
                                                    <th>Jumlah Kardus Masuk</th>
                                                    <th>Jumlah Kardus Keluar</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                include "proses/koneksi.php";

                                                // Menghitung jumlah total data
                                                $jumlah_data = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM kardus"));

                                                // Menentukan jumlah data per halaman
                                                $data_per_halaman = 10;

                                                // Menghitung jumlah halaman yang diperlukan
                                                $total_halamanKardus = ceil($jumlah_data / $data_per_halaman);

                                                // Mendapatkan halaman yang diminta dari parameter URL
                                                $halaman_sekarangKardus = isset($_GET['page']) ? $_GET['page'] : 1;

                                                // Menghitung offset
                                                $offset = ($halaman_sekarangKardus - 1) * $data_per_halaman;

                                                // Mengambil data sesuai dengan halaman yang diminta
                                                $query = "SELECT * FROM kardus ORDER BY waktu_input DESC LIMIT $offset, $data_per_halaman";
                                                $result = mysqli_query($konek, $query);

                                                $no = $offset + 1; // Inisialisasi nomor awal
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($data = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $data['waktu_input']; ?></td>
                                                    <td><?php echo $data['nama_petugas']; ?></td>
                                                    <td><?php echo $data['jmlkardusm']; ?></td>
                                                    <td><?php echo $data['jmlkardusk']; ?></td>
                                                    <td><?php echo $data['ket']; ?></td>
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
                                            if ($halaman_sekarangKardus > 1) {
                                                echo " <ul class='pagination'><li class='page-item'><a class='page-link' href='packing.php?page=".($halaman_sekarangKardus-1)."#dataKardus'>Previous</a></li>";
                                            }
                                            for ($i = 1; $i <= $total_halamanKardus; $i++) {
                                                $active = ($i == $halaman_sekarangKardus) ? "active" : "";?>
                                                <?php echo "<li class='page-item $active'><a class='page-link' href='packing.php?page=$i#dataKardus'>$i</a></li>";
                                            }
                                            if ($halaman_sekarangKardus < $total_halamanKardus) {
                                                echo "<li class='page-item'><a class='page-link' href='packing.php?page=".($halaman_sekarangKardus+1)."#dataKardus'>Next</a></li></ul>";
                                            }
                                        ?>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="dataKarung" role="tabpanel"
                                    aria-labelledby="profile-tab">
                                    <div align="right">
                                        <a href="update-karung.php" class="btn btn-rounded btn-primary mb-3">Update Data Karung</a>
                                    </div>
                                    <h4 class="header-title">Riwayat Transaksi Karung</h4>
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>No</th>
                                                    <th>Waktu Input</th>
                                                    <th>Nama Petugas</th>
                                                    <th>Jumlah Karung Masuk</th>
                                                    <th>Jumlah Karung Keluar</th>
                                                    <th>Keterangan</th>
                                                </tr>
                                            </thead>
                                            <?php
                                                include "proses/koneksi.php";

                                                // Menghitung jumlah total data
                                                $jumlah_data = mysqli_num_rows(mysqli_query($konek, "SELECT * FROM karung"));

                                                // Menentukan jumlah data per halaman
                                                $data_per_halaman = 10;

                                                // Menghitung jumlah halaman yang diperlukan
                                                $total_halamanKarung = ceil($jumlah_data / $data_per_halaman);

                                                // Mendapatkan halaman yang diminta dari parameter URL
                                                $halaman_sekarangKarung = isset($_GET['page']) ? $_GET['page'] : 1;

                                                // Menghitung offset
                                                $offset = ($halaman_sekarangKarung - 1) * $data_per_halaman;

                                                // Mengambil data sesuai dengan halaman yang diminta
                                                $query = "SELECT * FROM karung ORDER BY waktu_input DESC LIMIT $offset, $data_per_halaman";
                                                $result = mysqli_query($konek, $query);

                                                $no = $offset + 1; // Inisialisasi nomor awal
                                                if (mysqli_num_rows($result) > 0) {
                                                    while ($data = mysqli_fetch_array($result)) {
                                            ?>
                                                <tr>
                                                    <td><?php echo $no++ ?></td>
                                                    <td><?php echo $data['waktu_input']; ?></td>
                                                    <td><?php echo $data['nama_petugas']; ?></td>
                                                    <td><?php echo $data['jmlkarungm']; ?></td>
                                                    <td><?php echo $data['jmlkarungk']; ?></td>
                                                    <td><?php echo $data['ket']; ?></td>
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
                                            if ($halaman_sekarangKarung > 1) {
                                                echo " <ul class='pagination'><li class='page-item'><a class='page-link' href='packing.php?page=".($halaman_sekarangKarung-1)."#dataKarung'>Previous</a></li>";
                                            }
                                            for ($i = 1; $i <= $total_halamanKarung; $i++) {
                                                $active = ($i == $halaman_sekarangKarung) ? "active" : "";?>
                                                <?php echo "<li class='page-item $active'><a class='page-link' href='packing.php?page=$i#dataKarung'>$i</a></li>";
                                            }
                                            if ($halaman_sekarangKarung < $total_halamanKarung) {
                                                echo "<li class='page-item'><a class='page-link' href='packing.php?page=".($halaman_sekarangKarung+1)."#dataKarung'>Next</a></li></ul>";
                                            }
                                        ?>
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
</body>

</html>