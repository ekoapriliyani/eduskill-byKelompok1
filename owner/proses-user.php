<?php

include 'koneksi.php';

if (isset($_POST["tambah"])) {

    $username = $_POST["username"];
    $nama_lengkap = $_POST["nama_lengkap"];
    $password = md5($_POST["password"]);
    $level = $_POST["level"];

    // Query untuk memasukkan data ke tabel
    $query = "INSERT INTO tuser (username, nama_lengkap, password, level) 
              VALUES ('$username', '$nama_lengkap', '$password', '$level')";

    // Eksekusi query dan cek hasilnya
    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('User Berhasil disimpan');
            document.location.href='users.php';
        </script>";
    } else {
        echo "<script>
            alert('User Gagal disimpan: " . mysqli_error($conn) . "');
            document.location.href='users.php';
        </script>";
    }
}
