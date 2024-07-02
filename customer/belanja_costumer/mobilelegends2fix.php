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
  $playerID = mysqli_real_escape_string($koneksi, $_POST['playerID']);
  $nominalDiamond = mysqli_real_escape_string($koneksi, $_POST['nominalDiamond']);
  $price = mysqli_real_escape_string($koneksi, $_POST['price']);
  $paymentMethod = mysqli_real_escape_string($koneksi, $_POST['paymentMethod']);

  // Periksa apakah user_id valid
  $checkUserQuery = "SELECT * FROM users WHERE id = '$userID'";
  $checkUserResult = mysqli_query($koneksi, $checkUserQuery);

  if (!$checkUserResult || mysqli_num_rows($checkUserResult) == 0) {
    echo "Error: User dengan ID '$userID' tidak ditemukan.";
    exit(); // Hentikan eksekusi lebih lanjut jika user_id tidak valid
  }

  // Simpan data ke dalam tabel packages
  $currencyQuery = "SELECT id FROM currencies WHERE name = 'Diamond - ml'";
  $currencyResult = mysqli_query($koneksi, $currencyQuery);

  if ($currencyResult && mysqli_num_rows($currencyResult) > 0) {
    $currencyRow = mysqli_fetch_assoc($currencyResult);
    $currency_id = $currencyRow['id'];
    $is_active = 1; // Misalnya, paket selalu aktif

    $name = $nominalDiamond . " Diamond Mobile Legends";
    $query = "INSERT INTO packages (currency_id, name, amount, price, bonus_amount, is_active, created_at, updated_at) 
              VALUES ('$currency_id', '$name', '$nominalDiamond', '$price', '0', '$is_active', NOW(), NOW())";

    if (mysqli_query($koneksi, $query)) {
      // Simpan juga ke dalam tabel transactions
      $package_id = mysqli_insert_id($koneksi);
      $transactionQuery = "INSERT INTO transactions (user_id, package_id, player_id, amount, total_price, status, payment_method, created_at, updated_at)
                          VALUES ('$userID', '$package_id', '$playerID', '$nominalDiamond', '$price', 'pending', '$paymentMethod', NOW(), NOW())";

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
  <title>Daftar Harga</title>
  <link rel="stylesheet" href="harga.css" />
</head>
<body>
  <?php include 'header.php'; ?>
  <div class="container">
    <h1 class="title__list">
      LIST HARGA LENGKAP <span class="th">Mobile Legends CRPshop</span>
    </h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="lengkapidata">
        <div class="input-container">
          <label for="playerID" class="input-label">Masukkan Player ID</label>
          <input type="number" class="form-control" id="playerID" name="playerID" placeholder="Masukkan Player ID" required />
        </div>
      </div>
      <div class="server">
        <div class="input-container">
          <label for="serverID" class="input-label">Server</label>
          <input type="number" class="form-control" id="serverID" name="serverID" placeholder="1234" required />
        </div>
      </div>
      <table border="1" class="table">
        <thead>
          <tr>
            <th>Nominal Diamond</th>
            <th>Harga Normal</th>
          </tr>
        </thead>
        <tbody>
          <tr onclick="selectDiamond(this, 300, 33000)">
            <td>300 Diamond Mobile Legends</td>
            <td>Rp 33.000</td>
          </tr>
          <tr onclick="selectDiamond(this, 625, 66000)">
            <td>625 Diamond Mobile Legends</td>
            <td>Rp 66.000</td>
          </tr>
          <tr onclick="selectDiamond(this, 925, 99700)">
            <td>925 Diamond Mobile Legends</td>
            <td>Rp 99.700</td>
          </tr>
          <tr onclick="selectDiamond(this, 1125, 115500)">
            <td>1125 Diamond Mobile Legends</td>
            <td>Rp 115.500</td>
          </tr>
          <tr onclick="selectDiamond(this, 1425, 148500)">
            <td>1425 Diamond Mobile Legends</td>
            <td>Rp 148.500</td>
          </tr>
          <tr onclick="selectDiamond(this, 1650, 165000)">
            <td>1650 Diamond Mobile Legends</td>
            <td>Rp 165.000</td>
          </tr>
          <tr onclick="selectDiamond(this, 1950, 198000)">
            <td>1950 Diamond Mobile Legends</td>
            <td>Rp 198.000</td>
          </tr>
        </tbody>
      </table>
      <input type="hidden" name="nominalDiamond" id="nominalDiamond" />
      <input type="hidden" name="price" id="price" />
      <div class="payment-method-container">
        <label for="paymentMethod" class="input-label">Pilih Metode Pembayaran</label>
        <select class="form-select" id="paymentMethod" name="paymentMethod" required>
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
        <button type="submit" class="btn btn-success" id="orderButton">Order</button>
      </div>
    </form>
  </div>
  <script>
    function selectDiamond(row, nominal, price) {
      const rows = document.querySelectorAll(".table tbody tr");
      rows.forEach((r) => r.classList.remove("selected"));
      row.classList.toggle("selected");

      document.getElementById('nominalDiamond').value = nominal;
      document.getElementById('price').value = price;
    }
  </script>
</body>
</html>
