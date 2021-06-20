 <!-- Navigation-->
 <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
            <div class="container">
                <a class="navbar-brand" href="index.php"> Favicon </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="index.php">
                                Home
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                        <?php 
                        $sql = "SELECT * FROM categories";
                        $select_all_categories = mysqli_query($conn, $sql);

                        while($row = mysqli_fetch_assoc($select_all_categories)) {
                            $cat_id = $row['cat_id'];
                            $cat_name = $row['cat_name'];
                            echo "<li class='nav-item'>
                            <a class='nav-link' href='$cat_id'> {$cat_name}</a>
                            </li>";

                       } 
                        ?>
                         <li class="nav-item ">
                            <a class="nav-link" href="login.php">
                                login
                                <span class="sr-only">(current)</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </nav>