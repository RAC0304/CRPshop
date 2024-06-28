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
      LIST HARGA LENGKAP <span class="th"> FREE FIRE CRPshop</span>
    </h1>
    <div class="lengkapidata">
      <div class="input-container">
        <label for="userID" class="input-label">User ID</label>
        <input type="number" class="form-control" id="userID" placeholder="Masukkan User ID" />
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
        <tr onclick="toggleSelection(this)">
          <td>140 Diamonds</td>
          <td>Rp 18.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>355 Diamonds</td>
          <td>Rp 45.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>720 Diamonds</td>
          <td>Rp 90.000</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>1450 Diamonds</td>
          <td>Rp 180.700</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>2180 Diamonds</td>
          <td>Rp 270.500</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>3040 Diamonds</td>
          <td>Rp 450.500</td>
        </tr>
        <tr onclick="toggleSelection(this)">
          <td>7290 Diamonds</td>
          <td>Rp 900.000</td>
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
      <a href="../checkout.html" class="btn btn-succes" id="orderButton">Order</a>
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