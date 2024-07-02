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
  $riotID = mysqli_real_escape_string($koneksi, $_POST['userID']); // Ambil riotID dari form
  $nominalRP = mysqli_real_escape_string($koneksi, $_POST['nominalRP']);
  $price = mysqli_real_escape_string($koneksi, $_POST['price']);
  $paymentMethod = mysqli_real_escape_string($koneksi, $_POST['paymentMethod']); 

  // Ambil currency_id dari tabel currencies berdasarkan nama
  $currencyQuery = "SELECT id FROM currencies WHERE name = 'Riot Points'";
  $currencyResult = mysqli_query($koneksi, $currencyQuery);

  if ($currencyResult && mysqli_num_rows($currencyResult) > 0) {
    $currencyRow = mysqli_fetch_assoc($currencyResult);
    $currency_id = $currencyRow['id'];
    $is_active = 1; // Misalnya, paket selalu aktif

    // Nama paket
    $name = mysqli_real_escape_string($koneksi, $nominalRP . " Riot Points");

    // Simpan data ke dalam tabel packages
    $query = "INSERT INTO packages (currency_id, name, amount, price, bonus_amount, is_active, created_at, updated_at) 
              VALUES ('$currency_id', '$name', '$nominalRP', '$price', '0', '$is_active', NOW(), NOW())";

    if (mysqli_query($koneksi, $query)) {
      // Simpan juga ke dalam tabel transactions
      $package_id = mysqli_insert_id($koneksi);
      $transactionQuery = "INSERT INTO transactions (user_id, package_id, player_id, amount, total_price, status, payment_method, created_at, updated_at)
                          VALUES ('$userID', '$package_id', '$riotID', '$nominalRP', '$price', 'pending', '$paymentMethod', NOW(), NOW())";

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
      LIST HARGA LENGKAP <span class="th">League Of Legends CRPshop</span>
    </h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="lengkapidata">
        <div class="input-container">
          <label for="userID" class="input-label">Lengkapi Riot ID</label>
          <input type="number" class="form-control" id="userID" name="userID" placeholder="Masukkan Riot ID Anda" required />
        </div>
      </div>
      <table border="1" class="table">
        <thead>
          <tr>
            <th>Nominal RP </th>
            <th>Harga Normal</th>
          </tr>
        </thead>
        <tbody>
        <tr onclick="toggleSelection(this, 625, 50000)">
          <td>625 RP</td>
          <td>Rp 50.000</td>
        </tr>
        <tr onclick="toggleSelection(this, 775, 86000)">
          <td>775 RP</td>
          <td>Rp 86.000</td>
        </tr>
        <tr onclick="toggleSelection(this, 1525, 115700)">
          <td>1525 RP</td>
          <td>Rp 115.700</td>
        </tr>
        <tr onclick="toggleSelection(this, 1400, 150500)">
          <td>1400 RP</td>
          <td>Rp 150.500</td>
        </tr>
        <tr onclick="toggleSelection(this, 2900, 215500)">
          <td>2900 RP</td>
          <td>Rp 215.500</td>
        </tr>
        <tr onclick="toggleSelection(this, 2850, 301000)">
          <td>2850 RP</td>
          <td>Rp 301.000</td>
        </tr>
        <tr onclick="toggleSelection(this, 4600, 330000)">
          <td>4600 RP</td>
          <td>Rp 330.000</td>
        </tr>
        <tr onclick="toggleSelection(this, 5000, 435000)">
          <td>5000 RP</td>
          <td>Rp 435.000</td>
        </tr>
        <tr onclick="toggleSelection(this, 6450, 530000)">
          <td>6450 RP</td>
          <td>Rp 530.000</td>
        </tr>
        <tr onclick="toggleSelection(this, 8250, 615000)">
          <td>8250 RP</td>
          <td>Rp 615.000</td>
        </tr>
      </tbody>
      </table>
      <input type="hidden" id="nominalRP" name="nominalRP" value="" />
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
    function toggleSelection(row, nominalRP, price) {
      const rows = document.querySelectorAll(".table tbody tr");
      rows.forEach((r) => r.classList.remove("selected"));
      row.classList.toggle("selected");

      document.getElementById('nominalRP').value = nominalRP;
      document.getElementById('price').value = price;
    }
  </script>
</body>
</html>

