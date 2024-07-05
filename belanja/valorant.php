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
      LIST HARGA LENGKAP <span class="th">VALORANT CRPshop</span>
    </h1>
    <div class="lengkapidata">
      <div class="input-container">
        <label for="userID" class="input-label">Riot ID</label>
        <input type="number" class="form-control" id="userID" placeholder="Masukkan Riot ID" />
        <div class="payment-method-container">
          <label for="paymentMethod" class="input-label">Server</label>
          <select class="form-select" id="paymentMethod">
            <option value="Asia">Asia</option>
            <option value="Europe">Europe</option>
            <option value="America">America</option>
          </select>
        </div>

      </div>
    </div>
    <table border="1" class="table">
      <thead>
        <tr>
          <th>Nominal VP</th>
          <th>Harga Normal</th>
        </tr>
      </thead>
      <tbody>
        <tr onclick="toggleSelection(this, 250, 36000)">
          <td>250 VP</td>
          <td>Rp 36.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>500 VP</td>
          <td>Rp 72.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>750 VP</td>
          <td>Rp 108.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>850 VP</td>
          <td>Rp 122.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1000 VP</td>
          <td>Rp 144.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1200 VP</td>
          <td>Rp 172.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1500 VP</td>
          <td>Rp 216.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1750 VP</td>
          <td>Rp 231.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>2000 VP</td>
          <td>Rp 264.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>2250 VP</td>
          <td>Rp 297.000</td>
        </tr>
      </tbody>
    </table>
    <div class="payment-method-container">
      <label for="paymentMethod" class="input-label">Pilih Metode Pembayaran</label>
      <select class="form-select" id="paymentMethod">
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
      <a href="../login.php" class="btn btn-success" id="orderButton">Order</a>
    </div>
  </div>
  <script>
    function toggleSelection(row) {
      const rows = document.querySelectorAll(".table tbody tr");
      rows.forEach((r) => r.classList.remove("selected"));
      row.classList.toggle("selected");
    }
  </script>
</body>

</html>