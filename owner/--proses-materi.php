<?php
include 'koneksi.php';

if (isset($_POST["tambah"])) {
    $nama_materi = mysqli_real_escape_string($conn, $_POST["nama_materi"]);
    $deskripsi_materi = mysqli_real_escape_string($conn, $_POST["deskripsi_materi"]);
    $file_materi = mysqli_real_escape_string($conn, $_POST["file_materi"]);
    $kursus = $_POST["kursus"];

    var_dump($_POST);

    // Query untuk memasukkan data ke tabel
    $query = "INSERT INTO tmateri (nama_materi, deskripsi_materi, file_materi, id_kursus) 
              VALUES ('$nama_materi', '$deskripsi_materi', '$file_materi', '$kursus')";

    // Eksekusi query dan cek hasilnya
    if (mysqli_query($conn, $query)) {
        echo "<script>
            alert('Materi Berhasil disimpan');
            document.location.href='materi.php';
        </script>";
    } else {
        echo "<script>
            alert('Materi Gagal disimpan: " . mysqli_error($conn) . "');
            document.location.href='materi.php';
        </script>";
    }
}
