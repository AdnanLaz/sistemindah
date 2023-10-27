<?php 
    include 'koneksi.php';
    date_default_timezone_set('Asia/Jakarta');
    $tanggalWaktu = date("Y-m-d H:i:s");
    $nama = $_POST['nama_petugas'];
    $jmlkayum = $_POST['jmlkayum'];
    $jmlkayuk = $_POST['jmlkayuk'];
    $ket = $_POST['ket'];

    mysqli_query($konek, "INSERT INTO kayu VALUES ('','$tanggalWaktu','$nama', '$jmlkayum','$jmlkayuk', '$ket')");
    header("location:../packing.php#dataKayu");
    
?>