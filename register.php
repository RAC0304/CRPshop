<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <title>Register</title>
    <link href="css/register.css" rel="stylesheet" type="text/css" />
  </head>
  <body>
    <div class="login-box">
      <h2>Register Dulu Bro</h2>
      <form id="registrationForm" action="index.php" method="post">
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

      form.addEventListener("submit", function (event) {
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