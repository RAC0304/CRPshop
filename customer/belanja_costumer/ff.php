<?php
session_start();
include '../../koneksi.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Periksa apakah user_id dari session sudah tersedia
  if (!isset($_SESSION['user_id'])) {
    echo "Error: Session user_id tidak tersedia.";
    exit(); // Hentikan eksekusi lebih lanjut jika session tidak tersedia
  }

  // Ambil user_id dari session
  $userID = $_SESSION['user_id'];

  // Ambil data dari form
  $playerID = mysqli_real_escape_string($koneksi, $_POST['playerID']); // Ambil playerID dari form
  $nominalFF = mysqli_real_escape_string($koneksi, $_POST['nominalFF']);
  $price = mysqli_real_escape_string($koneksi, $_POST['price']);
  $paymentMethod = mysqli_real_escape_string($koneksi, $_POST['paymentMethod']); 

  // Ambil currency_id dari tabel currencies berdasarkan nama
  $currencyQuery = "SELECT id FROM currencies WHERE name = 'Diamond - ff'";
  $currencyResult = mysqli_query($koneksi, $currencyQuery);

  if ($currencyResult && mysqli_num_rows($currencyResult) > 0) {
    $currencyRow = mysqli_fetch_assoc($currencyResult);
    $currency_id = $currencyRow['id'];
    $is_active = 1; // Misalnya, paket selalu aktif

    // Nama paket
    $name = mysqli_real_escape_string($koneksi, $nominalFF . " Diamonds Free Fire");

    // Simpan data ke dalam tabel packages
    $query = "INSERT INTO packages (currency_id, name, amount, price, bonus_amount, is_active, created_at, updated_at) 
              VALUES ('$currency_id', '$name', '$nominalFF', '$price', '0', '$is_active', NOW(), NOW())";

    if (mysqli_query($koneksi, $query)) {
      // Simpan juga ke dalam tabel transactions
      $package_id = mysqli_insert_id($koneksi);
      $transactionQuery = "INSERT INTO transactions (user_id, package_id, player_id, amount, total_price, status, payment_method, created_at, updated_at)
                          VALUES ('$userID', '$package_id', '$playerID', '$nominalFF', '$price', 'pending', '$paymentMethod', NOW(), NOW())";

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
</head>

<body>
  <?php include 'header.php'; ?>

  <div class="container">
    <h1 class="title__list">
      LIST HARGA LENGKAP <span class="th">Diamonds Free Fire CRPshop</span>
    </h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="server">
        <div class="input-container">
          <label for="playerID" class="input-label">Player ID</label>
          <input type="number" class="form-control" id="playerID" name="playerID" placeholder="Masukkan Player ID" required />
        </div>
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
      <input type="hidden" name="nominalFF" id="nominalFF" />
      <input type="hidden" name="price" id="price" />
      <div class="payment-method-container">
        <label for="paymentMethod" class="input-label">Pilih Metode Pembayaran</label>
        <select class="form-select" id="paymentMethod" name="paymentMethod">
          <option value="Dana">Dana</option>
          <option value="Alfamart">Alfamart</option>
          <option value="OVO">OVO</option>
          <option value="Link Aja">Link Aja</option>
          <option value="GoPay">GoPay</option>
          <option value="ShopeePay">ShopeePay</option>
          <option value="Mandiri">Mandiri</option>
          <option value="BNI">BNI</option>
          <option value="BCA">BCA</option>
          <option value="BRI">BRI</option>
        </select>
      </div>
      <div class="order">
        <button type="submit" class="btn btn-danger" id="orderButton">Order</button>
      </div>
    </form>
  </div>
  <script>
    function selectDiamond(row, nominal, price) {
      const rows = document.querySelectorAll(".table tbody tr");
      rows.forEach((r) => r.classList.remove("selected"));
      row.classList.toggle("selected");

      document.getElementById('nominalFF').value = nominal;
      document.getElementById('price').value = price;
    }
  </script>
</body>
</html>
