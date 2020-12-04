<?php
  $title = "BMS - login";
  include_once 'clear/header.php';
?>
<main>
  <form class="" action="include/login.php" method="POST">
    <h1>Login to continue</h1>
    <input type="text" name="nameOf" placeholder="Enter your email">
    <input type="password" name="pwd" placeholder="Enter your password">
    <button type="submit" name="button">Log in</button>
    <p>You can login in with your password and username, what you get from teacher.</p>
  </form>
</main>
</body>
</html>
