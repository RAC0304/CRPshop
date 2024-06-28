<?php
// mengaktifkan session pada php
session_start();

// menghubungkan php dengan koneksi database
include 'koneksi.php';

// menangkap data yang dikirim dari form login
$username = $_POST['username'];
$password = $_POST['pass'];


// menyeleksi data user dengan username dan password yang sesuai
$login = mysqli_query($koneksi, "select * from users where username='$username' and password='$password'");
// menghitung jumlah data yang ditemukan
$cek = mysqli_num_rows($login);

// cek apakah username dan password di temukan pada database
if ($cek > 0) {

    $data = mysqli_fetch_array($login);

    // cek jika user login sebagai admin
    if ($data['role'] == "admin") {

        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "admin";
        // alihkan ke halaman dashboard admin
        header("location:admin/index_admin.php");

        // cek jika user login sebagai user
    } else if ($data['role'] == "user") {
        // buat session login dan username
        $_SESSION['username'] = $username;
        $_SESSION['role'] = "user";
        // alihkan ke halaman dashboard pegawai
        header("location:customer/index.html");
    } else {

        // alihkan ke halaman login kembali
        header("location:login.php?login=gagal");
    }
} else {
    header("location:login.php?login=gagal");
}
