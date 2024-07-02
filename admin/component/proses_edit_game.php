<?php
include '../../koneksi.php'; // Pastikan Anda sudah menghubungkan ke database

if (isset($_POST['update'])) {
    $id = $_POST['id'];
    $game_name = $_POST['game_name'];
    $currency_name = $_POST['currency_name'];
    $symbol = $_POST['symbol'];

    // Cek apakah ada gambar yang diupload
    if ($_FILES['image']['name'] != "") {
        $image = $_FILES['image']['name'];
        $target = "../../image/" . basename($image);

        if (move_uploaded_file($_FILES['image']['tmp_name'], $target)) {
            $sql = "UPDATE games 
                    INNER JOIN currencies ON games.id = currencies.game_id 
                    SET games.names='$game_name', games.image='$image', currencies.name='$currency_name', currencies.symbol='$symbol' 
                    WHERE games.id=$id";
        } else {
            echo "Gagal mengupload gambar!";
            exit;
        }
    } else {
        $sql = "UPDATE games 
                INNER JOIN currencies ON games.id = currencies.game_id 
                SET games.names='$game_name', currencies.name='$currency_name', currencies.symbol='$symbol' 
                WHERE games.id=$id";
    }

    if ($koneksi->query($sql) === TRUE) {
        header('Location: ../config-game.php'); // Redirect ke halaman utama setelah update berhasil
    } else {
        echo "Error: " . $koneksi->error;
    }
}
