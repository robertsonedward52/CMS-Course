<div class="container-fluid">

<div class="row">

<div class="col-xl-6">
           
    <div class="card">
        <div class="card-body">

    <!-- insert into post -->
        <?php 
        
        if(isset($_GET["u_id"])) {
         $user_edit_id = $_GET["u_id"];
         $sql = "SELECT * FROM users WHERE user_id = {$user_edit_id} ";
         $select_all_users = mysqli_query($conn, $sql);

         while($row = mysqli_fetch_assoc($select_all_users)) {
            $fname  = $row["fname"];
            $lname  = $row["lname"];
            $user_password  = $row["user_password"];
            $user_name  = $row["user_name"];
            $user_email  = $row["user_email"];
            $user_role  = $row["user_role"];
            $user_image  = $row["user_image"];
            $user_date  = $row["user_date"];
            $website  = $row["website"];
            $user_description  = $row["user_description"];

         }

         if(isset($_POST["update-users"])) {
            // $post_category_id = $_POST["post_category"];
            $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
            $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
            $user_image = $_FILES["user_image"]["name"];
            $user_image_temp = $_FILES["user_image"]["tmp_name"];
            $user_name = mysqli_real_escape_string($conn, $_POST["user_name"]);
            $user_role = mysqli_real_escape_string($conn, $_POST["user_role"]);
            $user_email = mysqli_real_escape_string($conn, $_POST["user_email"]);
            $user_date = date("m-d-y");
            $website = mysqli_real_escape_string($conn, $_POST["website"]);
            $user_description = mysqli_real_escape_string($conn, $_POST["user_description"]);
          
            move_uploaded_file($user_image_temp, "../assets/imgs/$user_image");
    
            if(empty($user_image)) {
                $query = "SELECT * FROM users WHERE user_id = {$edit_user_id} ";
                $result = mysqli_query($conn, $query);
    
                while($row = mysqli_fetch_assoc($result)) {
                    $user_image = $row["user_image"];
                }
        }

        $sql = "UPDATE users SET ";
        $sql .= "fname = '{$fname}', ";
        $sql .= "lname = '{$lname}', ";
        $sql .= "user_name = '{$user_name}', ";
        $sql .= "user_password = '{$user_password}', ";
        $sql .= "user_role = '{$user_role}', ";
        $sql .= "user_image = '{$user_image}', ";
        $sql .= "user_email = '{$user_email}', ";
        $sql .= "website = '{$website}', ";
        $sql .= "user_date = now(), ";
        $sql .= "user_description = '{$user_description}' ";
        $sql .= "WHERE user_id = $user_edit_id ";

        $update_users = mysqli_query($conn, $sql);
        if(!$update_users) {
            die("<div class='alert alert-warning'> 
            <small class='text-info'> Creating user failed... </small>
            </div>". mysqli_error($conn));
        }
         else {
           echo "<div class='alert alert-warning'> 
            <small class='text-info'>You have successfully updated one user.</small>
            </div>";
         }

        }
   
 
    }
        ?>
            

            
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="fname"> First Name</label>
        <input type="text" name="fname" class="form-control" value="<?php echo $fname ?>">
        </div>

        <div class="form-group">
        <label for="lname"> Last Name</label>
        <input type="text" name="lname" class="form-control" value="<?php echo $lname ?>">
        </div>

             <div class="form-group">
        <label for="user_name"> Username</label>
        <input type="text" name="user_name" class="form-control" value="<?php echo $user_name?>">
        </div>

        <div class="form-group">
        <label for="user_role"> User Role</label> <br>
        <select name="user_role" id="" class="form-control">
        <option>--Please choose an option--</option>
        <?php
        if($user_role == "admin") {
            echo " <option value='admin'> Admin </option> ";
        } else {
            echo " <option value='subscriber'> Subscriber</option> ";

        }
        ?>
        </select>
        </div>

        <div class="form-group">
        <label for="user_image">User Image</label> <br>
        <img src="../assets/imgs/<?php echo $user_image?>" alt="" class="img-thumbnail mb-3" style="width: 300px; height: 240px; object-fit: center">
        <input type="file" name="user_image" class="form-control" >
        </div>

        <div class="form-group">
        <label for="user_email">Email</label>
        <input type="text" name="user_email" class="form-control" value="<?php echo $user_email ?>">
        </div>

        <div class="form-group">
        <label for="user_password">Password</label>
        <input type="text" name="user_password" class="form-control" value="<?php echo $user_password ?>">
        </div>

        <div class="form-group">
        <label for="user_website">Website</label>
        <input type="text" name="website" class="form-control" value="<?php echo $website ?>">
        </div>

        <div class="form-group">
        <label for="user_date">date</label>
        <input type="date" name="user_date" class="form-control" value="<?php echo $user_date ?>">
        </div>

        <div class="form-group">
        <label for="user_description">User Description</label>
        <textarea type="text" name="user_description" class="form-control" cols="30" rows="6">
        <?php echo $user_description ?>
        </textarea>
        </div>

        <input type="submit" name="update-users" class="btn btn-primary" value="Add New Users">
        </form>
        </div>
        </div>
            
     </div>
</div>
</div>


<script>
// editor 
ClassicEditor
    .create( document.querySelector( '#editor' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>