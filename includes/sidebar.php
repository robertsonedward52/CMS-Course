  <!-- Side widgets-->
  <div class="col-md-4">
                    <!-- Search widget-->
                    <div class="card my-4">
                        <h5 class="card-header">Search</h5>
                        <div class="card-body">
                            <form action="/blog/search.php" method="POST" class="form-inline">
                            <div class="input-group">
                                <input type="text" name="search" class="form-control" type="text" placeholder="Search for..." />
                                <span class="input-group-append"><button type="submit" name="submit" class="btn btn-secondary" type="button">Go!</button></span>
                            </div>
                            </form>
                        </div>
                    </div>


                    <!-- Categories widget-->
                    <div class="card my-4">
                        <h5 class="card-header">Categories</h5>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">

                              <?php 
                                $sql = "SELECT * FROM categories";
                                $select_all_categories = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_assoc($select_all_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name'];
                                
                                    ?>
                                        <li><a href="category.php?category=<?php echo $cat_id ?>"> <?php echo $cat_name ?> </a></li>

                                    <?php }  ?>
                                   
                                    </ul>
                                </div>
                                <div class="col-lg-6">
                                    <ul class="list-unstyled mb-0">
                              <?php 
                                $sql = "SELECT * FROM categories";
                                $select_all_categories = mysqli_query($conn, $sql);

                                while($row = mysqli_fetch_assoc($select_all_categories)) {
                                    $cat_id = $row['cat_id'];
                                    $cat_name = $row['cat_name'];
                                
                                    ?>
                                        <li><a href="category.php?category=<?php echo $cat_id ?>"> <?php echo $cat_name ?> </a></li>

                                    <?php }  ?>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Side widget-->
                    <div class="card my-4">
                        <h5 class="card-header"> Get Started</h5>
                        <div class="card-body">
                        Access Free Unlimited programming courses
                        from our website by simply signing or signup to our blog.
                        </div>
                    </div>
                </div>
