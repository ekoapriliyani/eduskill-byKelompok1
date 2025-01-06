<?php

include 'koneksi.php';

if (isset($_POST["tambah"])) {
    // Generate kode otomatis

    $nama_kategori = $_POST["nama_kategori"];

    // Query untuk memasukkan data ke tabel
    $query = "INSERT INTO tkategori (nama_kategori) 
              VALUES ('$nama_kategori')";

    // Eksekusi query dan cek hasilnya
    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Kategori Berhasil disimpan');
            document.location.href='kategori.php';
        </script>";
    } else {
        echo "<script>
            alert('Kategori Gagal disimpan: " . mysqli_error($conn) . "');
            document.location.href='kategori.php';
        </script>";
    }
}
