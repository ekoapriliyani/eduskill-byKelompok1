<?php
include "koneksi.php";

$id_kursus = $_GET["id_kursus"];

$query = "DELETE FROM tkursus WHERE id_kursus = '$id_kursus'";
if (mysqli_query($conn, $query)) {
    echo "<script>
        alert('Data Kursus berhasil dihapus');
        document.location.href='kursus.php';
    </script>";
} else {
    echo "<script>
        alert('Data Kursus gagal dihapus');
        document.location.href='kursus.php';
    </script>";
}
