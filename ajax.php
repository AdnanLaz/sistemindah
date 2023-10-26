<?php

//membuat koneksi ke database
$konek = mysqli_connect("localhost", "root", "", "sistemindah");

//variabel noresi yang dikirimkan form
$noresi = $_GET['noresi'];

//mengambil data
$query = mysqli_query($konek, "SELECT * FROM inputdata WHERE noresi='$noresi'");
$resi = mysqli_fetch_array($query);
$data = array(
            'jbarang' =>  @$resi['jbarang']);

//tampil data
echo json_encode($data);
?>