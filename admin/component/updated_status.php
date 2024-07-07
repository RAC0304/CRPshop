<?php
include '../../koneksi.php';

if (isset($_POST['transactionId']) && isset($_POST['newStatus'])) {
    $transactionId = $_POST['transactionId'];
    $newStatus = $_POST['newStatus'];

    $updateSql = "UPDATE transactions SET status = '$newStatus' WHERE id = $transactionId";

    if ($koneksi->query($updateSql) === TRUE) {
        echo "Status updated successfully";
    } else {
        echo "Error updating status: " . $koneksi->error;
    }
} else {
    echo "Invalid request";
}
