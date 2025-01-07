<?php
// Sambungkan ke database
$conn = mysqli_connect("localhost", "root", "", "db_eduskill");

// Periksa koneksi
if (!$conn) {
    die("Koneksi gagal: " . mysqli_connect_error());
}

// Tangkap id_materi dari URL
if (isset($_GET['id_materi'])) {
    $id_materi = mysqli_real_escape_string($conn, $_GET['id_materi']);

    // Nonaktifkan foreign key checks
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 0");

    // Hapus data
    $query = "DELETE FROM tmateri WHERE id_materi = '$id_materi'";
    $result = mysqli_query($conn, $query);

    // Aktifkan kembali foreign key checks
    mysqli_query($conn, "SET FOREIGN_KEY_CHECKS = 1");

    if ($result) {
        echo "<script>
            alert('Data berhasil dihapus');
            window.location.href = 'materi.php';
        </script>";
    } else {
        echo "<script>
            alert('Gagal menghapus data');
            window.location.href = 'materi.php';
        </script>";
    }
} else {
    echo "<script>
        alert('ID materi tidak ditemukan');
        window.location.href = 'materi.php';
    </script>";
}

// Tutup koneksi
mysqli_close($conn);
?>
