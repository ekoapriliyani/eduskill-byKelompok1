<?php
include "koneksi.php";

$id = $_GET["id"];

$query = "DELETE FROM tuser WHERE id = '$id'";
if (mysqli_query($conn, $query)) {
    echo "<script>
        alert('User berhasil dihapus');
        document.location.href='users.php';
    </script>";
} else {
    echo "<script>
        alert('User gagal dihapus');
        document.location.href='users.php';
    </script>";
}
