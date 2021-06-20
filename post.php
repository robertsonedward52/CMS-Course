<!-- include config -->
<?php include 'includes/config.php' ?>

<!-- include header -->
<?php include 'includes/header.php' ?>

    <body>
        
          <!-- includes navigation -->
    <?php include 'includes/navbar.php' ?>

        <!-- Page content-->
        <div class="container">
            <div class="row">
               
               
                <!-- Post content-->
            <div class="col-lg-8">

       <?php 
        if(isset($_GET["p_id"])) {
            $the_post_id = $_GET["p_id"];
        }
            $sql = "SELECT * FROM posts WHERE post_id = {$the_post_id}";
            $select_post = mysqli_query($conn, $sql);

            while($row = mysqli_fetch_assoc($select_post)) {
                $post_id = $row['post_id'];
                $post_author = $row['post_author'];
                $post_slug = $row['post_slug'];
                $post_title = $row['post_title'];
                $post_content = $row['post_content'];
                $post_image = $row['post_image'];
                $post_cdate = $row['post_cdate'];

                ?>
                    <!-- Title-->
                    <h1 class="mt-4"> <?php echo $post_title?> </h1>
                    <!-- Author-->
                    <p class="lead">
                        by
                        <a href="#!">  <?php echo $post_author?> </a>
                    </p>
                    <hr />
                    <!-- Date and time-->
                    <p>Posted on <?php echo $post_cdate?> </p>
                    <hr />
                    <!-- Preview image-->
                    <img class="img-fluid rounded" src="assets/imgs/<?php echo $post_image?>" alt="..." />
                    <hr />
                    <!-- Post content-->
                    <p class="lead"> <?php echo $post_content ?> </p>
                   
                   <hr />

                <?php }   ?>



      <!-- Comments form-->
        <div class="card my-4">
        <?php
        if(isset($_POST["create-comment"])) {
        $the_post_id = $_GET["p_id"];
        $comment_author = $_POST["comment_author"];
        $comment_content = $_POST["comment_content"];
        $comment_email = $_POST["comment_email"];
        $comment_date = date("m-d-y");

        $sql = "INSERT INTO comments (post_comment_id, comment_author, comment_content, 
        comment_email, comment_status, comment_date)";
        $sql .= "VALUES($the_post_id, '{$comment_author}', '{$comment_content}',
        '{$comment_email}', 'unapproved', now() )";

        $result = mysqli_query($conn, $sql);
        if(!$result) {
            die("<div class='alert alert-danger' role='alert'>
            <small class='text-info'>Query failed</small>
            </div>" . mysqli_error($conn));
     
     } 

    //  comment count post
        $sql = "UPDATE posts SET comment_count = comment_count + 1 ";
        $sql .= "WHERE post_id = $the_post_id ";
        $update_comment_count = mysqli_query($conn, $sql);     
     
     } ?>

            <h5 class="card-header">Leave a Comment:</h5>
            <div class="card-body">
                <form action="" method="POST">
                <div class="form-group">
                <label for="">Author</label>
                <input type="text" name="comment_author" class="form-control">
                <label for="">Email</label>
                <input type="email" name="comment_email" class="form-control">
                <label for="">Content</label>
                <textarea type="text" name="comment_content" class="form-control" rows="3"></textarea>
                </div>
                    <button type="submit" name="create-comment" class="btn btn-primary">Submit</button>
                </form>

            </div>
        </div>


                 <?php
                   $sql = "SELECT * FROM comments WHERE post_comment_id = $the_post_id ";
                   $sql .= "AND comment_status = 'approved' ";
                   $sql .= "ORDER BY comment_id DESC";

                   $select_comment_query = mysqli_query($conn, $sql);
                   if(!$select_comment_query) {
                       die("Query failed " . mysqli_error($conn));
                   }
                   while ($row = mysqli_fetch_assoc($select_comment_query)) {
                            $comment_author = $row["comment_author"];
                            $comment_date = $row["comment_date"];
                            $comment_content = $row["comment_content"];
                    ?>

                    <!-- Single comment-->
                    <div class="media mb-4">
                            <img class="d-flex mr-3 rounded-circle" src="https://via.placeholder.com/50x50" alt="..." />
                            <div class="media-body">
                                <h5 class="mt-0"> 
                                <?php echo $comment_author ?>
                                <small class='text-muuted ml-2'> <?php echo $comment_date ?> </small>
                                 </h5>
                                <?php echo $comment_content ?>
                            </div>
                        </div>
                        
                        <?php } ?>

                <!-- .col -->
                </div>

                <!-- sidebar widgets -->
                <?php include 'includes/sidebar.php' ?>

            </div>
        </div>
        
          <!-- includes footer -->
          <?php include 'includes/footer.php' ?>

        <!-- Bootstrap core JS-->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="js/post.js"></script>

    </body>
</html>
