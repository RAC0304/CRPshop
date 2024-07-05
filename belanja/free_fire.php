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
        <tr onclick="selectDiamond(this)">
          <td>50 Diamonds</td>
          <td>Rp 9.500</td>
        </tr>
        <tr onclick="selectDiamond(this)">
          <td>100 Diamonds</td>
          <td>Rp 19.000</td>
        </tr>
        <tr onclick="selectDiamond(this)">
          <td>310 Diamonds</td>
          <td>Rp 58.000</td>
        </tr>
        <tr onclick="selectDiamond(this)">
          <td>520 Diamonds</td>
          <td>Rp 97.000</td>
        </tr>
        <tr onclick="selectDiamond(this)">
          <td>1060 Diamonds</td>
          <td>Rp 192.000</td>
        </tr>
        <tr onclick="selectDiamond(this)">
          <td>2180 Diamonds</td>
          <td>Rp 388.000</td>
        </tr>
        <tr onclick="selectDiamond(this)">
          <td>5600 Diamonds</td>
          <td>Rp 970.000</td>
        </tr>
        <tr onclick="selectDiamond(this)">
          <td>6450 Diamonds</td>
          <td>Rp 1.200.000</td>
        </tr>
        <tr onclick="selectDiamond(this)">
          <td>8300 Diamonds</td>
          <td>Rp 1.500.000</td>
        </tr>
        <tr onclick="selectDiamond(this)">
          <td>10680 Diamonds</td>
          <td>Rp 1.920.000</td>
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
      <a href="../login.php" class="btn btn-succes" id="orderButton">Order</a>
    </div>
  </div>
  <script>
    function selectDiamond(row) {
      const rows = document.querySelectorAll(".table tbody tr");
      rows.forEach((r) => r.classList.remove("selected"));
      row.classList.add("selected");
      const diamond = row.cells[0].innerText;
      const price = row.cells[1].innerText;
      console.log(`Selected: ${diamond} - ${price}`);
    }
  </script>
</body>

</html>
