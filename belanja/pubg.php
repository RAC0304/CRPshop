<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar Harga</title>
    <link rel="stylesheet" href="harga.css" />
  </head>
  <body>
    <header>
      <div class="container">
        <nav class="navbar">
          <a href="#" class="navbar-brand">
            <img src="../img/logoputih.png" alt="Logo" />
          </a>
          <ul class="navbar-nav">
            <li class="nav-item">
              <a href="#" class="nav-link">Home</a>
            </li>
            <li class="nav-item">
              <a href="#" class="nav-link">Register</a>
            </li>
          </ul>
        </nav>
      </div>
    </header>
    <div class="container">
      <h1 class="title__list">
        LIST HARGA LENGKAP <span class="th">PUBG MOBILE CRPshop</span>
      </h1>
      <div class="lengkapidata">
        <div class="input-container">
          <label for="userID" class="input-label">User ID</label>
          <input
            type="number"
            class="form-control"
            id="userID"
            placeholder="Masukkan User ID"
          />
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
            <tr onclick="toggleSelection(this)">
                <td>60 UC</td>
                <td>Rp 15.000</td>
            </tr>
            <tr onclick="toggleSelection(this)">
                <td>325 UC</td>
                <td>Rp 78.000</td>
            </tr>
            <tr onclick="toggleSelection(this)">
                <td>660 UC</td>
                <td>Rp 157.000</td>
            </tr>
            <tr onclick="toggleSelection(this)">
                <td>1800 UC</td>
                <td>Rp 392.700</td>
            </tr>
            <tr onclick="toggleSelection(this)">
                <td>3850 UC</td>
                <td>Rp 785.500</td>
            </tr>
            <tr onclick="toggleSelection(this)">
                <td>8100 UC</td>
                <td>Rp 1.570.000</td>
            </tr>
            <tr onclick="toggleSelection(this)">
                <td>10000 UC</td>
                <td>Rp 2.000.000</td>
            </tr>
            </tbody>
      </table>
      <div class="payment-method-container">
        <label for="paymentMethod" class="input-label"
          >Pilih Metode Pembayaran</label
        >
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
        <a href="../checkout.html" class="btn btn-success" id="orderButton"
          >Order</a
        >
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
