<?php 
    include 'koneksi.php';
    
    $input = mysqli_query($konek, "INSERT INTO manivestpengantaran (nomvdl,namasupir,nopolisi,klogistik,keterangan,noresi,jmbdresi,jmbberangkat,jmbtertunda,namakurir) SELECT nomvdl,namasupir,nopolisi,klogistik,keterangan,noresi,jmbdresi,jmbberangkat,jmbtertunda,namakurir FROM daftar_resi_temp");
    if ($input) {
        $hapus = mysqli_query($konek, "DELETE FROM daftar_resi_temp");
        if ($hapus) {
            header("location:manivest_pengantaran.php");
        } 
    }
    else {
        echo "Proses input gagal!";
    }
?>