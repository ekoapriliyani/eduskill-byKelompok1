<?php
include "koneksi.php";

$id = $_GET["id"];

$query = "DELETE FROM tkategori WHERE id_kategori = $id";
if (mysqli_query($conn, $query)) {
    echo "<script>
        alert('kategori berhasil dihapus');
        document.location.href='kategori.php';
    </script>";
} else {
    echo "<script>
        alert('kategori gagal dihapus karena masih terikat di data kursus');
        document.location.href='kategori.php';
    </script>";
}
