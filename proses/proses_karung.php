<?php 
    include 'koneksi.php';
    date_default_timezone_set('Asia/Jakarta');
    $tanggalWaktu = date("Y-m-d H:i:s");
    $nama = $_POST['nama_petugas'];
    $jmlkarungm = $_POST['jmlkarungm'];
    $jmlkarungk = $_POST['jmlkarungk'];
    $ket = $_POST['ket'];

    mysqli_query($konek, "INSERT INTO karung VALUES ('','$tanggalWaktu','$nama', '$jmlkarungm','$jmlkarungk', '$ket')");
    header("location:../packing.php#dataKarung");
    
?>