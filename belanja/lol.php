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
    <div class="lengkapidata">
      <div class="input-container">
        <label for="userID" class="input-label">Lengkapi Riot ID</label>
        <input type="number" class="form-control" id="userID" placeholder="Masukkan Riot ID Anda" />
      </div>
    </div>
    <div class="server">
      <div class="input-container">
        <label for="serverID" class="input-label">Server</label>
        <input type="number" class="form-control" id="serverID" placeholder="1234" />
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
        <tr onclick="toggleSelection(this)">
          <td>625 RP</td>
          <td>Rp 50.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>775 RP</td>
          <td>Rp 86.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1525 RP</td>
          <td>Rp 115.700</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1400 RP</td>
          <td>Rp 150.500</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>2900 RP</td>
          <td>Rp 215.500</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>2850 RP</td>
          <td>Rp 301.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>4600 RP</td>
          <td>Rp 330.000</td>
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
      <a href="../checkout.html" class="btn btn-danger" id="orderButton">Order</a>
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