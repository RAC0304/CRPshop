<?php
include '../../koneksi.php';

if (isset($_POST['transactionId'])) {
    $transactionId = $_POST['transactionId'];

    $deleteSql = "DELETE FROM transactions WHERE id = $transactionId";

    if ($koneksi->query($deleteSql) === TRUE) {
        echo "Transaction deleted successfully";
    } else {
        echo "Error deleting transaction: " . $koneksi->error;
    }
}
