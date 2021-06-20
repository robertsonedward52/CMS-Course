<!-- include config -->
<?php include 'includes/config.php' ?>
<?php session_start(); ?>


<!-- include header -->
<?php include 'includes/header.php' ?>

    <body>
   
        <!-- Page content-->
        <div class="container" style="margin: 10% auto;">

            <div class="row">

                <!-- Blog entries-->
                <div class="col" >

                <?php
                
                if(isset($_POST["login"])) {
                $username =  $_POST["username"];
                $password =  $_POST["password"];

                $username = mysqli_real_escape_string($conn, $username);
                $password = mysqli_real_escape_string($conn, $password);
                
                $sql = "SELECT * FROM users WHERE user_name = '{$username}' ";
                $read_users = mysqli_query($conn, $sql);

                if(!$read_users) {
                    die("<div class='alert alert-warning' role='alert'> 
                    <span class='text-muted'>  Query failed.... </span>
                    </div>" . mysqli_error($conn));
                }
                while($row = mysqli_fetch_assoc($read_users)) {
                    $db_user_id = $row["user_id"];
                    $db_username = $row["user_name"];
                    $db_password = $row["user_password"];
                    $db_firstname = $row["lname"];+
                    $db_lastname = $row["fname"];
                    $db_user_role = $row["user_role"];  
                }
                if($username !== $db_username && $password !== $db_password) {

                header("Location: index.php");
                } else if($username == $db_username && $password == $db_password) {

                    $_SESSION["user_name"] = $db_username;
                    $_SESSION["user_password"] = $db_password;
                    $_SESSION["fname"] = $db_firstname;
                    $_SESSION["lname"] = $db_lastname;
                    $_SESSION["user_role"] = $db_user_role;

                    header("Location: admin");
                } else {
                    header("Location: index.php");
                }
          }
                
       ?>

                <div class="jumbotron">
                
                <h1 class="title">Last Registration</h1>

                <!-- <div class="col-sm-4  shadow-lg">
         
                </div> -->
                </div>

                </div>

                <div class="col-md-6 shadow-lg">
                 <form action="" method="POST" class="mt-4">
                 
                 <div class="form-group">
                 <input type="text" name="username" class="form-control py-4" placeholder="email or phone number">
                 </div>
                 <div class="form-group mb-3">
                 <input type="password" name="password" class="form-control py-4" placeholder="password">
                 </div>
                
                 <div class="form-group ">
                <button type="submit" name="login" class="form-control btn btn-primary pb-4" >Login</button>
                 </div>

                 <div class="form-group">
                 <a href="#" class='d-flex justify-content-center'>Forget password?</a>
                 </div>
                 <div class="form-group d-flex justify-content-center">
                 <input type="submit" name="" class='btn btn-success' value="Create account">
                 </div>
               
                 </form>
                </div>
                
                <!-- ./ row -->
            </div>


                <!-- ./ container -->
        </div>

             <!-- includes footer -->
        <?php include 'includes/footer.php' ?>
      
    </body>
</html>
