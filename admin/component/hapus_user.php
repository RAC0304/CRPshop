<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validasi ID (opsional, untuk keamanan)
    // Misalnya, periksa apakah ID valid dan ada di database

    // Query untuk menghapus pengguna
    $sql = "DELETE FROM users WHERE id = ?";
    $stmt = $koneksi->prepare($sql);
    $stmt->bind_param("i", $id);

    if ($stmt->execute()) {
        echo "Pengguna berhasil dihapus.";
        header("Location:../user-config.php"); // Redirect setelah berhasil
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
} else {
    echo "ID pengguna tidak valid.";
}

$koneksi->close();
