<?php 
    include 'koneksi.php';
    $hapus = mysqli_query($konek, "DELETE FROM daftar_resi_temp");
        if ($hapus) {
            header("location:manivest_pengantaran.php");
        } 
    else {
        echo "Proses input gagal!";
    }
?>