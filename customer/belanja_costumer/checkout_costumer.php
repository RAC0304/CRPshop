<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout Game </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" />
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet" />
    <link rel="icon" type="image/x-icon" href="./img/logo.png" />
    <link rel="stylesheet" href="checkout.css" />
</head>

<body style="font-family: 'Times New Roman', Times, serif;">
    <header>
        <div class="container">
            <nav class="navbar navbar-expand-lg">
                <a href="../index.php" class="navbar-brand">
                    <img src="../img/logoputih.png" alt="Logo" />
                </a>

                <div class="collapse navbar-collapse">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION['username'])) {
                                $username = $_SESSION['username'];
                                echo '<button class="btn-nama" disabled>';
                                echo "$username"; // Tampilkan nama pengguna atau teks sesuai kebutuhan
                                echo '</button>';
                            } else {
                                echo '<a href="login.php" class="btn btn-default">Login</a>';
                            }
                            ?>
                        </li>
                        <li class="nav-item">
                            <?php
                            if (isset($_SESSION['username'])) {
                                echo '<a href="../../logout.php" class="btn btn-danger" style="fon">Logout</a>';
                            }
                            ?>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <main class="container">
        <h1 class="title__list">
            CHECKOUT <span class="th">TOPUP GAME ONLINE CRPshop</span>
        </h1>
        <div class="table-container">
            <table class="table">
                <?php
                include '../../koneksi.php';

                if (isset($_SESSION['user_id'])) {
                    $userID = $_SESSION['user_id'];

                    // Menggunakan prepared statement untuk mencegah SQL injection
                    $transactionQuery = "SELECT 
                        transactions.*, 
                        packages.name AS package_name, 
                        payment_methods.name AS payment_method_name,
                        account_numbers.number AS nama_rek,
                        account_numbers.nama_pemilik AS nama_punya
                    FROM 
                        transactions 
                    JOIN 
                        packages ON transactions.package_id = packages.id 
                    JOIN 
                        payment_methods ON transactions.payment_method_id = payment_methods.id
                    LEFT JOIN 
                        account_numbers ON payment_methods.id = account_numbers.payment_method_id
                    WHERE 
                        transactions.user_id = ?
                    ORDER BY 
                        transactions.created_at DESC 
                    LIMIT 1";

                    if ($stmt = mysqli_prepare($koneksi, $transactionQuery)) {
                        mysqli_stmt_bind_param($stmt, "i", $userID);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);

                        if ($result && mysqli_num_rows($result) > 0) {
                            $transaction = mysqli_fetch_assoc($result);
                ?>
                            <tr>
                                <th>Player ID:</th>
                                <td><?php echo htmlspecialchars($transaction['player_id']); ?></td>
                            </tr>
                            <tr>
                                <th>Nominal:</th>
                                <td><?php echo htmlspecialchars($transaction['package_name']); ?></td>
                            </tr>
                            <tr>
                                <th>Pembayaran:</th>
                                <td><?php echo htmlspecialchars($transaction['payment_method_name']); ?></td>
                            </tr>
                            <tr>
                                <th>No. Rek / No. Telp:</th>
                                <td><?php echo htmlspecialchars($transaction['nama_rek'] . " - " . $transaction['nama_punya'] ?? 'Tidak tersedia'); ?></td>
                            </tr>
                            <tr>
                                <th>Total Harga:</th>
                                <td>Rp <?php echo number_format($transaction['total_price'], 0, ',', '.'); ?></td>
                            </tr>
                <?php
                        } else {
                            echo "<tr><td colspan='2'>Data transaksi tidak ditemukan.</td></tr>";
                        }
                        mysqli_stmt_close($stmt);
                    } else {
                        echo "<tr><td colspan='2'>Error dalam persiapan query: " . mysqli_error($koneksi) . "</td></tr>";
                    }

                    mysqli_close($koneksi);
                } else {
                    echo "<tr><td colspan='2'>Session user_id tidak tersedia.</td></tr>";
                }
                ?>
            </table>
        </div>
        <div class="order-button">
            <a href="../index.php"> <button type="button" class="btn btn-primary">KEMBALI KE HOME</button>
            </a>
        </div>
    </main>
    <footer>
        <p>&copy; 2024 CRPshop. All rights reserved.</p>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>