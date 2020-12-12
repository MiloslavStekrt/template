<?php
  //basic defence for user with role 3
  if($_SESSION['id'] > 3){
    header("location: /");
    die();
  }

  $title="BMS - users";
  $stylefile="/admin/index.css";
  include_once '../clear/header.php';
  include_once '../include/db-connect.php';
  $users = $conn->query("SELECT * FROM `users` WHERE `role`=1 OR `role`=2")->fetchAll();

  if(isset($_GET['id'])){
    $usr = $conn->query("SELECT * FROM `users` WHERE `id`=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
    if($usr['role'] == 1){
      $role = "student";
    }else{
      $role = "teacher";
    }
  }
  $conn = null;

?>
    <main>
      <section class="edit">
        <article class="users">
          <h1>User</h1>
          <form class="edituser" action="/include/user_register.php" method="POST">
            <input type="text" value="<?php echo $usr['name'] ?>" name="name" placeholder="User name">
            <input type="text" name="pwd" placeholder="Password is hashed">
            <?php if(isset($_GET['id'])){
              echo '<input type="text" name="id" value="'.$_GET['id'].'" hidden>';
            } ?>
            <span class="origin">
              <input type="text" value="<?php echo $usr['email'] ?>" name="email" placeholder="Email">
              <select class="" name="role">
                <option value="student" <?php if($role == "student") echo 'selected="selected"'; ?>>Student</option>
                <option value="teacher" <?php if($role == "teacher") echo 'selected="selected"'; ?>>Teacher</option>
                <option value="principal" <?php if($role == "principal") echo 'selected="selected"'; ?>>Principal</option>
              </select>
            </span>
            <span class="submiter">
              <button type="button" name="button" onclick="window.location.href=`/admin/index.php`">Cancel</button>
              <button type="submit" name="button">Submit</button>
            </span>
          </form>
        </article>
        <form class="massage" method="POST">
          <h1>Send global Messange</h1>
          <textarea class="messagehit" name="msg" placeholder="Enter Massage"></textarea>
          <button type="submit" name="button">Submit</button>
        </form>
      </section>
      <section class="show">
        <article class="navbar">
          <a href="/admin/">users</a>
          <a href="/admin/lessons.php">lessons</a>
        </article>
        <article class="showest">
          <span>
            <h3>name</h3>
            <h3>role</h3>
          </span>
          <div class="shower">
            <?php
            foreach ($users as $user) {
              if($user['role'] == 1){
                $role = "student";
              }else{
                $role = "teacher";
              }
              echo '<button onclick="window.location.href=`/admin/index.php?id='.$user['id'].'`;" type="button"><p>'.$user["name"].'</p><p>'.$role.'</p></button>';
            }
            ?>
          </div>
        </article>
      </section>
    </main>
  </body>
</html>
<!--  -->
