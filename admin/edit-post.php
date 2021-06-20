<div class="container-fluid">

<div class="row">
<div class="col-xl-6">
           

<div class="card">
        <div class="card-body">
            
        <form action="" method="post" enctype="multipart/form-data">

         <?php 
         if(isset($_GET["p_id"])) {
        $edit_post_id = $_GET["p_id"];
        $sql = "SELECT * FROM posts WHERE post_id = {$edit_post_id}";
        $result = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($result)) {
           $post_category_id = $row["post_category_id"];
            $post_title = $row["post_title"];
            $post_slug = $row["post_slug"];
            $post_content = $row["post_content"];
            $post_image = $row["post_image"];
            $post_status = $row["post_status"];
            $post_tags = $row["post_tags"];
            $modified_date = $row["modified_date"];
            $seo_title = $row["seo_title"];
            $meta_description = $row["meta_description"];
        } 

        if(isset($_POST["update-post"])) {
                  $post_category_id = $_POST["post_category"];
                  $post_title = mysqli_real_escape_string($conn, $_POST["post_title"]);
                  $post_content = mysqli_real_escape_string($conn, $_POST["post_content"]);
                  $post_image = $_FILES["post_image"]["name"];
                  $post_image_temp = $_FILES["post_image"]["tmp_name"];
                  $post_status = mysqli_real_escape_string($conn, $_POST["post_status"]);
                  $post_slug = mysqli_real_escape_string($conn, $_POST["post_slug"]);
                  $post_tags = mysqli_real_escape_string($conn, $_POST["post_tags"]);
                  $modified_date = date("m-d-y");
                  $seo_title = mysqli_real_escape_string($conn, $_POST["seo_title"]);
                  $meta_description = mysqli_real_escape_string($conn, $_POST["meta_description"]);
                
                  move_uploaded_file($post_image_temp, "../assets/imgs/$post_image");

                  if(empty($post_image)) {
                      $query = "SELECT * FROM posts WHERE post_id = {$edit_post_id}";
                      $result = mysqli_query($conn, $query);

                      while($row = mysqli_fetch_assoc($result)) {
                          $post_image = $row["post_image"];
                      }
                  }
        
                  $update_post = "UPDATE posts SET ";
                  $update_post .= "post_category_id = $post_category_id, ";
                  $update_post .= "post_title = '{$post_title}', ";
                  $update_post .= "post_content = '{$post_content}', ";
                  $update_post .= "post_image = '{$post_image}', ";
                  $update_post .= "post_status = '{$post_status}', ";
                  $update_post .= "post_slug = '{$post_slug}', ";
                  $update_post .= "post_tags = '{$post_tags}', ";
                  $update_post .= "seo_title = '{$seo_title}', ";
                  $update_post .= "modified_date = now(), ";
                  $update_post .= "meta_description = '{$meta_description}' ";
                  $update_post .= "WHERE post_id = $edit_post_id ";

                  $update_post_query = mysqli_query($conn, $update_post);
                  if(!$update_post_query) {
                      die('Query failed ' . mysqli_error($conn));
                  }
                  else {
                      echo "<div class='alert alert-warning'> 
                      <small class='text-info'>You have successfully updated one post.</small>
                      </div>";
                  }
            }  
    }  
    
    ?>

 
  <div class="form-group">
        <label for="post_title">Title</label>
        <input value="<?php echo $post_title ?>" type="text" name="post_title" class="form-control" autocomplete="off">
        </div>

        <div class="form-group">
        <label for="post_content">Content</label>
        <textarea type="text" id="editor" name="post_content" class="form-control" cols="30" rows="10">
        <?php echo $post_content ?>
        </textarea>
        </div>

        <div class="form-group">
        <label for="post_image">image</label>
        <img src="../assets/imgs/<?php echo $post_image?>" alt="" class="img-thumbnail">
       <input type="file" name="post_image" class="form-control">
        </div>

        <div class="form-group">
        <label for="post_status">Status</label> <br>
        <input type="text" name="post_status" class="form-control" value="<?php echo $post_status ?>">
        </select>
        </div>

        <div class="form-group">
        <label for="post_tags">Tags</label>
        <input type="text" name="post_tags" class="form-control" value="<?php echo $seo_title ?>">
        </div>

        <div class="form-group">
        <label for="modified_date">Modified Date </label>
        <input type="date" name="modified_date" class="form-control" value="<?php echo $seo_title ?>">
        </div>

        <div class="form-group">
        <label for="post_category">Parent Category</label> <br>
        <select name="post_category" id="" class="form-control">
        <?php 
        $sql = "SELECT * FROM categories";
        $select_categories = mysqli_query($conn, $sql);
        while($row = mysqli_fetch_assoc($select_categories)) {
            $cat_id = $row['cat_id'];
            $cat_name = $row['cat_name'];
        echo "<option value='$cat_id'>$cat_name</option>";
        }
        ?>
        </select>
        </div>

        <div class="form-group">
        <label for="seo_title">SEO Title</label>
        <input type="text" name="seo_title" class="form-control" value="<?php echo $seo_title ?>">
        </div>

        <div class="form-group">
        <label for="post_slug">Slug</label>
        <input type="text" name="post_slug" class="form-control" value="<?php echo $post_slug ?>">
        </div>

        <div class="form-group">
        <label for="meta_descriptiion">Meta Description</label>
        <textarea type="text" name="meta_description" class="form-control" cols="30" rows="6">
        <?php echo $meta_description ?>
        </textarea>
        </div>

        <input type="submit" name="update-post" class="btn btn-primary" value="Update Post">
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