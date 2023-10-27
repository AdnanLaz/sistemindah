<?php 
    include 'koneksi.php';
    date_default_timezone_set('Asia/Jakarta');
    $tanggalWaktu = date("Y-m-d H:i:s");
    $nama = $_POST['nama_petugas'];
    $jmlkardusm = $_POST['jmlkardusm'];
    $jmlkardusk = $_POST['jmlkardusk'];
    $ket = $_POST['ket'];

    mysqli_query($konek, "INSERT INTO kardus VALUES ('','$tanggalWaktu','$nama', '$jmlkardusm','$jmlkardusk', '$ket')");
    header("location:../packing.php#dataKardus");
    
?>