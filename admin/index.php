 <?php $title="BMS - users"; $stylefile="/admin/index.css"; include_once '../clear/header.php'; ?>
    <main>
      <section class="edit">
        <article class="users">
          <h1>User</h1>
          <form class="edituser" action="/include/user_register.php" method="POST">
            <input type="text" name="name" placeholder="User name">
            <input type="text" name="pwd" placeholder="Password">
            <span class="origin">
              <input type="text" name="email" placeholder="Email">
              <select class="" name="role">
                <option value="student">Student</option>
                <option value="teacher">Teacher</option>
                <option value="principal">Principal</option>
              </select>
            </span>
            <button type="submit" name="button">Submit</button>
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
            for ($i=0; $i < 10; $i++) {
              echo '<button><p>name</p><p>teacher</p></button>';
            }
             ?>
          </div>
        </article>
      </section>
    </main>
  </body>
</html>
<!--  -->
