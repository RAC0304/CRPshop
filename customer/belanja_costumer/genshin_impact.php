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
  $playerID = mysqli_real_escape_string($koneksi, $_POST['userID']); // Ambil Player ID dari form
  $nominalGC = mysqli_real_escape_string($koneksi, $_POST['nominalGC']);
  $price = mysqli_real_escape_string($koneksi, $_POST['price']);
  $paymentMethod = mysqli_real_escape_string($koneksi, $_POST['paymentMethod']);

  // Ambil currency_id dari tabel currencies berdasarkan nama
  $currencyQuery = "SELECT id FROM currencies WHERE name = 'Genesis Crystal'";
  $currencyResult = mysqli_query($koneksi, $currencyQuery);

  if ($currencyResult && mysqli_num_rows($currencyResult) > 0) {
    $currencyRow = mysqli_fetch_assoc($currencyResult);
    $currency_id = $currencyRow['id'];
    $is_active = 1; // Misalnya, paket selalu aktif

    // Nama paket
    $name = mysqli_real_escape_string($koneksi, $nominalGC . " Genesis Crystals");

    // Simpan data ke dalam tabel packages
    $query = "INSERT INTO packages (currency_id, name, amount, price, bonus_amount, is_active, created_at, updated_at) 
              VALUES ('$currency_id', '$name', '$nominalGC', '$price', '0', '$is_active', NOW(), NOW())";

    if (mysqli_query($koneksi, $query)) {
      // Simpan juga ke dalam tabel transactions
      $package_id = mysqli_insert_id($koneksi);
      $transactionQuery = "INSERT INTO transactions (user_id, package_id, player_id, amount, total_price, status, payment_method, created_at, updated_at)
                          VALUES ('$userID', '$package_id', '$playerID', '$nominalGC', '$price', 'pending', '$paymentMethod', NOW(), NOW())";

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
      LIST HARGA LENGKAP <span class="th">Genesis Crystals CRPshop</span>
    </h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="lengkapidata">
        <div class="input-container">
          <label for="userID" class="input-label">Riot ID</label>
          <input type="number" class="form-control" id="userID" name="userID" placeholder="Masukkan Riot ID Anda" required />
        </div>
      </div>
      <div class="server">
        <div class="input-container">
          <select class="form-select" id="serverID" name="serverID" required>
            <option value="">Pilih Server</option>
            <option value="america">America</option>
            <option value="europe">Europe</option>
            <option value="asia">Asia</option>
            <option value="TK">Turkey (TK)</option>
            <option value="HK">Hong Kong (HK)</option>
            <option value="MO">Macao (MO)</option>
          </select>
        </div>
      <table border="1" class="table">
        <thead>
          <tr>
            <th>Nominal Genesis Crystals</th>
            <th>Harga Normal</th>
          </tr>
        </thead>
        <tbody>
          <tr onclick="toggleSelection(this, 60, 16000)">
            <td>60 Genesis Crystals</td>
            <td>Rp 16.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 300, 63000)">
            <td>300 Genesis Crystals</td>
            <td>Rp 63.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 980, 198000)">
            <td>980 Genesis Crystals</td>
            <td>Rp 198.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 1980, 398000)">
            <td>1980 Genesis Crystals</td>
            <td>Rp 398.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 3280, 648000)">
            <td>3280 Genesis Crystals</td>
            <td>Rp 648.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 6480, 1288000)">
            <td>6480 Genesis Crystals</td>
            <td>Rp 1.288.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 8080, 1599000)">
            <td>8080 Genesis Crystals</td>
            <td>Rp 1.599.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 10880, 1999000)">
            <td>10880 Genesis Crystals</td>
            <td>Rp 1.999.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 12880, 2399000)">
            <td>12880 Genesis Crystals</td>
            <td>Rp 2.399.000</td>
          </tr>
        </tbody>
      </table>
      <input type="hidden" id="nominalGC" name="nominalGC" value="" />
      <input type="hidden" id="price" name="price" value="" />
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
        <button type="submit" class="btn btn-success" id="orderButton">Order</button>
      </div>
    </form>
  </div>

  <script>
    function toggleSelection(row, nominalGC, price) {
      const rows = document.querySelectorAll(".table tbody tr");
      rows.forEach((r) => r.classList.remove("selected"));
      row.classList.toggle("selected");

      document.getElementById('nominalGC').value = nominalGC;
      document.getElementById('price').value = price;
    }
  </script>
</body>
</html>
