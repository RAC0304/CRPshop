<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width">
  <title>Login</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="css/login.css" rel="stylesheet" type="text/css" />
  <style>
    .home-icon {
      display: block;
      text-align: center;
      font-size: 32px;
      color: #03e9f4;
      margin-bottom: 15px;
      /* Warna ikon default */
    }

    .login-box .user-box .home-icon:hover {
      color: white;
      /* Ubah warna ikon saat hover */
      box-shadow: none;
      /* Hapus box-shadow saat hover */
    }
  </style>
</head>

<body>

  <div class="login-box">
    <div class="user-box">
      <a href="index.php" class="home-icon">
        <i class="fas fa-home"></i>
      </a>
    </div>
    <h2>Login Dulu Bre</h2>
    <form>
      <div class="user-box">
        <input type="text" name="" required="">
        <label>Username</label>
      </div>
      <div class="user-box">
        <input type="password" name="" required="">
        <label>Password</label>
      </div>
      <button type="submit">
        <span></span><span></span><span></span><span></span>Submit
      </button>
    </form>

    <p class="register-text" style="color: white;">Belum punya akun? <a href="register.php">Register di sini</a></p>

  </div>
  </div>

  <script src="script.js"></script>
</body>

</html>