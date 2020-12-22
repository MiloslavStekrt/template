<?php
include_once 'clear/header.php';
 ?>
<form class="" action="include/new_home.php" method="post">
  <input type="text" name="title" placeholder="Name your homework">
  <input type="text" name="question" placeholder="Question">
  <input type="text" name="corect" placeholder="Correct Answer">
  <input type="date" name="date">
  <input type="text" name="id" value="<?php echo $_GET['id'] ?>" disabled hidden>
  <input type="time" name="time">
  <button type="submit" name="button">Add homework</button>
</form>

</body>
</html>
