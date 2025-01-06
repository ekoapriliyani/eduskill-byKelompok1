<?php
include 'koneksi.php';

if (isset($_POST['tambah'])) {
    $nama_materi = $_POST['nama_materi'];
    $deskripsi_materi = $_POST['deskripsi_materi'];
    $id_kursus = $_POST['kursus'];

    // Proses upload file
    $target_dir = "uploads/";
    $file_materi = $_FILES["file_materi"]["name"];
    $target_file = $target_dir . basename($file_materi);
    $file_type = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validasi file
    if ($file_type == "pdf" || $file_type == "doc" || $file_type == "docx") {
        if (move_uploaded_file($_FILES["file_materi"]["tmp_name"], $target_file)) {
            // Simpan data ke database
            $query = "INSERT INTO tmateri (id_kursus, nama_materi, deskripsi_materi, file_materi) 
                      VALUES ('$id_kursus', '$nama_materi', '$deskripsi_materi', '$file_materi')";

            if (mysqli_query($conn, $query)) {
                echo "<script>alert('Data berhasil ditambahkan!'); window.location.href='materi.php';</script>";
            } else {
                echo "Error: " . $query . "<br>" . mysqli_error($conn);
            }
        } else {
            echo "<script>alert('Gagal mengunggah file!'); window.history.back();</script>";
        }
    } else {
        echo "<script>alert('Format file tidak didukung! Hanya PDF, DOC, atau DOCX.'); window.history.back();</script>";
    }
}
?>

