<?php
session_start();
include '../../koneksi.php';

// Inisialisasi variabel username
$username = '';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (!isset($_SESSION['user_id'])) {
        echo "Error: Session user_id tidak tersedia.";
        exit();
    }

    $userID = $_SESSION['user_id'];
    $playerID = mysqli_real_escape_string($koneksi, $_POST['playerID']);
    $nominalDiamond = mysqli_real_escape_string($koneksi, $_POST['nominalDiamond']);
    $price = mysqli_real_escape_string($koneksi, $_POST['price']);
    $paymentMethod = mysqli_real_escape_string($koneksi, $_POST['paymentMethod']);

    // Validasi Player ID menggunakan API
    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => "https://id-game-checker.p.rapidapi.com/ff-global/{$playerID}",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "GET",
        CURLOPT_HTTPHEADER => [
            "x-rapidapi-host: id-game-checker.p.rapidapi.com",
            "x-rapidapi-key: c4d6686103mshb4cce097d03c584p16afacjsn51a07fd9bde2" // Ganti dengan API key Anda
        ],
    ]);

    $response = curl_exec($curl);
    $err = curl_error($curl);

    curl_close($curl);

    if ($err) {
        echo "Error: " . $err;
        exit();
    } else {
        $result = json_decode($response, true);
        if (!$result || !isset($result['success']) || !$result['success']) {
            echo "Error: Player ID tidak valid.";
            exit();
        } else {
            $username = $result['data']['username'];
        }
    }

    // Ambil data dari form
    $playerID = mysqli_real_escape_string($koneksi, $_POST['playerID']);
    $nominalDiamond = mysqli_real_escape_string($koneksi, $_POST['nominalDiamond']);
    $price = mysqli_real_escape_string($koneksi, $_POST['price']);
    $paymentMethod = mysqli_real_escape_string($koneksi, $_POST['paymentMethod']);

    // Periksa apakah user_id valid
    $checkUserQuery = "SELECT * FROM users WHERE id = '$userID'";
    $checkUserResult = mysqli_query($koneksi, $checkUserQuery);

    if (!$checkUserResult || mysqli_num_rows($checkUserResult) == 0) {
        echo "Error: User dengan ID '$userID' tidak ditemukan.";
        exit();
    }

    // Periksa apakah payment_method valid dan dapatkan ID-nya
    $checkPaymentMethodQuery = "SELECT id FROM payment_methods WHERE id = '$paymentMethod'";
    $checkPaymentMethodResult = mysqli_query($koneksi, $checkPaymentMethodQuery);

    if (!$checkPaymentMethodResult || mysqli_num_rows($checkPaymentMethodResult) == 0) {
        echo "Error: Metode pembayaran '$paymentMethod' tidak valid.";
        exit();
    }

    $paymentMethodRow = mysqli_fetch_assoc($checkPaymentMethodResult);
    $paymentMethodID = $paymentMethodRow['id'];

    // Simpan data ke dalam tabel packages
    $currencyQuery = "SELECT id FROM currencies WHERE name = 'Diamond - ff'";
    $currencyResult = mysqli_query($koneksi, $currencyQuery);

    if ($currencyResult && mysqli_num_rows($currencyResult) > 0) {
        $currencyRow = mysqli_fetch_assoc($currencyResult);
        $currency_id = $currencyRow['id'];
        $is_active = 1; // Misalnya, paket selalu aktif

        $name = $nominalDiamond . " Diamond Free Fire";
        $query = "INSERT INTO packages (currency_id, name, amount, price, bonus_amount, is_active, created_at, updated_at) 
                    VALUES ('$currency_id', '$name', '$nominalDiamond', '$price', '0', '$is_active', NOW(), NOW())";

        if (mysqli_query($koneksi, $query)) {
            // Simpan juga ke dalam tabel transactions
            $package_id = mysqli_insert_id($koneksi);
            $transactionQuery = "INSERT INTO transactions (user_id, package_id, player_id, amount, total_price, status, payment_method_id, created_at, updated_at)
                                VALUES ('$userID', '$package_id', '$playerID', '$nominalDiamond', '$price', 'pending', '$paymentMethodID', NOW(), NOW())";

            if (mysqli_query($koneksi, $transactionQuery)) {
                // Redirect ke checkout_costumer.php dengan mengirim data via GET
                $redirectURL = "checkout_costumer.php";
                header("Location: $redirectURL");
                exit();
            } else {
                echo "Error: " . $transactionQuery . "<br>" . mysqli_error($koneksi);
            }
        } else {
            echo "Error: " . $query . "<br>" . mysqli_error($koneksi);
        }
    } else {
        echo "Error: Mata uang tidak ditemukan";
    }

    mysqli_close($koneksi);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Harga Diamonds Free Fire</title>
    <link rel="stylesheet" href="harga.css" />
    <link rel="icon" type="image/x-icon" href="../../img/logo.png">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
</head>

