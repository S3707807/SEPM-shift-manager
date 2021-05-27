<!DOCTYPE html>
<html>

<head>

  <link rel="stylesheet" href="bitnami.css">

</head>

<body class="login">

  <div id="id01" class="modal">

    <form class="loginPage" action="process_login.php" method="post" id="login_form">
      <div class="container">
        <label for="uname"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required><br>
        <label for="psw"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>

        <button type="submit" form="login_form" id="log">Login</button>
      </div>

      <div class="container" style="background-color:#f1f1f1">
        <?php
        // Displayed if bad login
        if (isset($_GET['status'])) {
          if ($_GET['status'] == 'error') {
            echo ("<p>Email or password is incorrect</p>");
          }
        }
        ?>
      </div>
    </form>
  </div>


</body>

</html>