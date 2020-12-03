<?php
$title = "BMS - Register";
include_once 'clear/header.php';?>
    <main>
      <form class="" action="include/register.php" method="POST">
        <h1>Register</h1>
        <span>
          <input value="<?php echo $_GET["nameOf"] ?>" type="text" name="nameOf" placeholder="Enter your username">
          <select class="" name="role">
            <option value="student">Student</option>
            <option value="teacher">Teacher</option>
          </select>
        </span>
        <input type="text" value="<?php echo $_GET["email"] ?>" name="email" placeholder="Your email">
        <span>
          <input type="password" name="pwd" placeholder="Enter your password">
          <input type="password" name="pwd-r" placeholder="Enter password again">
        </span>
        <!-- <input type="text" name=""> -->
        <button type="submit" name="button">Log in</button>
        <p>You can login in with your password and username, what you get from teacher.</p>
      </form>
    </main>
  </body>
</html>