<body>
    <?php include 'header.php'; ?>

    <div class="container">
        <h1 class="title__list">
            LIST HARGA LENGKAP <span class="th">Diamonds Free Fire CRPshop</span>
        </h1>
        <form id="orderForm" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
            <div class="server">
                <div class="input-container">
                    <label for="playerID" class="input-label">Player ID</label>
                    <input type="number" class="form-control" id="playerID" name="playerID" placeholder="Masukkan Player ID" required />
                </div>
                <div id="username-display" style="display: none;">
                    <span id="username"></span>
                </div>
                <div class="btn-check-id" id="check-id-button">Cek ID</div>
            </div>
            <table border="1" class="table">
                <thead>
                    <tr>
                        <th>Nominal Diamonds</th>
                        <th>Harga</th>
                    </tr>
                </thead>
                <tbody>
                    <tr onclick="selectDiamond(this, 50, 9500)">
                        <td>50 Diamonds</td>
                        <td>Rp 9.500</td>
                    </tr>
                    <tr onclick="selectDiamond(this, 100, 19000)">
                        <td>100 Diamonds</td>
                        <td>Rp 19.000</td>
                    </tr>
                    <tr onclick="selectDiamond(this, 310, 58000)">
                        <td>310 Diamonds</td>
                        <td>Rp 58.000</td>
                    </tr>
                    <tr onclick="selectDiamond(this, 520, 97000)">
                        <td>520 Diamonds</td>
                        <td>Rp 97.000</td>
                    </tr>
                    <tr onclick="selectDiamond(this, 1060, 192000)">
                        <td>1060 Diamonds</td>
                        <td>Rp 192.000</td>
                    </tr>
                    <tr onclick="selectDiamond(this, 2180, 388000)">
                        <td>2180 Diamonds</td>
                        <td>Rp 388.000</td>
                    </tr>
                    <tr onclick="selectDiamond(this, 5600, 970000)">
                        <td>5600 Diamonds</td>
                        <td>Rp 970.000</td>
                    </tr>
                    <tr onclick="selectDiamond(this, 6450, 1200000)">
                        <td>6450 Diamonds</td>
                        <td>Rp 1.200.000</td>
                    </tr>
                    <tr onclick="selectDiamond(this, 8300, 1500000)">
                        <td>8300 Diamonds</td>
                        <td>Rp 1.500.000</td>
                    </tr>
                    <tr onclick="selectDiamond(this, 10680, 1920000)">
                        <td>10680 Diamonds</td>
                        <td>Rp 1.920.000</td>
                    </tr>
                </tbody>
            </table>
            <input type="hidden" name="nominalDiamond" id="nominalDiamond" />
            <input type="hidden" name="price" id="price" />
            <div class="payment-method-container">
                <label for="paymentMethod" class="input-label">Pilih Metode Pembayaran</label>
                <?php
                $sql = "SELECT * FROM payment_methods";
                $result = mysqli_query($koneksi, $sql);

                if ($result) {
                    echo "<select class='form-control' id='paymentMethod' name='paymentMethod'>";
                    echo "<option value=''>Pilih Metode Pembayaran</option>";
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo "<option value='" . $row['id'] . "'>" . $row['name'] . "</option>";
                    }
                    echo "</select>";
                } else {
                    echo "<p>Error: " . mysqli_error($koneksi) . "</p>";
                }
                ?>
            </div>
            <div class="order">
                <button type="submit" class="btn btn-success" id="orderButton">Order</button>
      </div>
        </form>
    </div>

    <script>
        $(document).ready(function() {
            var isPlayerIDValid = false;

            $("#check-id-button").click(function() {
                var playerID = $("#playerID").val();

                $.ajax({
                    url: `https://id-game-checker.p.rapidapi.com/ff-global/${playerID}`,
                    type: "GET",
                    headers: {
                        "x-rapidapi-host": "id-game-checker.p.rapidapi.com",
                        "x-rapidapi-key": "c4d6686103mshb4cce097d03c584p16afacjsn51a07fd9bde2"
                    },
                    success: function(response) {
                        if (response && response.success) {
                            $("#username").text(response.data.username);
                            $("#username-display").show();
                            isPlayerIDValid = true;
                            alert("Player ID valid.");
                        } else {
                            alert("Player ID tidak valid.");
                            isPlayerIDValid = false;
                        }
                    },
                    error: function() {
                        alert("Terjadi kesalahan saat memeriksa Player ID.");
                        isPlayerIDValid = false;
                    }
                });
            });

            $("#orderForm").submit(function(event) {
                if (!isPlayerIDValid) {
                    alert("Player ID tidak valid. Silakan periksa kembali Player ID Anda.");
                    event.preventDefault();
                }
            });
        });

        function selectDiamond(row, amount, price) {
            document.querySelectorAll('tbody tr').forEach(tr => tr.classList.remove('selected'));
            row.classList.add('selected');
            document.getElementById('nominalDiamond').value = amount;
            document.getElementById('price').value = price;
        }
    </script>
</body>

</html>

