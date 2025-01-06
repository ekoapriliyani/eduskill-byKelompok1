<?php

include 'koneksi.php';

// Fungsi untuk menghasilkan kode otomatis
function generateCode($conn, $prefix, $table, $column)
{
    // Query untuk mendapatkan kode terakhir
    $query = "SELECT $column FROM $table ORDER BY $column DESC LIMIT 1";
    $result = mysqli_query($conn, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $lastCode = $row[$column];

        // Ekstrak angka dari kode terakhir
        $number = (int)substr($lastCode, strlen($prefix));

        // Tambahkan 1 ke angka terakhir
        $newNumber = $number + 1;
    } else {
        // Jika tidak ada data, mulai dari 1
        $newNumber = 1;
    }

    // Format angka menjadi tiga digit
    return $prefix . str_pad($newNumber, 3, "0", STR_PAD_LEFT);
}

if (isset($_POST["tambah"])) {
    // Generate kode otomatis
    $id_kursus = generateCode($conn, "EDU-", "tkursus", "id_kursus");

    $nama_kursus = $_POST["nama_kursus"];
    $deskripsi_kursus = $_POST["deskripsi_kursus"];
    $kategori = $_POST["kategori"];

    // Query untuk memasukkan data ke tabel
    $query = "INSERT INTO tkursus (id_kursus, nama_kursus, deskripsi_kursus, id_kategori) 
              VALUES ('$id_kursus', '$nama_kursus', '$deskripsi_kursus', '$kategori')";

    // Eksekusi query dan cek hasilnya
    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Data Berhasil disimpan');
            document.location.href='kursus.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal disimpan: " . mysqli_error($conn) . "');
            document.location.href='kursus.php';
        </script>";
    }
}
