<div class="container-fluid">

<div class="row">

<div class="col-xl-6">
           
    <div class="card">
        <div class="card-body">

    <!-- insert into post -->
        <?php insertIntoPost();  ?>
            
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="post_title">Title</label>
        <input type="text" name="post_title" class="form-control" autocomplete="off">
        </div>
        <div class="form-group">
        <label for="post_content">Content</label>
        <textarea type="text" id="editor" name="post_content" class="form-control" cols="30" rows="10"></textarea>
        </div>

        <div class="form-group">
        <label for="post_image">image</label>
        <input type="file" name="post_image" class="form-control" id="image">
        </div>

        <div class="form-group">
        <label for="post_tags">Tags</label>
        <input type="text" name="post_tags" class="form-control" >
        </div>

        <div class="form-group">
        <label for="post_status">Status</label> <br>
        <select name="post_status" id="" class="form-control">
        <option>--Please choose an option--</option>
        <option name="post_status">Published</option>
        <option name="post_status">Draft</option>
        </select>
        </div>

        <div class="form-group">
        <label for="post_category">Parent Category</label> <br>
        <select name="post_category" id="" class="form-control" >
        <option value="">--Please choose an option--</option>
        <?php
        $query = "SELECT * FROM categories";
        $display_all_categories = mysqli_query($conn, $query);

        while($row = mysqli_fetch_assoc($display_all_categories)) {
            $cat_id = $row['cat_id'];
            $cat_name = $row['cat_name'];
            echo "<option value='$cat_id'> {$cat_name} </option>";
        }
        ?>
        </select>
        </div>

        <div class="form-group">
        <label for="seo_title">SEO Title</label>
        <input type="text" name="seo_title" class="form-control">
        </div>

        <div class="form-group">
        <label for="post_slug">Slug</label>
        <input type="text" name="post_slug" class="form-control">
        </div>

        <div class="form-group">
        <label for="meta_descriptiion">Meta Description</label>
        <textarea type="text" name="meta_description" class="form-control" cols="30" rows="6"></textarea>
        </div>

        <input type="submit" name="create-post" class="btn btn-primary" value="Add New Post">
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