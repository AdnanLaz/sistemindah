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
      <title>Cek Data Costumer</title>
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
      <script type="text/javascript" src="sweetalert-master/docs/assets/sweetalert/sweetalert.min.js"></script>
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
                              <a href="input_data_costumer.php" onclick="return confirm('Data yang di inputkan akan hilang, anda yakin?')">> <span>Input Data Costumer</span></a>
                           </li>
                           <li>
                              <a href="manivest_pengantaran.php" onclick="return confirm('Data yang di inputkan akan hilang, anda yakin?')">> <span>Manivest Pengantaran</span></a>
                           </li>
                           <li>
                              <a href="status_penerimaan_barang.php" onclick="return confirm('Data yang di inputkan akan hilang, anda yakin?')">> <span>Status Penerimaan Barang</span></a>
                           </li>
                           <li>
                              <a href="monitor_delivery.php" onclick="return confirm('Data yang di inputkan akan hilang, anda yakin?')">> <span>Pemantauan Pengiriman</span></a>
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
                           <a href="#" color="yellow">Cek Data Costumer</a>
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
                     <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="page-header">
                                <h4 class="pageheader-title">Cek Data Costumer </h4>
                                <div class="page-breadcrumb" align="right">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link" onclick="return confirm('Data yang di inputkan akan hilang, anda yakin?')">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Cek Data Costumer</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include 'koneksi.php';
                    $infopelanggan = $_POST['infopelanggan'];
                    $phonesend = $_POST['phonesend'];
                    $namasend = $_POST['namasend'];
                    $phoneacc = $_POST['phoneacc'];
                    $alamatsend = $_POST['alamatsend'];
                    $namaacc = $_POST['namaacc'];
                    $alamatacc = $_POST['alamatacc'];
                    $layanan = $_POST['layanan'];
                    $asal = $_POST['asal'];
                    $kota = $_POST['kota'];
                    $jkiriman = $_POST['jkiriman'];
                    $jpembayaran = $_POST['jpembayaran'];
                    $bkiriman = $_POST['bkiriman'];
                    $jbarang = $_POST['jbarang'];
                    $bbarang = $_POST['bbarang'];
                    $hargakilo = $_POST['hargakilo'];
                    $hargatotal = $_POST['hargatotal'];
                     $query = mysqli_query($konek, "SELECT max(noresi) as noresiurut FROM inputdata");
	                  $data = mysqli_fetch_array($query);
	                  $outnoresi = $data['noresiurut'];
                     $urutan = (int) substr($outnoresi, 8, 8);
                     $urutan++;
                     $huruf = "JOG1CS";
                     $outnoresi = $huruf . sprintf("%08s", $urutan);?>
                     <form action="proses/proses_input_data_costumer.php" method="post">
                        <div class="row">
                        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div>
                                        <h5 class="pageheader-title">Cek Data Costumer </h5>
                                        <br>
                                        <label for="">Nomor Resi</label>
                                        <input type="text" class = "form-control" name="noresi" required="required" value="<?php echo $outnoresi ?>" readonly>
                                    </div>
                                    <br>
                                    <div>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="infopelanggan" class="custom-control-input" value="Perorangan" <?php if ($infopelanggan == "Perorangan") {echo "checked";}?> readonly onclick="return false"><span class="custom-control-label">Perorangan</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="infopelanggan" class="custom-control-input" value="Korporasi" <?php if ($infopelanggan == "Perorangan") {echo "Korporasi";}?> readonly onclick="return false"><span class="custom-control-label">Korporasi</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="infopelanggan" class="custom-control-input" value="Bukalapak" <?php if ($infopelanggan == "Bukalapak") {echo "checked";}?> readonly onclick="return false"><span class="custom-control-label">Bukalapak</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="pageheader-title">Data Pengirim </h5>
                                            <br>
                                            <p><label for="">Telepon Pengirim</label><br><input type="text" name="phonesend" class = "form-control" value="<?php echo $phonesend?>" readonly></p>
                                            <p><label for="">Nama Pengirim</label><br><input type="text" name="namasend" class = "form-control" value="<?php echo $namasend?>" readonly></p>
                                            <p><label for="">Alamat</label><br><input type="text" name="alamatsend" class = "form-control" value="<?php echo $alamatsend?>" readonly></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-xl-6 col-lg-6 col-md-12 col-sm-12 col-12 col-lg-6 col-md-6 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div>
                                            <h5 class="pageheader-title">Data Penerima </h5>
                                            <br>
                                            <p><label for="">Telepon Penerima</label><br><input type="text" name="phoneacc" class = "form-control" value="<?php echo $phoneacc?>" readonly></p>
                                            <p><label for="">Nama Penerima</label><br><input type="text" name="namaacc" class = "form-control" value="<?php echo $namaacc?>" readonly></p>
                                            <p><label for="">Alamat</label><br><input type="text" name="alamatacc" class = "form-control" value="<?php echo $alamatacc?>" readonly></p>
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
                                    <div>
                                       <h5 class="pageheader-title">Data Pengirim </h5>
                                       <br>
                                       <div class="form-group row">
                                          <label class=" col-3 col-lg-2 col-form-label">Layanan</label>
                                          <div class="col-3 col-lg-5">
                                          <input type="text" name="layanan" class = "form-control" value="<?php echo $layanan?>" readonly>
                                          </div>
                                       </div>
                                       <div class="form-group row">
                                          <label class=" col-3 col-lg-2 col-form-label">Asal</label>
                                          <div class="col-3 col-lg-5">
                                          <input type="text" name="asal" class = "form-control" value="<?php echo $asal?>" readonly>
                                          </div>
                                       </div>
                            <div class="form-group row">
                                <label class=" col-3 col-lg-2 col-form-label">Tujuan</label>
                                <div class="col-3 col-lg-5">
                                <input type="text" name="kota" class = "form-control" value="<?php echo $kota?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" col-3 col-lg-2 col-form-label">Jenis Kiriman</label>
                                <div class="col-3 col-lg-5">
                                <div>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="jkiriman" class="custom-control-input" value="Dokumen" name="Dokumen" readonly onclick="return false" <?php if ($jkiriman == "Dokumen") {echo "checked";}?>><span class="custom-control-label">Dokumen</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="jkiriman" class="custom-control-input" value="Paket" name="Paket"readonly onclick="return false" <?php if ($jkiriman == "Paket") {echo "checked";}?>><span class="custom-control-label">Paket</span>
                                        </label>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="jkiriman" class="custom-control-input" value="Motor" name="Motor" readonly onclick="return false" <?php if ($jkiriman == "Motor") {echo "checked";}?>><span class="custom-control-label">Motor</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" col-3 col-lg-2 col-form-label">Cara Pembayaran</label>
                                <div class="col-3 col-lg-5">
                                <div>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="jpembayaran" class="custom-control-input" value="<?php echo $jpembayaran?>" checked readonly onclick="return false"><span class="custom-control-label">Cash</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" col-3 col-lg-2 col-form-label">Bentuk Kiriman</label>
                                <div class="col-3 col-lg-5">
                                <div>
                                        <label class="custom-control custom-radio custom-control-inline">
                                            <input type="radio" name="bkiriman" class="custom-control-input" value="<?php echo $bkiriman?>" checked readonly onclick="return false"><span class="custom-control-label">Berat</span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" col-3 col-lg-2 col-form-label">Jumlah Barang (Koli)</label>
                                <div class="col-3 col-lg-5">
                                <input type="text" name="jbarang" class = "form-control" value="<?php echo $jbarang?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" col-3 col-lg-2 col-form-label">Berat Barang (Kilo)</label>
                                <div class="col-3 col-lg-5">
                                <input type="text" name="bbarang" class = "form-control" value="<?php echo $bbarang?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" col-3 col-lg-2 col-form-label">Harga Per Kilo</label>
                                <div class="col-3 col-lg-5">
                                <input type="text" name="hargakilo" class = "form-control" value="<?php echo $hargakilo?>" readonly>
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class=" col-3 col-lg-2 col-form-label">Total Harga</label>
                                <div class="col-3 col-lg-5">
                                <input type="text" name="hargatotal" class = "form-control" value="<?php echo $hargatotal?>" readonly>
                                </div>
                            </div>
                        
                            <div class="row pt-2 pt-sm-5 mt-1">
                                <div class="col-sm-6 pb-2 pb-sm-4 pb-lg-0 pr-0">
                                </div>
                                <div class="col-sm-6 pl-0">
                                <p class="text-right">
                                    <button type="button" class="btn btn-secondary" value="Batal" onclick="history.back(1)">Kembali</button>
                                    <button type="submit" class="btn btn-success" onclick="cek()">Simpan</button>
                                </p>
                            </div>
                    </div>
                    </form>
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