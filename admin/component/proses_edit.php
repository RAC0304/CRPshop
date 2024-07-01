<?php
include '../../koneksi.php';

// Ambil data dari form
$id = $_POST['id'];
$nama = $_POST['name'];
$username = $_POST['username'];
$email = $_POST['email'];
$role = $_POST['role'];
$pass = $_POST['password'];

// Update data ke database
$sql = "UPDATE users SET name = ?, email = ?, username = ?, role = ?, updated_at = NOW() WHERE id = ?";
$stmt = $koneksi->prepare($sql);
$stmt->bind_param("ssssi", $nama, $email, $username, $role, $id); // Jika enkripsi password, tambahkan $hashed_pass

if ($stmt->execute()) {
    echo "Data berhasil diupdate.";
    header("Location:../user-config.php");
} else {
    echo "Error: " . $stmt->error;
}

$stmt->close();
$koneksi->close();
