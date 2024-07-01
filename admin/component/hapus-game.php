<?php
include '../../koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Validasi ID (penting untuk keamanan)
    if (!is_numeric($id) || $id <= 0) {
        die("ID game tidak valid.");
    }

    // Gunakan prepared statements untuk mencegah SQL injection
    $sqlCurrencies = "DELETE FROM currencies WHERE game_id = ?";
    $stmtCurrencies = $koneksi->prepare($sqlCurrencies);
    $stmtCurrencies->bind_param("i", $id);

    if ($stmtCurrencies->execute()) {
        // Hapus data di tabel games
        $sqlGames = "DELETE FROM games WHERE id = ?";
        $stmtGames = $koneksi->prepare($sqlGames);
        $stmtGames->bind_param("i", $id);

        if ($stmtGames->execute()) {
            header('Location: ../config-game.php'); // Redirect setelah berhasil
        } else {
            echo "Error menghapus game: " . $stmtGames->error;
        }

        $stmtGames->close();
    } else {
        echo "Error menghapus currencies: " . $stmtCurrencies->error;
    }

    $stmtCurrencies->close();
} else {
    echo "ID game tidak ditemukan.";
}

$koneksi->close();
