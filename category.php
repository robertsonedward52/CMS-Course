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
                        Post Category
                        <small>Tech</small>
                    </h1>
                   
                <?php 

                if(isset($_GET["category"])) {
                $post_category_id  = $_GET["category"];
                }
                $sql = "SELECT * FROM posts WHERE post_id = {$post_category_id}";
                $select_post_category = mysqli_query($conn, $sql);
                
                while($row = mysqli_fetch_assoc($select_post_category)) {
                    $post_id = $row['post_id'];
                    $post_author = $row['post_author'];
                    $post_title = $row['post_title'];
                    $post_content = $row['post_content'];
                    $post_slug = $row['post_slug'];
                    $post_image = $row['post_image'];
                    $post_cdate = $row['post_cdate'];
                    
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
                  
                    <?php } 
                    
                ?>

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
