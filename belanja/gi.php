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
      LIST HARGA LENGKAP <span class="th">Genshin Impact CRPshop</span>
    </h1>
    <div class="lengkapidata">
      <div class="input-container">
        <label for="userID" class="input-label">Lengkapi User ID</label>
        <input type="number" class="form-control" id="userID" placeholder="Masukkan ID" />
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
    </div>
    <table border="1" class="table">
      <thead>
        <tr>
          <th>Nominal Genesis Crystals </th>
          <th>Harga Normal</th>
        </tr>
      </thead>
      <tbody>
        <tr onclick="toggleSelection(this)">
          <td>60 Genesis Crystals</td>
          <td>Rp 16.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>Blessing of Welkin Moon</td>
          <td>Rp 72.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>300+30 Genesis Crystals</td>
          <td>Rp 79.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>980+110 Genesis Crystals</td>
          <td>Rp 249.700</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1980+260 Genesis Crystals</td>
          <td>Rp 479.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>3280+600 Genesis Crystals</td>
          <td>Rp 799.500</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>6480+1600 Genesis Crystals</td>
          <td>Rp 1.599.000</td>
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
      <a href="../checkout.html" class="btn btn-success" id="orderButton">Order</a>
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