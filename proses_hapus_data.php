<?php
    include "koneksi.php";
    $noresi = $_GET['noresi'];
    $namakurir = $_GET['namakurir'];
    $namasupir = $_GET['namasupir'];
    $nopolisi = $_GET['nopolisi'];
    $klogistik = $_GET['klogistik'];
    $keterangan = $_GET['keterangan'];
    $query = mysqli_query($konek, "DELETE FROM daftar_resi_temp WHERE noresi = '$noresi'");
    $query1 = mysqli_query($konek, "SELECT * FROM daftar_resi_temp");
    $query2 = mysqli_num_rows($query1);
    if ($query) {
        if ($query2 == 0) {
            echo header("location:manivest_pengantaran.php");
        }else if ($query2 > 0) {
            echo header("location:manivest_pengantaran_add.php?namasupir=$namasupir&namakurir=$namakurir&nopolisi=$nopolisi&klogistik=$klogistik&keterangan=$keterangan");
        }
    } else {
        echo "Proses hapus gagal!";
    }
?>