<?php
    // Di dalam test1.php
    $dataParam = $_GET["data"];
    $dataObj = json_decode(urldecode($dataParam), true); // Mengonversi JSON menjadi array asosiatif

    // Sekarang Anda dapat mengakses $dataObj seperti ini:
    $hasilInputArray = $dataObj['hasilInputArray'];
    $ubahJumlahInputData = $dataObj['ubahJumlahInputData'];
    $jumlahUbahJumlahInputData = count($dataObj['ubahJumlahInputData']);
    $nominal = 10000000; // Nominal 10 juta
    // Mengalikan nominal dengan jumlah data ubahJumlahInputData
    $totalDeposit = $nominal * $jumlahUbahJumlahInputData;

    // Di dalam test1.php
    $totalBiaya = 0; // Total biaya, Anda sudah memiliki ini dari perhitungan sebelumnya

    // Loop melalui hasilInputArray
    foreach ($dataObj['hasilInputArray'] as $item) {
        $nominalCleaned = str_replace(["Rp", ".", ","], "", $item['nominal']); // Menghapus "Rp", tanda titik ".", dan tanda koma ","
        $nominalFloat = (float)$nominalCleaned;
        if (is_numeric($nominalFloat)) {
            $totalBiaya += $nominalFloat;
        }
    }


    $totalBiayaSetelahDikurangiDeposit = $totalBiaya - $totalDeposit;
    $totalBiayaSetelahDikurangiDeposit = $totalBiayaSetelahDikurangiDeposit < 0 ? 0 : $totalBiayaSetelahDikurangiDeposit;

    usort($dataObj['hasilInputArray'], function($a, $b) {
        return strtotime($a['tanggal']) - strtotime($b['tanggal']);
    });
    $tanggalTerawal = $dataObj['hasilInputArray'][0]['tanggal'];
    $tanggalTerakhir = $dataObj['hasilInputArray'][count($dataObj['hasilInputArray']) - 1]['tanggal'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>TAGIHAN A.D.A <?php echo $tanggalTerawal; ?> s/d <?php echo $tanggalTerakhir; ?></title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/paper-css/0.4.1/paper.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.3.2/html2canvas.min.js"></script>
<style>
    @page { size: A4 }
  
    h1 {
        font-weight: bold;
        font-size: 20pt;
        text-align: center;
    }

    .rangkakopsurat{
            margin: 0 auto;
            background-color: #fff;
            height: auto;
    }
    .tengah{
            text-align: center;
            line-height: 0px;
    }
  
    table {
        border-collapse: collapse;
        width: 100%;
    }
    .table th {
        padding: 8px 8px;
        border:1px solid #000000;
        text-align: center;
    }
  
    .table td {
        padding: 3px 3px;
        border:1px solid #000000;
        
    }
  
    .text-center {
        text-align: center;
    }
    .heading{
        text-align : center;
    }
    hr{
        border : none;
        border-top: 3px solid #000; /* Sesuaikan dengan ketebalan dan warna yang Anda inginkan */
    }
    .background {
    /* URL gambar latar belakang */
    background-image: url('./assets/images/Picture1.png');
    /* Properti lain seperti background-repeat, background-size, dll. */
    background-repeat: no-repeat;
    background-size: 700; /* Sesuaikan dengan preferensi Anda */
    background-position : center;
}

</style>
</head>
<body class="A4">
    <section class="sheet padding-10mm">
        <div class="rangkakopsurat">
            <table>
                <tr>
                    <td><img src="https://indahonline.com/template/assets/img/inlog/logoIndahSVG.svg" width="170px"></td>
                    <td class="tengah">
                        <h3>INDAH CARGO LOGISTIK</h3>
                        <h4>AO. MONJALI</h4>
                        <h5>Jl. Ring Road Utara, Sumberan, Sariharjo, Kec. Ngaglik, Kabupaten Sleman</h5>
                        <h5>Daerah Istimewa Yogyakarta 55581</h5>
                        <h5>Telp/WA : 0822-4116-9698 / 0813-9139-0101</h5>
                    </td>
                </tr>
            </table>
            <hr>
        </div>

        <div class="heading">
            <p><b><u>INVOICE KIRIMAN</u></b></p>
        </div>
        <table>
            <tr>
                <td><b>Form Ambilan : <?php echo $tanggalTerawal; ?> s/d <?php echo $tanggalTerakhir; ?></b></td>
                <td><b>Kepada Yth: A.D.A SOUVENIR PROJECT</b></td>
            </tr>
        </table>
        <br>
        <div class="background">
            <table class="table">
                <thead>
                    <tr>
                        <th>NO</th>
                        <th>TANGGAL PENGAMBILAN</th>
                        <th>TOTAL BIAYA</th>
                    </tr>
                </thead>
                <tbody id="data-container" style="text-align: center;"></tbody>
            </table>
            <br>
            <table>
                    <tr>
                        <td><b>TOTAL BIAYA</b></td>
                        <td><b>:</b></td>
                        <td><b id="totalBiaya"></b></td>
                    </tr>
                    <tr style="color: red;">
                        <td><b>DEPOSIT
                            <span id="formattedDatesPlaceholder"></span>
                        </b></td>
                        <td><b>:</b></td>
                        <td><b>Rp <?php echo number_format($totalDeposit, 2, ',', '.'); ?></b></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td style="padding : 0px 130px 0px 0px"><hr></td>
                    </tr>
                    <tr>
                        <td><b>TOTAL TRANSFER</b></td>
                        <td><b>:</b></td>
                        <td><b>Rp <?php echo number_format($totalBiayaSetelahDikurangiDeposit, 2, ',', '.'); ?></b></td>
                        
                    </tr>
            </table>

        </div>
        <br>
        <table style="text-align: center;">
            <tbody>
                <tr>
                    <td>Hormat Kami</td>
                    <td>Telah Diterima</td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td><br></td>
                    <td><br></td>
                </tr>
                <tr>
                    <td>Bivaldi</td>
                    <td>A.D.A Souvenir</td>
                </tr>
            </tbody>
        </table>
        <div>
            <br>
            <hr>
            <p><b>Catatan :</b></p>
        </div>
    </section>
</body>

<script>
    window.onload = function() {
        window.print();
    }
    // Menggunakan URLSearchParams untuk mengambil data dari URL
    var urlParams = new URLSearchParams(window.location.search);
    var dataParam = urlParams.get("data");

    // Kirim data ke PHP melalui permintaan HTTP GET
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "test1.php?data=" + dataParam, true);
    xhr.send();

    // Di halaman test1.php (halaman yang menerima data)
    var urlParams = new URLSearchParams(window.location.search);
    var dataParam = urlParams.get("data");
    var dataObj = JSON.parse(decodeURIComponent(dataParam));

    // Di halaman test1.php (halaman yang menerima data)
    // Dapatkan data ubahJumlahInputData dari objek dataObj
    var ubahJumlahInputData = dataObj.ubahJumlahInputData;

    // Cek apakah ubahJumlahInputData memiliki data
    if (ubahJumlahInputData && ubahJumlahInputData.length > 0) {
        // Tampilkan data ubahJumlahInputData sesuai kebutuhan
        var formattedDates = [];

        // Loop melalui setiap tanggal dan mengubah formatnya
        ubahJumlahInputData.forEach(function (tanggal) {
            var dateObj = new Date(tanggal);
            var formattedDate = dateObj.getDate() + '-' + (dateObj.getMonth() + 1) + '-' + dateObj.getFullYear();
            formattedDates.push(formattedDate);
        });

        var depositText = "(" + formattedDates.join("), (") + ")";

        // Memasukkan teks tersebut ke dalam elemen HTML dengan ID "formattedDatesPlaceholder"
        document.getElementById("formattedDatesPlaceholder").textContent = depositText;
    } else {
        console.log("Tidak ada data ubahJumlahInputData yang diterima.");
    }
    // Mengambil elemen tbody di mana data akan ditampilkan
    var dataContainer = document.getElementById("data-container");

    // Inisialisasi nomor awal
    var nomor = 1;
    var totalBiaya = 0;
    
    // Loop melalui hasilInputArray
    dataObj.hasilInputArray.forEach(function (item) {
        var nominalCleaned = item.nominal.replace(/Rp/g, "").replace(/\./g, "").replace(/,/g, "").trim(); // Menghapus "Rp", tanda titik ".", dan tanda koma ","
        var nominalFloat = parseFloat(nominalCleaned);
        
        if (!isNaN(nominalFloat)) {
            totalBiaya += nominalFloat;
        }

        var row = document.createElement("tr");
        var cellNomor = document.createElement("td");
        var cellTanggal = document.createElement("td");
        var cellNominal = document.createElement("td");

        cellNomor.textContent = nomor; // Menampilkan nomor
        cellTanggal.textContent = item.tanggal;

        // Menggunakan toLocaleString() untuk memformat nominal
        cellNominal.textContent = parseFloat(nominalCleaned).toLocaleString("id-ID", { style: "currency", currency: "IDR" });
        


        row.appendChild(cellNomor);
        row.appendChild(cellTanggal);
        row.appendChild(cellNominal);

        dataContainer.appendChild(row);

        nomor++; // Menambah nomor untuk baris berikutnya
    });

    // Menampilkan totalan biaya
    var totalBiayaElement = document.getElementById("totalBiaya");
    totalBiayaElement.textContent = parseFloat(totalBiaya).toLocaleString("id-ID", { style: "currency", currency: "IDR" });
    
    // Setelah mengurutkan tanggal dengan langkah-langkah sebelumnya
    // Mengambil tanggal paling awal (terkecil)
    var tanggalAwal = dateObjects[0];

    // Mengambil tanggal paling akhir (terbesar)
    var tanggalAkhir = dateObjects[dateObjects.length - 1];

    // Sekarang Anda dapat menggunakannya untuk menampilkan tanggal-tanggal tersebut
    console.log("Tanggal Awal: " + tanggalAwal);
    console.log("Tanggal Akhir: " + tanggalAkhir);
</script>

</html>