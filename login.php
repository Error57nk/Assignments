<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <!-- Store File -->
  <link rel="stylesheet" href="./packend/css/bootstrap.min.css">

  <!-- /Store File -->

  <!-- Project CSS -->
  <!-- My Coustom Shortcut -->
  <!-- <link rel="stylesheet" href="./packend/css/css_short_v1.css"> -->
  <!-- My /Coustom Shortcut -->
  <link rel="stylesheet" href="./packend/css/main.css">
  <!-- /Project CSS -->
  <title>Login_signin</title>
</head>

<body>
  <div class="section-head  grad_1">
    <h4 class="text-center">JustInClicks.com</h4>
  </div>
  <div class="form-box">
    <div class="button-box">
      <div id="btn"></div>
      <button type="button" class="toggle-btn" onclick="login()">Login</button>
      <button type="button" class="toggle-btn" onclick="signin()">Signin</button>
    </div>

    <form id="login" action="docend/log-sign.php" method="POST" class="input-group-log">
      <input type="text" name="username" class="input-field" placeholder="User Id/Emial/Phone" required>
      <input type="password" name="pass" class="input-field" placeholder="Password" required>
      <input type="checkbox" id="remb-pass" name="remb-pass" value="pass-rem">
      <label for="rempass" class="chk-lab"> Remember Password</label><br>

      <button type="submit" name="log-sub" class="submit-btn grad_1 color-light">Login</button>
    </form>

    <form id="register" action="docend/log-sign.php" method="POST" class="input-group-reg">
      <input type="text" class="input-field" name="name" placeholder="Name" required>
      <input type="text" class="input-field" name="email" placeholder="Email" required>
      <input type="text" class="input-field" name="phone" placeholder="Phone" required>
      <input type="password" class="input-field" name="pass1" placeholder="Password" required>
      <input type="password" class="input-field" name="pass2" placeholder="Re-type Password" required>

      <button type="submit" name="reg-sub" class="submit-btn grad_1 color-light">Register</button>

    </form>
  </div>






  <script src="./packend/js/jquery.js"></script>
  <script src="./packend/js/bootstrap.min.js"></script>


  <!-- couston js -->
  <script src="./packend/js/main.js"></script>
  <!-- /couston js -->


  <script>
    var x = document.getElementById("login");
    var y = document.getElementById("register");
    var z = document.getElementById("btn");

    function signin() {
      x.style.left = "-400px";
      y.style.left = "50px";
      z.style.left = "110px";
    }
    function login() {
      x.style.left = "50px";
      y.style.left = "450px";
      z.style.left = "0px";
    }


  </script>

</body>

</html>