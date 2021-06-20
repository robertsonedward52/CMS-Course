     <div class="col-xl-6">
         <!-- create categories query -->
            <?php createCategories();?>
            
        <div class="card-body">
    <h1 class="display-5">Create Category</h1>

        <form action="" method="POST">
        <div class="form-group">
        <label for="cat_name">Name</label>
        <input type="text" name="cat_name" class="form-control" autocomplete="off">
        <small class="text-muted">The name is how it appears on your site.</small>
        </div>

        <div class="form-group">
        <label for="cat_slug">Slug</label>
        <input type="text" name="cat_slug" class="form-control" autocomplete="off">
        <small class="text-muted">The “slug” is the URL-friendly version of the name. 
        It is usually all lowercase and contains only letters, numbers, and hyphens..</small>
        </div>

        <div class="form-group">
        <label for="cat_slug">Description</label>
        <textarea type="text" id="editor1" name="cat_description" class="form-control" row="10" col="10"> </textarea>
        <small class="text-muted">The description is not prominent by default; however, some themes may show it.
        </small>
        </div>

        <input type="submit" name="create-category" class="btn btn-primary" value="Add New Category">
        </form>
        </div>
            
            </div>



      <!-- read result from  category -->
    <div class="col-xl-6">
<form action="" method="POST">

<?php 
//  GET URL for the edit href link
if(isset($_GET["edit"])) {
$the_cat_id = $_GET["edit"];

$sql = "SELECT * FROM categories WHERE cat_id = $the_cat_id";
$select_all_categories = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($select_all_categories)) {
$cat_name = $row["cat_name"];
$cat_slug = $row["cat_slug"];
$cat_description = $row["cat_description"];

?>

<div class="card-body">
<h1 class="display-5">Edit Catogory</h1>

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
<textarea type="text" id="editor2" name="cat_description" class="form-control"row="10" col="10"> 
<?php if(isset($cat_description)){echo $cat_description;} ?>
</textarea>
<small class="text-muted">The description is not prominent by default; however, some themes may show it.
</small>
</div>

<input type="submit" name="update-category" class="btn btn-primary" value="Update Category">

<?php } } ?>
</form>

<!-- card-body -->
</div>

<?php updateCategories(); ?>

  <!-- col -->
  </div>


<!-- tables -->
            <div class="col-xs-6 mt-5">
            <!-- <div class="card"> -->
        <div class="card-body table-responsive">
        
        <table class="table table-hover table-border">
        <thead class="thead-dark">
        <tr>
        <th>Name</th>
        <th>Slug</th>
        <th>Description</th>
        </tr>
        </thead>
        <tbody>
        <?php
        // show categories result query
       displayCategories();
    ?>
        </tbody>

<!-- delete category query-->
        <?php
        deleteCategories();
     ?>
        </table>
        </div>
        <!-- </div> -->

            </div>



            <script>
// editor 
ClassicEditor
    .create( document.querySelector( '#editor1' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>

<script>
// editor 
ClassicEditor
    .create( document.querySelector( '#editor2' ) )
    .then( editor => {
        console.log( editor );
    } )
    .catch( error => {
        console.error( error );
    } );
</script>