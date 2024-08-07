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
    <div class="server">
      <div class="input-container">
        <label for="serverID" class="input-label">Player ID</label>
        <input type="number" class="form-control" id="serverID" placeholder="1234" />
      </div>
    </div>
    <table border="1" class="table">
      <thead>
        <tr>
          <th>Nominal CP</th>
          <th>Harga Normal</th>
        </tr>
      </thead>
      <tbody>
        <tr onclick="selectCP(this)">
          <td>321 CP</td>
          <td>Rp 45.000</td>
        </tr>
        <tr onclick="selectCP(this)">
          <td>645 CP</td>
          <td>Rp 90.000</td>
        </tr>
        <tr onclick="selectCP(this)">
          <td>800 CP</td>
          <td>Rp 108.000</td>
        </tr>
        <tr onclick="selectCP(this)">
          <td>1373 CP</td>
          <td>Rp 180.700</td>
        </tr>
        <tr onclick="selectCP(this)">
          <td>1675 CP</td>
          <td>Rp 272.000</td>
        </tr>
        <tr onclick="selectCP(this)">
          <td>2060 CP</td>
          <td>Rp 342.000</td>
        </tr>
        <tr onclick="selectCP(this)">
          <td>3565 CP</td>
          <td>Rp 450.000</td>
        </tr>
        <tr onclick="selectCP(this)">
          <td>4630 CP</td>
          <td>Rp 570.000</td>
        </tr>
        <tr onclick="selectCP(this)">
          <td>5515 CP</td>
          <td>Rp 680.000</td>
        </tr>
        <tr onclick="selectCP(this)">
          <td>6480 CP</td>
          <td>Rp 800.000</td>
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
      <a href="../login.php" class="btn btn-danger" id="orderButton">Order</a>
    </div>
  </div>
  <script>
    function selectCP(row) {
      const rows = document.querySelectorAll(".table tbody tr");
      rows.forEach((r) => r.classList.remove("selected"));
      row.classList.add("selected");
      const cp = row.cells[0].innerText;
      const price = row.cells[1].innerText;
      console.log(`Selected: ${cp} - ${price}`);
    }
  </script>
</body>

</html>
