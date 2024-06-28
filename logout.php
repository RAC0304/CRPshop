<?php
session_start(); // Mulai session

// Hapus semua data session
session_unset();
session_destroy();

// Redirect ke halaman login (atau halaman lain yang sesuai)
header("Location: login.php"); // Sesuaikan dengan nama file login Anda
exit; // Hentikan eksekusi skrip setelah redirect
