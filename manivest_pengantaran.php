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
      <title>Manivest Pengantaran</title>
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
      
      <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.js"></script>
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
                           <a href="" color="yellow">Manivest Pengantaran</a>
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
                                <h4 class="pageheader-title">Manivest Pengantaran Reguler </h4>
                                <div class="page-breadcrumb">
                                    <nav aria-label="breadcrumb">
                                        <ol class="breadcrumb">
                                            <li class="breadcrumb-item"><a href="index.php" class="breadcrumb-link">Dashboard</a></li>
                                            <li class="breadcrumb-item active" aria-current="page">Manivest Pengantaran Reguler</li>
                                        </ol>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="hide">
                        <?php include 'koneksi.php';
                        $query = mysqli_query($konek, "SELECT max(nomvdl) as nomanivest FROM manivestpengantaran");
	                    $data = mysqli_fetch_array($query);
	                    $outmanivest = $data['nomanivest'];
                        $urutan = (int) substr($outmanivest, 8, 8);
                        $urutan++;
                        $huruf = "ATJOG";
                        $outmanivest = $huruf . sprintf("%08s", $urutan);?>
                    </div>
                   
                    <form action="proses_add.php" method="POST">
                        <div class="hide-control">
                            <input type="hidden" name="nomvdl" required="required" value="<?php echo $outmanivest ?>" readonly class = "form-control">
                            <input type="hidden" name="tanggal" value="<?php date_default_timezone_set('Asia/Jakarta'); echo date("Y-m-d(G:i:s)") ?>" readonly>
                        </div>
                        <div class="row">
                            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                                <div class="card">
                                    <div class="card-body">
                                        <div class="form-group row">
                                            <label class=" col-3 col-lg-2 col-form-label">Nama Kurir</label>
                                            <div class="col-3 col-lg-9">
                                                <input type="text" name="namakurir" class = "form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-3 col-lg-2 col-form-label">Nama Supir</label>
                                            <div class="col-3 col-lg-9">
                                                <input type="text" name="namasupir" class = "form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-3 col-lg-2 col-form-label">No Polisi</label>
                                            <div class="col-3 col-lg-9">
                                                <input type="text" name="nopolisi" class = "form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-3 col-lg-2 col-form-label">KA Logistik</label>
                                            <div class="col-3 col-lg-9">
                                                <input type="text" name="klogistik" class = "form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-3 col-lg-2 col-form-label">Keterangan</label>
                                            <div class="col-3 col-lg-9">
                                                <input type="text" name="keterangan" class = "form-control" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <div class="col-3 col-lg-11">
                                                <hr color="orange">
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-3 col-lg-2 col-form-label">Nomor Resi</label>
                                            <div class="col-3 col-lg-9">
                                                <input type="text" name="noresi" class = "form-control" onkeyup="isi_otomatis()" id="noresi" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-3 col-lg-2 col-form-label">Jumlah Barang Di Resi</label>
                                            <div class="col-3 col-lg-9">
                                                <input type="text" name="jmbdresi" class = "form-control" id="jbarang" onkeyup="sum()" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-3 col-lg-2 col-form-label">Jumlah Barang Berangkat</label>
                                            <div class="col-3 col-lg-9">
                                                <input type="text" name="jmbberangkat" class = "form-control" id="jmbberangkat" onkeyup="sum()" required>
                                            </div>
                                        </div>
                                        <div class="form-group row">
                                            <label class=" col-3 col-lg-2 col-form-label">Jumlah Barang Tertunda</label>
                                            <div class="col-3 col-lg-9">
                                                <input type="text" name="jmbtertunda" class = "form-control" id="jmbtertunda" readonly>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        <button type="submit" class="btn btn-space btn-primary">Tambah</button>
                    </form>
                     
                  </div>
               </div>
               <!-- end dashboard inner -->
            </div>
         </div>
      </div>
      <!-- jQuery -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script type="text/javascript">
            function isi_otomatis(){
                var noresi = $("#noresi").val();
                $.ajax({
                    url: 'ajax.php',
                    data:"noresi="+noresi ,
                }).success(function (data) {
                    var json = data,
                    obj = JSON.parse(json);
                    $('#jbarang').val(obj.jbarang);
                });
            }
        </script>
        <script>
            function sum() {
                var txtFirstNumberValue = document.getElementById('jbarang').value;
                var txtSecondNumberValue = document.getElementById('jmbberangkat').value;
                var result = parseInt(txtFirstNumberValue) - parseInt(txtSecondNumberValue);
                if (!isNaN(result)) {
                    document.getElementById('jmbtertunda').value = result;
                }
            }
        </script>       
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
      <script src="js/bootstrap.min.js"></script>
      <script src="js/custom.js"></script>
      <script src="js/suggestions.js"></script>
      <script src="js/script.js"></script>
      
   </body>
</html>