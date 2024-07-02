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
  $pubgID = mysqli_real_escape_string($koneksi, $_POST['userID']); // Ambil PUBG ID dari form
  $ucAmount = mysqli_real_escape_string($koneksi, $_POST['ucAmount']);
  $price = mysqli_real_escape_string($koneksi, $_POST['price']);
  $paymentMethod = mysqli_real_escape_string($koneksi, $_POST['paymentMethod']);

  // Ambil currency_id dari tabel currencies berdasarkan nama
  $currencyQuery = "SELECT id FROM currencies WHERE name = 'UC'";
  $currencyResult = mysqli_query($koneksi, $currencyQuery);

  if ($currencyResult && mysqli_num_rows($currencyResult) > 0) {
    $currencyRow = mysqli_fetch_assoc($currencyResult);
    $currency_id = $currencyRow['id'];
    $is_active = 1; // Misalnya, paket selalu aktif

    // Nama paket
    $name = mysqli_real_escape_string($koneksi, $ucAmount . " UC");

    // Simpan data ke dalam tabel packages
    $query = "INSERT INTO packages (currency_id, name, amount, price, bonus_amount, is_active, created_at, updated_at) 
              VALUES ('$currency_id', '$name', '$ucAmount', '$price', '0', '$is_active', NOW(), NOW())";

    if (mysqli_query($koneksi, $query)) {
      // Simpan juga ke dalam tabel transactions
      $package_id = mysqli_insert_id($koneksi);
      $transactionQuery = "INSERT INTO transactions (user_id, package_id, player_id, amount, total_price, status, payment_method, created_at, updated_at)
                          VALUES ('$userID', '$package_id', '$pubgID', '$ucAmount', '$price', 'pending', '$paymentMethod', NOW(), NOW())";

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
      LIST HARGA LENGKAP <span class="th">PUBG CRPshop</span>
    </h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST">
      <div class="lengkapidata">
        <div class="input-container">
          <label for="userID" class="input-label">Lengkapi PUBG ID</label>
          <input type="number" class="form-control" id="userID" name="userID" placeholder="Masukkan PUBG ID Anda" required />
        </div>
      </div>
      <table border="1" class="table">
        <thead>
          <tr>
            <th>Nominal UC </th>
            <th>Harga Normal</th>
          </tr>
        </thead>
        <tbody>
          <tr onclick="toggleSelection(this, 25, 6000)">
            <td>25 UC</td>
            <td>Rp 6.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 50, 10000)">
            <td>50 UC</td>
            <td>Rp 10.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 100, 20000)">
            <td>100 UC</td>
            <td>Rp 20.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 300, 56000)">
            <td>300 UC</td>
            <td>Rp 56.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 600, 112000)">
            <td>600 UC</td>
            <td>Rp 112.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 1200, 224000)">
            <td>1200 UC</td>
            <td>Rp 224.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 1800, 336000)">
            <td>1800 UC</td>
            <td>Rp 336.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 2400, 448000)">
            <td>2400 UC</td>
            <td>Rp 448.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 4000, 720000)">
            <td>4000 UC</td>
            <td>Rp 720.000</td>
          </tr>
          <tr onclick="toggleSelection(this, 6000, 1080000)">
            <td>6000 UC</td>
            <td>Rp 1.080.000</td>
          </tr>
        </tbody>
      </table>
      <input type="hidden" id="ucAmount" name="ucAmount" value="" />
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
    function toggleSelection(row, nominalUC, price) {
      const rows = document.querySelectorAll(".table tbody tr");
      rows.forEach((r) => r.classList.remove("selected"));
      row.classList.toggle("selected");

      document.getElementById('ucAmount').value = nominalUC;
      document.getElementById('price').value = price;
    }
  </script>
</body>

</html>
