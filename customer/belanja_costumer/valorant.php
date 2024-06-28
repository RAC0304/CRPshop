<?php
session_start();
include '../../koneksi.php';
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
        <tr onclick="toggleSelection(this)">
          <td>300 VP</td>
          <td>Rp 43.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>625 VP</td>
          <td>Rp 66.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>925 VP</td>
          <td>Rp 99.700</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1125 VP</td>
          <td>Rp 115.500</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1425 VP</td>
          <td>Rp 148.500</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1650 VP</td>
          <td>Rp 165.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1950 VP</td>
          <td>Rp 198.000</td>
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