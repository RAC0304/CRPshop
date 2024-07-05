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
      LIST HARGA LENGKAP <span class="th">PUBG MOBILE CRPshop</span>
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
          <th>Nominal UC</th>
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