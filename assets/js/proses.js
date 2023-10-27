function formatRupiah(angka) {
    var numberString = angka.toString();
    var splitNumber = numberString.split('.');
    var nominal = splitNumber[0];

    var reverseNominal = nominal.split('').reverse().join('');
    var ribuan = reverseNominal.match(/\d{1,3}/g);
    var formattedNominal = ribuan.join('.').split('').reverse().join('');

    return 'Rp. ' + formattedNominal;
}

var hasilInputArray = [];
function getFormattedDate(date) {
    const options = { weekday: 'long', year: 'numeric', month: 'numeric', day: 'numeric' };
    const formatter = new Intl.DateTimeFormat('id-ID', options);
    return formatter.format(date);
}

function inputAda() {
    var tanggal = new Date(document.getElementById("tanggal").value); // Mengambil tanggal dari input
    var nominal = document.getElementById("nominal").value;

    if (tanggal.toString() === "Invalid Date" || nominal === "") {
        alert("Harap Input Data Dengan Benar");
        return;
    } else {
        var formattedTanggal = getFormattedDate(tanggal); // Memformat tanggal dalam bahasa Indonesia
        var formattedNominal = formatRupiah(nominal);

        hasilInputArray.push({ tanggal: formattedTanggal, nominal: formattedNominal });

        tampilkanData(); // Memanggil fungsi tampilkanData() untuk memperbarui tampilan
    }
    simpanDataKeLocalStorage();
}


function tampilkanData() {
    var hasilInputDiv = document.getElementById("hasilInput");
    hasilInputDiv.innerHTML = "<h4 class='header-title'>Hasil Data Tagihan</h4><div class='table-responsive'><table class='table table-hover'><thead><tr><th>No</th><th>Tanggal</th><th>Nominal</th><th>Aksi</th></tr></thead>";

    for (var i = 0; i < hasilInputArray.length; i++) {
        hasilInputDiv.innerHTML += "<div class='table-responsive'><table class='table table-hover'><tr><td>" + (i + 1) + "</td><td>" + hasilInputArray[i].tanggal + "</td><td>" + hasilInputArray[i].nominal + "</td><td><a href='#' onclick='hapusData(" + i + ")'><i class='ti-trash'></i></a></td></tr></table></div>";
        document.getElementById("nominal").value = "";
    }

    if (hasilInputArray.length > 0) {
        document.getElementById("tombolCetak").style.display = "block";
    } else {
        document.getElementById("tombolCetak").style.display = "none";
    }
}

function hapusData(index) {
    var konfirmasi = confirm("Apakah Anda yakin ingin menghapus data ini?");
    if (konfirmasi) {
        hasilInputArray.splice(index, 1);
        tampilkanData(); // Memanggil fungsi tampilkanData() untuk memperbarui tampilan setelah menghapus data
        simpanDataKeLocalStorage();
    }
}

function tampilkanCetak() {
    var hasilInputDiv = document.getElementById("hasilCetak");

    for (var i = 0; i < hasilInputArray.length; i++) {
        hasilInputDiv.innerHTML += "<tr><td>" + (i + 1) + "</td><td>" + hasilInputArray[i].tanggal + "</td><td>" + hasilInputArray[i].nominal + "</td></tr>";
    }
}

function ubahJumlahInput() {
    var jumlah = parseInt(document.getElementById("jumlahInput").value);
    var kolomInput = document.getElementById("kolomInput");

    // Menghapus semua elemen input sebelum menambahkan yang baru
    kolomInput.innerHTML = '';

    // Menambahkan elemen input sesuai dengan jumlah yang dipilih
    for (var i = 0; i < jumlah; i++) {
        var label = document.createElement("label");
        label.textContent = "Tanggal Deposit Ke " + (i + 1);
        var lineBreak = document.createElement("br");
        var input = document.createElement("input");
        input.required;
        input.type = "date";
        input.className = "form-control";
        input.name = "tanggalD" + (i + 1);

        kolomInput.appendChild(label);
        kolomInput.appendChild(input);
        kolomInput.appendChild(lineBreak);
    }
    simpanDataKeLocalStorage();
}


function Deposit() {
    // Mendapatkan semua elemen input berdasarkan nama
    var inputElements = document.querySelectorAll('input[name^="tanggalD"]');
    
    // Mengosongkan array inputValues
    inputValues = [];

    // Mengambil nilai input dan menyimpannya dalam array inputValues
    inputElements.forEach(function(inputElement) {
        inputValues.push(inputElement.value);
    });

    // Mengecek apakah inputValues berisi nilai
    console.log(inputValues);

    // Selanjutnya, Anda dapat mengirim data ini ke halaman lain
}



function cetakHasilInput() {
    // Mengecek apakah kedua array memiliki minimal satu elemen
    if (hasilInputArray.length > 0 && inputValues.length > 0) {
        // Menggabungkan data dari hasilInputArray dan inputValues ke dalam satu objek
        var dataToPass = {
            hasilInputArray: hasilInputArray,
            ubahJumlahInputData: inputValues
        };

        // Mengubah objek menjadi JSON string
        var dataJSON = JSON.stringify(dataToPass);

        // Meneruskan data sebagai parameter URL ke halaman lain
        var queryString = "?data=" + encodeURIComponent(dataJSON);

        window.location.href = "test1.php" + queryString;
    } else {
        // Menampilkan pesan kesalahan jika salah satu atau kedua array kosong
        alert("Data harus diisi sebelum melakukan pengiriman.");
    }
}

function loadDataFromStorage() {
    var savedHasilInputArray = JSON.parse(localStorageStorage.getItem('hasilInputArray')) || [];
    var savedUbahJumlahInputData = JSON.parse(localStorage.getItem('ubahJumlahInputData')) || [];

    if (savedHasilInputArray.length > 0) {
        hasilInputArray = savedHasilInputArray;
    }

    if (savedUbahJumlahInputData.length > 0) {
        inputValues = savedUbahJumlahInputData;
    }
}

// Fungsi untuk menyimpan data ke sessionStorage dan localStorage
function simpanDataKeStorage() {
    localStorageStorage.setItem('hasilInputArray', JSON.stringify(hasilInputArray));
    localStorage.setItem('ubahJumlahInputData', JSON.stringify(inputValues));
}

// Panggil fungsi ini saat halaman dimuat
window.onload = isiTanggalDanWaktu,function () {
    // Memuat data dari sessionStorage dan localStorage
    loadDataFromStorage();

    // Menampilkan data di halaman
    tampilkanData();
};

function isiTanggalDanWaktu() {
    var sekarang = new Date();
    var options = {  year: 'numeric', month: 'long', day: 'numeric', hour: 'numeric', minute: 'numeric' };
    var tanggalWaktu = new Intl.DateTimeFormat('id-ID', options).format(sekarang);
    document.getElementById("tanggalWaktu").value = tanggalWaktu;
}

