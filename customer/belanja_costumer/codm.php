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
  $playerID = mysqli_real_escape_string($koneksi, $_POST['playerID']); // Ganti dari 'player_ID' menjadi 'playerID'
  $nominalCP = mysqli_real_escape_string($koneksi, $_POST['nominalCP']);
  $price = mysqli_real_escape_string($koneksi, $_POST['price']);
  $paymentMethod = mysqli_real_escape_string($koneksi, $_POST['paymentMethod']); // Ambil paymentMethod dari form

  // Periksa apakah user_id valid
  $checkUserQuery = "SELECT * FROM users WHERE id = '$userID'";
  $checkUserResult = mysqli_query($koneksi, $checkUserQuery);

  if (!$checkUserResult || mysqli_num_rows($checkUserResult) == 0) {
    echo "Error: User dengan ID '$userID' tidak ditemukan.";
    exit(); // Hentikan eksekusi lebih lanjut jika user_id tidak valid
  }

  // Ambil currency_id dari tabel currencies berdasarkan nama
  $currencyQuery = "SELECT id FROM currencies WHERE name = 'COD Points'";
  $currencyResult = mysqli_query($koneksi, $currencyQuery);

  if ($currencyResult && mysqli_num_rows($currencyResult) > 0) {
    $currencyRow = mysqli_fetch_assoc($currencyResult);
    $currency_id = $currencyRow['id'];
    $is_active = 1; // Misalnya, paket selalu aktif

    // Nama paket
    $name = $nominalCP . " COD Points";

    // Simpan data ke dalam tabel packages
    $query = "INSERT INTO packages (currency_id, name, amount, price, bonus_amount, is_active, created_at, updated_at) 
              VALUES ('$currency_id', '$name', '$nominalCP', '$price', '0', '$is_active', NOW(), NOW())";

    if (mysqli_query($koneksi, $query)) {
      // Simpan juga ke dalam tabel transactions
      $package_id = mysqli_insert_id($koneksi);
      $transactionQuery = "INSERT INTO transactions (user_id, package_id, player_id, amount, total_price, status, payment_method, created_at, updated_at)
                          VALUES ('$userID', '$package_id', '$playerID', '$nominalCP', '$price', 'pending', '$paymentMethod', NOW(), NOW())";

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
      LIST HARGA LENGKAP <span class="th">CALL OF DUTY MOBILE CRPshop</span>
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
            <th>Nominal CP </th>
            <th>Harga Normal</th>
          </tr>
        </thead>
        <tbody>
          <tr onclick="selectCP(this, 321, 45000)">
            <td>321 CP</td>
            <td>Rp 45.000</td>
          </tr>
          <tr onclick="selectCP(this, 645, 90000)">
            <td>645 CP</td>
            <td>Rp 90.000</td>
          </tr>
          <tr onclick="selectCP(this, 800, 108000)">
            <td>800 CP</td>
            <td>Rp 108.000</td>
          </tr>
          <tr onclick="selectCP(this, 1373, 180700)">
            <td>1373 CP</td>
            <td>Rp 180.700</td>
          </tr>
          <tr onclick="selectCP(this, 1675, 272000)">
            <td>1675 CP</td>
            <td>Rp 272.000</td>
          </tr>
          <tr onclick="selectCP(this, 2060, 342000)">
            <td>2060 CP</td>
            <td>Rp 342.000</td>
          </tr>
          <tr onclick="selectCP(this, 3565, 450000)">
            <td>3565 CP</td>
            <td>Rp 450.000</td>
          </tr>
          <tr onclick="selectCP(this, 4630, 570000)">
          <td>4630 CP</td>
          <td>Rp 570.000</td>
        </tr>
        <tr onclick="selectCP(this, 5515, 680000)">
          <td>5515 CP</td>
          <td>Rp 680.000</td>
        </tr>
        <tr onclick="selectCP(this, 6480, 800000)">
          <td>6480 CP</td>
          <td>Rp 800.000</td>
        </tr>
        </tbody>
      </table>
      <input type="hidden" name="nominalCP" id="nominalCP" />
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
    function selectCP(row, nominal, price) {
      const rows = document.querySelectorAll(".table tbody tr");
      rows.forEach((r) => r.classList.remove("selected"));
      row.classList.toggle("selected");

      document.getElementById('nominalCP').value = nominal;
      document.getElementById('price').value = price;
    }
  </script>
</body>

</html>
