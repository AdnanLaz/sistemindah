<?php 
    include 'koneksi.php';

    $namaFile = $_FILES['file']['name'];
    $x = explode('.', $namaFile);
    $file_tmp = $_FILES['file']['tmp_name'];
    // Lokasi Penempatan file
    $dirUpload = "../file/";
    $linkBerkas = $dirUpload.$namaFile;

    // Meyimpan Ke Database
    date_default_timezone_set('Asia/Jakarta');
    $tanggalWaktu = date("Y-m-d H:i:s");

    mysqli_query($konek, "INSERT INTO invoice VALUES ('','$namaFile','$linkBerkas','$tanggalWaktu')");    
    // Menyimpan file
    $terupload = move_uploaded_file($file_tmp, $linkBerkas);
    if ($terupload) {
        echo "Upload berhasil!";
        header("Location: ../form-ada.php", true, 301);
        exit();
    } else {
        echo "Upload Gagal!";
    }
 ?>