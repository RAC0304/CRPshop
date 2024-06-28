<?php
// Include file connect.php untuk menggunakan koneksi database
include 'connect.php';

// Inisialisasi variabel atau flag untuk menandai kesalahan username
$username_error = false;

// Ambil nilai dari formulir registrasi
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Lindungi dari SQL injection
    $email = mysqli_real_escape_string($conn, $email);
    $username = mysqli_real_escape_string($conn, $username);
    $password = mysqli_real_escape_string($conn, $password);

    // Query untuk memeriksa apakah username sudah ada
    $check_username_sql = "SELECT * FROM users WHERE username='$username'";
    $check_username_result = $conn->query($check_username_sql);

    if ($check_username_result->num_rows > 0) {
        // Set flag kesalahan username
        $username_error = true;
    } else {
        // Username belum ada, lakukan INSERT
        $sql = "INSERT INTO users (email, username, password, role, created_at, updated_at) 
                VALUES ('$email', '$username', '$password', 'user', NOW(), NOW())";

        if ($conn->query($sql) === TRUE) {
            // Jika data berhasil dimasukkan, redirect ke halaman login setelah 2 detik
            echo '<script>
                    setTimeout(function() {
                        window.location.href = "login.php";
                    }, 0);
                  </script>';
        } else {
            // Jika terjadi kesalahan lain selain duplikat username
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
}
?>

<!DOCTYPE html>
<html>

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width" />
  <title>Register</title>
  <link href="css/register.css" rel="stylesheet" type="text/css" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
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
    <h2>Register Dulu Bro</h2>
    <form id="registrationForm" action="register.php" method="post">
      <div class="user-box">
        <input type="email" name="email" id="email" required />
        <label for="email">Email</label>
        <span id="emailError" class="error-message"></span>
      </div>
      <div class="user-box">
        <input type="text" name="name" id="name" required />
        <label for="name">Name</label>
        <span id="nameError" class="error-message"></span>
      </div>
      <div class="user-box">
        <input type="text" name="username" id="username" required />
        <label for="username">Username</label>
        <span id="usernameError" class="error-message"></span>
      </div>
      <div class="user-box">
        <input type="password" name="password" id="password" required />
        <label for="password">Password</label>
        <span id="passwordError" class="error-message"></span>
      </div>

      <button type="submit">
        <span></span><span></span><span></span><span></span>Submit
      </button>
    </form>

  </div>

  <script>
    const form = document.getElementById("registrationForm");
    const errorMessages = document.querySelectorAll(".error-message");

    form.addEventListener("submit", function(event) {
      event.preventDefault(); // Prevent default form submission

      let isValid = true;
      errorMessages.forEach((message) => (message.textContent = "")); // Clear previous errors

      const email = document.getElementById("email");
      const name = document.getElementById("name");
      const username = document.getElementById("username");
      const password = document.getElementById("password");

      if (email.value.trim() === "") {
        document.getElementById("emailError").textContent = "Harap isi Email";
        isValid = false;
      }
      if (name.value.trim() === "") {
        document.getElementById("nameError").textContent = "Harap isi Nama";
        isValid = false;
      }
      if (username.value.trim() === "") {
        document.getElementById("usernameError").textContent =
          "Harap isi Username";
        isValid = false;
      }
      if (password.value.trim() === "") {
        document.getElementById("passwordError").textContent =
          "Harap isi Password";
        isValid = false;
      }

      if (isValid) {
        form.submit(); // Submit if all fields are valid
      }
    });
  </script>
</body>

</html>

