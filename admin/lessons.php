<?php
  $title="BMS - admin";
  $stylefile="/admin/index.css";
  include_once '../clear/header.php';
  include_once '../include/db-connect.php';
  if(isset($_GET['id'])){
    $lesson = $conn->query("SELECT * FROM `classes` WHERE `id`=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
    $usr = $conn->query("SELECT * FROM `users` WHERE `id`=".$lesson['id'])->fetch(PDO::FETCH_ASSOC);
  }
  $users_all = $conn->query("SELECT * FROM `users` WHERE `role`=2")->fetchAll();
  $users_student = $conn->query("SELECT * FROM `users` WHERE `role`=1")->fetchAll();
  $lessons_all = $conn->query("SELECT * FROM `classes`")->fetchAll();
  $conn = null;
?>
   <main>
     <section class="edit">
       <article class="users">
         <h1>Lessons</h1>
         <form class="edituser" action="/include/create_class.php" method="POST">
           <input type="text" name="name" value="<?php echo $lesson['name']; ?>" placeholder="Subject name">
           <input type="text" name="time" value="<?php echo $lesson['time']; ?>" placeholder="What time? PO-1,2 . UT-2,3 . ST-8">
           <input type="text" name="id" value="<?php echo $lesson['id']; ?>" hidden>
           <span class="origin">
             <select name="teachername">
               <?php
                foreach($users_all as $user){
                  if($user['id'] == $lesson['teacher']){
                    echo '<option value="'.$user['id'].'" selected>'.$user['name'].'</option>';
                  }else{
                    echo '<option value="'.$user['id'].'">'.$user['name'].'</option>';
                  }
                }
               ?>
             </select>
           </span>
           <span class="submiter">
             <button onclick="window.location.href=`/admin/lessons.php`" type="button">Cancel</button>
             <button type="submit" name="button">Submit</button>
           </span>
         </form>
       </article>
       <form class="student-select" method="POST">
         <h1>Student</h1>
         <article class="student_list">
           <?php foreach ($users_student as $student): ?>
             <span>
               <input type="checkbox" id="<?php echo $student['id'] ?>" name="<?php echo $student['id'] ?>" value="<?php echo $student['id'] ?>">
               <label for="<?php echo $student['id'] ?>"><?php echo $student['name'] ?></label>
             </span>
           <?php endforeach; ?>
         </article>
         <button type="submit" name="button">Submit</button>
       </form>
     </section>
     <section class="show">
       <article class="navbar">
         <a href="/admin">users</a>
         <a href="/admin/lessons.php">lessons</a>
       </article>
       <article class="showest">
         <span>
           <h3>name</h3>
           <h3>teacher</h3>
         </span>
         <div class="shower">
           <?php
           foreach($lessons_all as $class){
             foreach($users_all as $user){
               if($class['teacher'] == $user['id']){
                 echo '<button onclick="window.location.href=`/admin/lessons.php?id='.$class['id'].'`" type="submit">
                   <p>'.$class['name'].'</p><p>'.$user['name'].'</p>
                 </button>';
               }
             }
           }
           ?>
         </div>
       </article>
     </section>
   </main>
 </body>
</html>
<!--  -->
