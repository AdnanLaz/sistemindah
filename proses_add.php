<?php 
    include 'koneksi.php';
    $nomvdl= $_POST['nomvdl'];
    $namasupir = $_POST['namasupir'];
    $nopolisi = $_POST['nopolisi'];
    $klogistik = $_POST['klogistik'];
    $keterangan = $_POST['keterangan'];
    $noresi = $_POST['noresi'];
    $jmbdresi = $_POST['jmbdresi'];
    $jmbberangkat = $_POST['jmbberangkat'];
    $jmbtertunda = $_POST['jmbtertunda'];
    $namakurir = $_POST['namakurir'];
    $tanggal = $_POST['tanggal'];

    $ceknoresi = mysqli_query($konek,"SELECT * FROM daftar_resi_temp WHERE noresi='$noresi'");

    if (mysqli_num_rows($ceknoresi)> 0) {
        echo "<script>alert('Gagal di tambahkan, karena nomor resi $noresi sudah ditambahkan!');</script>";
        header("location:manivest_pengantaran_add.php?namasupir=$namasupir&namakurir=$namakurir&nopolisi=$nopolisi&klogistik=$klogistik&keterangan=$keterangan");
    }
    else if (mysqli_num_rows($ceknoresi)==0) {
        $ceknoresireal = mysqli_query($konek,"SELECT * FROM inputdata WHERE noresi='$noresi'");
        if (mysqli_num_rows($ceknoresireal) == 0) {
            echo "<script>alert('Gagal di tambahkan, karena nomor resi $noresi tidak terdaftar!');</script>";
            header("location:manivest_pengantaran_add.php?namasupir=$namasupir&namakurir=$namakurir&nopolisi=$nopolisi&klogistik=$klogistik&keterangan=$keterangan");
        }else if (mysqli_num_rows($ceknoresireal) > 0) {
            $ceknoresilanjut = mysqli_query($konek,"SELECT * FROM manivestpengantaran WHERE noresi='$noresi'");
            if (mysqli_num_rows($ceknoresilanjut) == 0) {
                $input = mysqli_query($konek, "INSERT INTO daftar_resi_temp VALUES('$nomvdl','$namasupir','$nopolisi','$klogistik','$keterangan','$noresi','$jmbdresi','$jmbberangkat','$jmbtertunda','$namakurir','$tanggal')");
                if ($input) {
                    header("location:manivest_pengantaran_add.php?namasupir=$namasupir&namakurir=$namakurir&nopolisi=$nopolisi&klogistik=$klogistik&keterangan=$keterangan");
                }
                else {
                    header("location:manivest_pengantaran.php?pesan-gagal");
                }
            }
            else if (mysqli_num_rows($ceknoresilanjut) > 0) {
                echo "<script>alert('Gagal di tambahkan, karena nomor resi $noresi sudah terdaftar di manivest lain!');</script>";
                header("location:manivest_pengantaran_add.php?namasupir=$namasupir&namakurir=$namakurir&nopolisi=$nopolisi&klogistik=$klogistik&keterangan=$keterangan");
            }
        }
        
        
    }

    
?>