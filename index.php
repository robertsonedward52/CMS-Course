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

                <!-- Blog entries-->
                <div class="col-md-8">

                <h1 class="my-4">
                        Latest Post
                        <small class="text-muted">Tech</small>
                    </h1>
                   
                <?php 
                $sql = "SELECT * FROM posts ";
                $select_all_posts = mysqli_query($conn, $sql);
                while($row = mysqli_fetch_assoc($select_all_posts)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    $post_slug = $row['post_slug'];
                    $post_image = $row['post_image'];
                    $post_cdate = $row['post_cdate'];
                    $post_status = $row['post_status'];

                    if($post_status !== "published") {
                    echo "<div class='alert alert-primary' role='alert'>
                    <p class='text-center display-4'> Sorry no posts found </p>
                    </div> " ;
                    } else {
                    ?>
                    <!-- Blog post-->
                    <div class="card mb-4">
                      <a href="post.php?p_id=<?php echo $post_id?>"> 
                      <img class="card-img-top" src="assets/imgs/<?php echo $post_image?>" alt="Card image cap" />
                        <div class="card-body">
                            <h2 class="card-title"> <?php echo $post_title ?> </h2>
                            <p class="card-text"> <?php echo $post_content ?> </p>
                            <a class="btn btn-primary" href="#!">Read More →</a>
                        </div>
                      </a>
                        <div class="card-footer text-muted">
                            Posted on <?php echo $post_cdate ?> by
                            <a href="#!"> <?php echo $post_author ?></a>
                        </div>
                    </div>
                  
                    <?php } }  ?>

                    <!-- Pagination-->
                    <ul class="pagination justify-content-center mb-4">
                        <li class="page-item"><a class="page-link" href="#!">← Older</a></li>
                        <li class="page-item disabled"><a class="page-link" href="#!">Newer →</a></li>
                    </ul>
                </div>
                
              
                <!-- sidebar widgets -->
                <?php include 'includes/sidebar.php' ?>

                
                <!-- ./ row -->
            </div>
                <!-- ./ container -->
        </div>
      
      
       <!-- includes footer -->
        <?php include 'includes/footer.php' ?>

    </body>
</html>
