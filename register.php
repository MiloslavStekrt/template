<?php
$stylefile = "register";
$title = "BMS - login";
include_once 'clear/header.php';?>
    <main>
      <form class="" action="include/login.php" method="POST">
        <input type="text" name="nameOf" placeholder="Enter your username">
        <input type="text" name="email" placeholder="Your email">
        <select class="" name="role">
          <option value="teacher">Teacher</option>
          <option value="student">Student</option>
        </select>
        <input type="password" name="pwd" placeholder="Enter your password">
        <input type="password" name="pwd-r" placeholder="Enter password again">
        <!-- <input type="text" name=""> -->
        <button type="submit" name="button">Log in</button>
        <p>You can login in with your password and username, what you get from teacher.</p>
      </form>
    </main>
  </body>
</html>
