<div class="container-fluid">

<div class="col-xl-12 ">

    <table class="table table-hover">
    <thead>
    <tr>
    <th>Title</th>
    <th>Author</th>
    <th>Category</th>
    <th>Image</th>
    <th>Tags </th>
    <th>Date </th>
    <th>Comment Count</th>
    <!-- <th>Views </th> -->
    <th>Status </th>
    </tr>
    </thead>
    <tbody>
    <tr>

    <?php
    
      $sql = "SELECT * FROM posts LIMIT 20 ";
      $select_all_posts = mysqli_query($conn, $sql);
  
      while($row = mysqli_fetch_assoc($select_all_posts)) {
         $post_id = $row["post_id"];
         $post_category_id = $row["post_category_id"];
          $post_title = $row["post_title"];
          $post_author = $row["post_author"];
          $post_image = $row["post_image"];
          $post_content = $row["post_content"];
          $post_tags = $row["post_tags"];
          $post_cdate = $row["post_cdate"];
          $comment_count = $row["comment_count"];
          $post_status = $row["post_status"];
          // $post_views = $row["post_views"];

      ?>
    <td> <?php echo $post_title ?> <br>
    <small class="text-danger"><a href="posts.php?source=edit-post&p_id=<?php echo $post_id ?>"> Edit</a></small>
    <small class="text-danger"><a href="posts.php?delete=<?php echo $post_id ?>"> Delete</a></small>
    <small class="text-danger"><a href=""> View</a></small>
    </td>
    <td> <?php echo $post_author ?> </td> 
    <td>
    <?php
   $sql = "SELECT * FROM categories WHERE cat_id = {$post_category_id} ";
   $select_categories = mysqli_query($conn, $sql);
      while($row = mysqli_fetch_assoc($select_categories)) {
          $cat_id = $row['cat_id'];
          $cat_name = $row['cat_name'];
          echo $cat_name;
      }
      ?>
    </td>

    <td> <img style="width: 100px; height: 50px" class="img-thumbnail" src="../assets/imgs/<?php echo $post_image ?> " alt=""></td>
    <td> <?php echo $post_tags ?> </td>
    <td> <?php echo $post_cdate ?> </td>
    <td> <?php echo $comment_count ?> </td>
    <!-- <td> <?php #echo $post_views ?> </td> -->
    <td> <?php echo $post_status ?> </td>
    </tr>

   <?php }   ?>

    </tbody>



    <!-- delete post -->

    <?php deletePost();  ?>

    
    </table>
            
</div>


</div>