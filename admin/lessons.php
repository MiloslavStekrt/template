<?php $title="BMS - admin"; $stylefile="/admin/index.css"; include_once '../clear/header.php'; ?>
<!-- listing all classes in DB and users -->
   <main>
     <section class="edit">
       <article class="users">
         <h1>User</h1>
         <form class="edituser" action="" method="POST">
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
         <button type="button" name="button">users</button>
         <button type="button" name="button">lessons</button>
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
