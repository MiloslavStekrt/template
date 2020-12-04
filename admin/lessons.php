<?php $title="BMS - admin"; $stylefile="/admin/index.css"; include_once '../clear/header.php'; ?>
<!-- listing all classes in DB and users -->
  <!-- must ask for every teacher in table users -->
   <main>
     <section class="edit">
       <article class="users">
         <h1>User</h1>
         <form class="edituser" action="" method="POST">
           <input type="text" name="name" placeholder="Subject name">
           <input type="text" name="time" placeholder="What time? PO-1,2 . UT-2,3 . ST-8">
           <span class="origin">
             <select class="" name="teachername">
               <option value="id">teachername</option>
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
           <h3>teacher</h3>
         </span>
         <div class="shower">
           <?php
           for ($i=0; $i < 10; $i++) {
             echo '<button><p>subject</p><p>teacher-name</p></button>';
           }
            ?>
         </div>
       </article>
     </section>
   </main>
 </body>
</html>
<!--  -->
