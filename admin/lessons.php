<?php
  $title="BMS - admin";
  $stylefile="/admin/index.css";
  include_once '../clear/header.php';
  include_once '../include/db-connect.php';
  if(isset($_GET['id'])){
    $lesson = $conn->query("SELECT * FROM `classes` WHERE `id`=".$_GET['id'])->fetch(PDO::FETCH_ASSOC);
    $usr = $conn->query("SELECT * FROM `classes` WHERE `id`=".$lesson['id'])->fetch(PDO::FETCH_ASSOC);
  }
  $users = $conn->query("SELECT * FROM `users` WHERE `role`=2")->fetchAll();
  $lessons = $conn->query("SELECT * FROM `classes`")->fetchAll();
?>
   <main>
     <section class="edit">
       <article class="users">
         <h1>Lessons</h1>
         <form class="edituser" action="" method="POST">
           <input type="text" name="name" value="<?php echo $lesson['name']; ?>" placeholder="Subject name">
           <input type="text" name="time" value="<?php echo $lesson['time']; ?>" placeholder="What time? PO-1,2 . UT-2,3 . ST-8">
           <span class="origin">
             <select name="teachername">
               <?php
                 foreach ($users as $user) {
                   if($user['id'] == $usr['id']){
                     echo '<option value="'.$user['id'].'" selected>'.$user['name'].'</option>';
                   }else{
                     echo '<option value="'.$user['id'].'">'.$user['name'].'</option>';
                   }
                 }
               ?>
             </select>
           </span>
           <button type="submit" name="button">Submit</button>
         </form>
       </article>
       <form class="massage" method="POST">
         <h1>Student</h1>
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
           <h3>teacher</h3>
         </span>
         <div class="shower">
           <?php
           foreach ($lessons as $lesson) {
             foreach ($users as $user) {
               if($lesson['id'] == $user['id']){
                 echo '<button onclick="window.location.href=`/admin/lessons.php`" type="submit"><p>'.$lesson['name'].'</p><p>'.$user['name'].'</p></button>';
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
