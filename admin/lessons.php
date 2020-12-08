<?php
  $title="BMS - admin";
  $stylefile="/admin/index.css";

  include_once '../clear/header.php';
  include_once '../include/db-connect.php';

  if(isset($_GET['id']) && !empty($_GET['id']) && $_GET['id'] != ""){
    $id = (int)$_GET['id'];
    $lesson = $conn->prepare("SELECT * FROM `classes` WHERE `id`=?");
    $lesson->execute([$id]);
    $lesson->fetch(PDO::FETCH_ASSOC);
    $lesson = $conn->query("SELECT * FROM `classes` WHERE `id`=".$id)->fetch(PDO::FETCH_ASSOC);
    $usr = $conn->query("SELECT * FROM `users` WHERE `id`=".$lesson['id'])->fetch(PDO::FETCH_ASSOC);
    $class_users = $conn->query("SELECT * FROM `class_student` WHERE `id_class`=".$id)->fetchAll();
  }
  $users_all = $conn->query("SELECT * FROM `users` WHERE `role`=2 OR `role`=3")->fetchAll();
  $lessons_all = $conn->query("SELECT * FROM `classes`")->fetchAll();
  $users_student = $conn->query("SELECT * FROM `users` WHERE `role`=1")->fetchAll();
  $conn = null;
?>
   <main>
     <section class="edit">
       <article class="users">
         <h1>Lessons</h1>
         <form class="edituser" action="/include/create_class.php" method="POST">
           <?php if (isset($lesson['id'])): ?>
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
           <?php else: ?>
             <input type="text" name="name" placeholder="Subject name">
             <input type="text" name="time" placeholder="What time? PO-1,2 . UT-2,3 . ST-8">
             <input type="text" name="id" hidden>
             <span class="origin">
               <select name="teachername">
                 <?php
                  foreach($users_all as $user){
                    echo '<option value="'.$user['id'].'">'.$user['name'].'</option>';
                  }
                 ?>
               </select>
             </span>
           <?php endif; ?>
           <span class="submiter">
             <button onclick="window.location.href=`/admin/lessons.php`" type="button">Cancel</button>
             <button type="submit" name="button">Submit</button>
           </span>
         </form>
       </article>
       <?php if (isset($lesson['id'])): ?>
         <form class="student-select" action="/include/class_user.php" method="post">
           <h1>Student</h1>
           <input type="text" name="id_class" value="<?php echo $id ?>" hidden>
           <article class="student_list">
             <?php foreach ($users_student as $student): ?>
               <div>
                 <?php
                 $checked = false;
                 if(isset($class_users)){
                   foreach ($class_users as $users_class) {
                     if($student['id'] == $users_class['id_user']){
                       $checked = true;
                     }
                   }
                 }
                 if ($checked): ?>
                   <input type="checkbox" name="list_user[]" id="<?php echo $id ?>" value="<?php echo $student['id'] ?>" checked>
                 <?php else: ?>
                   <input type="checkbox" name="list_user[]" id="<?php echo $id ?>" value="<?php echo $student['id'] ?>">
                 <?php endif; ?>
                 <label for="<?php echo $student['id'] ?>"><?php echo $student['name'] ?></label>
               </div>
             <?php endforeach; ?>
           </article>
           <button type="submit" name="button">Submit</button>
         </form>
       <?php endif; ?>
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
