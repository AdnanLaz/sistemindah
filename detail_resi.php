<?php
    session_start();
    $username=$_SESSION['username'];
    
    if (empty($_SESSION['username'])) {
        header("location:login/login.php?pesan=belum.login");
    }
?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>Detail Jumlah Resi</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- site icon -->
      <link rel="icon" href="images/images.png" type="image/png" />
      <!-- bootstrap css -->
      <link rel="stylesheet" href="css/bootstrap.min.css" />
      <!-- site css -->
      <link rel="stylesheet" href="style.css" />
      <!-- responsive css -->
      <link rel="stylesheet" href="css/responsive.css" />
      <!-- color css -->
      <link rel="stylesheet" href="css/colors.css" />
      <!-- select bootstrap -->
      <link rel="stylesheet" href="css/bootstrap-select.css" />
      <!-- scrollbar css -->
      <link rel="stylesheet" href="css/perfect-scrollbar.css" />
      <!-- custom css -->
      <link rel="stylesheet" href="css/custom.css" />
      <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
      <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
      <![endif]-->
   </head>
   <body class="dashboard dashboard_1">
      <div class="full_container">
         <div class="inner_container">
            <!-- Sidebar  -->
            <nav id="sidebar">
            <div class="sidebar_blog_1">
                  <center>
                  <div class="sidebar_user_info">
                     <br>
                     <a href="index.php"><img src="images/layout_img/indahonline.png" class="rounded-circle" width="200px"></a>
                  </div>
                  </center>
               </div>
               <div class="sidebar_blog_2">
                  <div class="wrapper">
                     <div class="search-input">
                        <a href="" hidden></a>
                        <input type="text" class="form-control"placeholder="Cari Menu">
                        <div class="autocom-box">
                           <!-- here list are inserted from javascript -->
                     </div>
                     <div class="icon"><i class="fa fa-search"></i></div>
                  </div>
               </div>
                  <ul class="list-unstyled components">
                     <li class="active">
                        <a href="#dashboard" data-toggle="collapse" aria-expanded="false" class="dropdown-toggle"><i class="fa fa-circle white_color"></i> <span>Operasional</span></a>
                        <ul class="collapse list-unstyled" id="dashboard">
                           <li>
                              <a href="input_data_costumer.php">> <span>Input Data Costumer</span></a>
                           </li>
                           <li>
                              <a href="manivest_pengantaran.php">> <span>Manivest Pengantaran</span></a>
                           </li>
                           <li>
                              <a href="status_penerimaan_barang.php">> <span>Status Penerimaan Barang</span></a>
                           </li>
                           <li>
                              <a href="monitor_delivery.php">> <span>Pemantauan Pengiriman</span></a>
                           </li>
                        </ul>
                     </li>
                     
                  </ul>
               </div>
            </nav>
            <!-- end sidebar -->
            <!-- right content -->
            <div id="content">
               <!-- topbar -->
               <div class="topbar">
                  <nav class="navbar navbar-expand-lg navbar-light">
                     <div class="full">
                        <button type="button" id="sidebarCollapse" class="sidebar_toggle"><i class="fa fa-bars"></i></button>
                        <div class="logo_section">
                           <a href="index.php" color="yellow">Dashboard | Indah Logistik & Cargo</a>
                        </div>
                        <div class="right_topbar">
                           <div class="icon_info">
                           <ul>
                                 <li><a href="#" onclick="toggleFullScreen()"><i class="fa fa-arrows-alt"></i></a></li>
                                 <li><a href="#"><i class="fa fa-bell-o"></i></a></li>
                                 
                              </ul>
                              <ul class="user_profile_dd">
                                 <li>
                                    <a class="dropdown-toggle" data-toggle="dropdown">
                                       <span class="name_user">
                                          <?php
                                          include 'koneksi.php';
                                          $username = $_SESSION['username'];
                                          $query= mysqli_query($konek, "SELECT * FROM petugas WHERE username='$username' ");
                                          while($data=mysqli_fetch_array($query)){?>
                                                <?php echo "<i class='fa fa-user'></i>"; echo "   "; echo $data['nama_lengkap'];?>
                                          <?php } ?>
                                       </span>
                                    </a>
                                    <div class="dropdown-menu">
                                       <a class="dropdown-item" href="login/logout.php"><span>Log Out</span> <i class="fa fa-sign-out"></i></a>
                                    </div>
                                 </li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </nav>
               </div>
               <!-- end topbar -->
               <!-- dashboard inner -->
               <div class="midde_cont">
                  <div class="container-fluid">
                     <div class="row column_title">
                        <div class="col-md-12">
                           <marquee direction="left" scrollamount="7" align="center"><i class="fa fa-warning"></i> Mohon jangan lupa untuk logout / mengeluarkan akun anda jika sudah tidak terpakai lagi, Terima Kasih 🙏<span>🙂 setorkan omset cash H+1, setorkan bb setelah pengantaran H+1, tagih dan setorkan BL customer, kembalikan stt kecabang asal secepatnya,ingat ini kewajiban kita semua sebagai karyawan diperusahaan ini,tetap jaga kesehatan dan semoga berkah selalu 🙏 😉</span> </marquee>
                        </div>
                     </div>
                     <br>
                     <?php
                    include "koneksi.php";
                    $noresi = $_GET['noresi'];
                    $cek = mysqli_query($konek, "SELECT * FROM inputdata WHERE noresi='$noresi'");
                    $data = mysqli_fetch_array($cek)
                    ?>
                     <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h4 class="pageheader-title">Infromasi Resi : <?php echo $noresi?> </h4>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.html" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Informasi Resi</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div>
                                                    <h5 class="pageheader-title">Data Pengirim </h5>
                                                    <hr color="black">
                                                    <p>Nama Pengirim : <?php echo $data['namasend'];?></p>
                                                    <p>Alamat Pengirim : <?php echo $data['alamatsend'];?></p>
                                                    <p>Telepon Pengirim : <?php echo $data['phonesend'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <div>
                                                    <h5 class="pageheader-title">Data Penerima </h5>
                                                    <hr color="black">
                                                    <p>Nama Penerima : <?php echo $data['namaacc'];?></p>
                                                    <p>Alamat Penerima : <?php echo $data['alamatacc'];?></p>
                                                    <p>Telepon Penerima : <?php echo $data['phoneacc'];?></p>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                                <div class="row">
                                    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                        <div class="card">
                                            <div class="card-body">
                                                <h5 class="pageheader-title">Detail Informasi Paket </h5>
                                                <hr color="black">
                                                <div class="form-group row">
                                                    <label class=" col-1 col-lg-2 col-form-label">Jasa Pengirman</label>
                                                    <div class="col-3 col-lg-5">
                                                       <p>: Indah Logistik Cargo</p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class=" col-3 col-lg-2 col-form-label">Asal</label>
                                                    <div class="col-3 col-lg-5">
                                                       <p>: <?php echo $data['asal'];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class=" col-3 col-lg-2 col-form-label">Tujuan</label>
                                                    <div class="col-3 col-lg-5">
                                                       <p>: <?php echo $data['kota'];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class=" col-3 col-lg-2 col-form-label">Cara Pembayaran</label>
                                                    <div class="col-3 col-lg-5">
                                                       <p>: <?php echo $data['jpembayaran'];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class=" col-3 col-lg-2 col-form-label">Tipe Layanan</label>
                                                    <div class="col-3 col-lg-5">
                                                       <p>: <?php echo $data['layanan'];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class=" col-3 col-lg-2 col-form-label">Berat</label>
                                                    <div class="col-3 col-lg-5">
                                                       <p>: <?php echo $data['bbarang'];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class=" col-3 col-lg-2 col-form-label">Jumlah Barang</label>
                                                    <div class="col-3 col-lg-5">
                                                       <p>: <?php echo $data['jbarang'];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class=" col-3 col-lg-2 col-form-label">Harga / KG</label>
                                                    <div class="col-3 col-lg-5">
                                                       <p>: Rp.<?php echo $data['hargakilo'];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class=" col-3 col-lg-2 col-form-label">Grand Total</label>
                                                    <div class="col-3 col-lg-5">
                                                       <p>: Rp.<?php echo $data['hargatotal'];?></p>
                                                    </div>
                                                </div>
                                                <div class="form-group row">
                                                    <label class=" col-3 col-lg-2 col-form-label">Petugas Input</label>
                                                    <div class="col-3 col-lg-5">
                                                       <p>: <?php
                                                                include 'koneksi.php';
                                                                $username = $_SESSION['username'];
                                                                $query= mysqli_query($konek, "SELECT * FROM petugas WHERE username='$username' ");
                                                                while($data=mysqli_fetch_array($query)){?>
                                                                    <?php echo $data['nama_lengkap'];?>
                                                                <?php } ?>
                                                        </p>
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
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script type="text/javascript">
         function toggleFullScreen() {
            if ((document.fullScreenElement && document.fullScreenElement !== null) ||  
               (!document.mozFullScreen && !document.webkitIsFullScreen)) {
               if (document.documentElement.requestFullScreen) {
                  document.documentElement.requestFullScreen();
               } else if (document.documentElement.mozRequestFullScreen) {
                  document.documentElement.mozRequestFullScreen();
               } else if (document.documentElement.webkitRequestFullScreen) {
                  document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
               }
            } else {
               if (document.cancelFullScreen) {
                  document.cancelFullScreen();
               } else if (document.mozCancelFullScreen) {
                  document.mozCancelFullScreen();
               } else if (document.webkitCancelFullScreen) {
                  document.webkitCancelFullScreen();
               }
            }
         }
    </script>
      <script src="js/jquery.min.js"></script>
      <script src="js/bootstrap.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/suggestions.js"></script>
      <script src="js/script.js"></script>
   </body>
</html>