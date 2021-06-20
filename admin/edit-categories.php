    <!-- edit category -->
    <div class="col-xl-6 mt-4">
            <h2 class="display-4">Edit Catogory</h2>
            <div class="card">
        <div class="card-body">
  <form action="" method="POST">

  <?php 
    if(isset($_GET["edit"])) {
        editCategories();
   ?>

<div class="form-group">

        <label for="cat_name">Name</label>
        <input value="<?php if(isset($cat_name)){echo $cat_name;} ?> " type="text" name="cat_name" class="form-control" autocomplete="off"
        >
        <small class="text-muted">The name is how it appears on your site.</small>
        </div>

        <div class="form-group">
        <label for="cat_slug">Slug</label>
        <input value="<?php if(isset($cat_slug)){echo $cat_slug;} ?> "type="text" name="cat_slug" class="form-control" autocomplete="off">
        <small class="text-muted">The “slug” is the URL-friendly version of the name. 
        It is usually all lowercase and contains only letters, numbers, and hyphens..</small>
        </div>
        
        <div class="form-group">
        <label for="cat_slug">Description</label>
        <textarea value="<?php if(isset($cat_description)){echo $cat_description;} ?> " type="text" name="cat_description" class="form-control"row="10" 
        col="10"> </textarea>
        <small class="text-muted">The description is not prominent by default; however, some themes may show it.
        </small>
    </div>
        
    <?php } ?>

        <input type="submit" name="edit-category" class="btn btn-primary" value="Update Category">
        </form>

<!-- card-body -->
        </div>
        <!-- card -->
        </div>
            
            <!-- col -->
            </div>