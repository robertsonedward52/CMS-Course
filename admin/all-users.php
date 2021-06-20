<div class="container-fluid">

<div class="col-xl-12 ">

    <table class="table table-hover">
    <thead>
    <tr>
    <th>User Id</th>
    <th>First Name</th>
    <th>Last Name</th>
    <th>Username</th>
    <th>Image</th>
    <th> Role </th>
    <th>Date </th>
    </tr>
    </thead>
    <tbody>
    <tr>

    <?php
      $sql = "SELECT * FROM users ";
      $select_all_users = mysqli_query($conn, $sql);
  
      while($row = mysqli_fetch_assoc($select_all_users)) {
          $user_id = $row["user_id"];
          $fname = $row["fname"];
          $lname = $row["lname"];
          $user_name = $row["user_name"];
          $user_image = $row["user_image"];
          $user_role = $row["user_role"];
          $user_date = $row["user_date"];
      ?>
    <td> <?php echo $user_id ?> <br>
    <small class="text-danger"><a href="users.php?source=edit-users&u_id=<?php echo $user_id ?>"> Edit</a></small>
    <small class="text-danger"><a href="users.php?delete=<?php echo $user_id ?>"> Delete</a></small> <br>
    <small class="text-danger"><a href=""> View</a></small>
    </td>
    <td> <?php echo $fname ?> </td> 
    <td> <?php echo $lname ?> </td> 
    <td> <?php echo $user_name ?> </td> 
    <td> <img style="width: 100px; height: 100px" class="img-thumbnail" src="../assets/imgs/<?php echo $user_image ?> " alt=""></td>
    <td> <?php echo $user_role ?> </td>
    <td> <?php echo $user_date ?> </td>
    </tr>
   <?php }   ?>

    </tbody>


    <!-- delete post -->
    <?php deleteUsers(); ?>

    
    </table>
            
</div>


</div>