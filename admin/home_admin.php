<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Site - Administratio</title>
    <link rel="icon" type="image/x-icon" href=".././img/logo.png" />
    <link rel="stylesheet" href="../css/style.css" />
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"
    />
    <link
      rel="stylesheet"
      href="https://unpkg.com/swiper@8/swiper-bundle.min.css"
    />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH"
      crossorigin="anonymous"
    />
    <link rel="stylesheet" href="harga.css" />
    <style>
      footer {
        text-align: center;
        padding: 3px;
        background-color: DarkSalmon;
        color: white;
      }
      .logo {
        max-width: 65px;
        height: 65px;
      }
      .login-btn:hover {
        outline-color: aquamarine;
      }
    </style>
  </head>
  <header class="header">
    <div class="wrap">
      <div class="left-header">
        <a href="../index.html"
          ><img class="logo" src="../img/logoputih.png" alt="""></a
        >
        <div class="search">
          <input
            class="search-input"
            type="search"
            name="search"
            id=""
            placeholder="Search Here"
          />
        </div>
      </div>
      <nav class="navbar">
        <ul>
          <li>
            <a href="../index.html"
              >Home
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-house-door-fill"
                viewBox="0 0 16 16"
              >
                <path
                  d="M6.5 14.5v-3.505c0-.245.25-.495.5-.495h2c.25 0 .5.25.5.5v3.5a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5v-7a.5.5 0 0 0-.146-.354L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293L8.354 1.146a.5.5 0 0 0-.708 0l-6 6A.5.5 0 0 0 1.5 7.5v7a.5.5 0 0 0 .5.5h4a.5.5 0 0 0 .5-.5z"
                />
              </svg>
            </a>
          </li>

          <li class="login-btn">
            <a href="../register.html" class="btn"
              >Register
              <svg
                xmlns="http://www.w3.org/2000/svg"
                width="16"
                height="16"
                fill="currentColor"
                class="bi bi-box-arrow-in-right"
                viewBox="0 0 16 16"
              >
                <path
                  fill-rule="evenodd"
                  d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"
                />
                <path
                  fill-rule="evenodd"
                  d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"
                />
              </svg>
            </a>
          </li>
        </ul>
      </nav>
    </div>
  </header>
  <body>
    <section class="list-ff">
      <div class="container">
        <h1 class="title__list">HALAMAN UTAMA <span class="th">ADMIN</span></h1>
        <!-- card admin -->
        <div class="row">
          <div class="col-sm-3 mb-3 mb-sm-0">
            <div class="card" style="width: 18rem; background-color: #ffd700">
              <div class="card-body">
                <h5 class="card-title">Produk</h5>
                <p class="card-text">Total produk:</p>
                <p>10</p>
                <a href="./produk-admin.html" class="btn btn-primary"
                  >Go somewhere</a
                >
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card" style="width: 18rem; background-color: #00ced1">
              <div class="card-body">
                <h5 class="card-title">Customer</h5>
                <p class="card-text">Total customer:</p>
                <p>10</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card" style="width: 18rem; background-color: white">
              <div class="card-body">
                <h5 class="card-title">Pesanan</h5>
                <p class="card-text">Total Pesanan:</p>
                <p>10</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
          <div class="col-sm-3">
            <div class="card" style="width: 18rem; background-color: #2c2546">
              <div class="card-body text-white">
                <h5 class="card-title">Penghasilan</h5>
                <p class="card-text">Hasil Penjualan:</p>
                <p>10</p>
                <a href="#" class="btn btn-primary">Go somewhere</a>
              </div>
            </div>
          </div>
        </div>
        <!-- end card admin -->
      </div>
    </section>

    <footer>
      <p>Whatsapp: 0808080808</p>
    </footer>
  </body>
  <script
    src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"
  ></script>
</html>