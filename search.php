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

            if(isset($_POST['submit'])) {
            $search = $_POST['search'];

            $sql = "SELECT * FROM posts WHERE post_tags LIKE '%$search%' ";
            $search_query = mysqli_query($conn, $sql);

            if(!$search_query) {
                die("<h1> Query failed </h1>" . mysqli_error($conn));
            }
            
            $count = mysqli_num_rows($search_query);
            if($count == 0) {
                echo "<h1> No result found</h1>";
            }
            else {
                while($row = mysqli_fetch_assoc($search_query)) {
                    $post_author = $row['post_author'];
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
    
            
                <?php }  } } ?>

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
        <script src="assets/js/post.js"></script>

    </body>
</html>
