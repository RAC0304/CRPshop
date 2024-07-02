<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Checkout Game </title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"/>
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet"/>
    <link rel="icon" type="image/x-icon" href="./img/logo.png" />
    <link rel="stylesheet" href="checkout.css" />
</head>

<body>
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
                            echo '<a href="#" class="btn btn-primary">';
                            echo "$username"; // Tampilkan nama pengguna atau teks sesuai kebutuhan
                            echo '</a>';
                        } else {
                            echo '<a href="login.php" class="btn btn-default">Login</a>';
                        }
                        ?>
                    </li>
                    <li class="nav-item">
                        <?php
                        if (isset($_SESSION['username'])) {
                            echo '<a href="../../logout.php" class="btn btn-danger">Logout</a>';
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
            // Ambil data transaksi dari database berdasarkan user_id
            include '../../koneksi.php';

            if (isset($_SESSION['user_id'])) {
                $userID = $_SESSION['user_id'];

                // Query untuk mengambil data transaksi terakhir dari user yang login
                $transactionQuery = "SELECT * FROM transactions WHERE user_id = '$userID' ORDER BY created_at DESC LIMIT 1";
                $transactionResult = mysqli_query($koneksi, $transactionQuery);

                if ($transactionResult && mysqli_num_rows($transactionResult) > 0) {
                    $transaction = mysqli_fetch_assoc($transactionResult);
                    ?>
                    <tr>
                        <th>Id Game:</th>
                        <td><?php echo htmlspecialchars($transaction['package_id']); ?></td>
                    </tr>
                    <tr>
                        <th>Nominal:</th>
                        <td><?php echo htmlspecialchars($transaction['amount']); ?> DIAMOND</td>
                    </tr>
                    <tr>
                        <th>Pembayaran:</th>
                        <td><?php echo htmlspecialchars($transaction['payment_method']); ?></td>
                    </tr>
                    <tr>
                        <th>Total Harga:</th>
                        <td>Rp <?php echo number_format($transaction['total_price'], 0, ',', '.'); ?></td>
                    </tr>
                    <?php
                } else {
                    echo "<tr><td colspan='2'>Data transaksi tidak ditemukan.</td></tr>";
                }

                mysqli_close($koneksi);
            } else {
                echo "<tr><td colspan='2'>Session user_id tidak tersedia.</td></tr>";
            }
            ?>
        </table>
    </div>
    <div class="order-button">
        <button type="button" class="btn btn-primary">KLIK UNTUK MEMESAN</button>
    </div>
</main>
<footer>
    <p>&copy; 2024 CRPshop. All rights reserved.</p>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
