
  <!-- edit comments -->
<div class="col-xl-6">
<form action="" method="POST">

<?php 
//  GET URL for the edit href link
if(isset($_GET["c_id"])) {
    $update_comment_id = $_GET["c_id"];
    
    $sql = "SELECT * FROM comments WHERE comment_id = $update_comment_id";
    $read_all_comments = mysqli_query($conn, $sql);
    
    while($row = mysqli_fetch_assoc($read_all_comments)) {
    $comment_content = $row["comment_content"];
    
    
    if(isset($_POST["update-comment"])) {
        $comment_content = mysqli_real_escape_string($conn, $_POST["comment_content"]);
         
        $sql = "UPDATE comments SET ";
        $sql .= "comment_content = '$comment_content' ";
        $sql .= "WHERE comment_id = $update_comment_id  ";
    
        $update_comment_query = mysqli_query($conn, $sql);
        if(!$update_comment_query) {
            die("<div class='alert alert-warning' role='alert' >
            <span class='text-muted'> Comment updating failed... </span>
            </div>" . mysqli_error($conn));
        } else {
           echo "<div class='alert alert-success mt-4 ml-2' role='alert' >
            <span class='text-muted'> Updated comment successfully... </span>
            </div>"; 
        }
    
    }

?>

<div class="card-body">

<h1 class="display-5">Edit Comments </h1>
<div class="form-group">
<label for="comment_content"> Content</label>
<textarea type="text" id="editor2" name="comment_content" class="form-control"row="10" col="10"> 
<?php if(isset($comment_content)){echo $comment_content;} ?>
</textarea>
</small>
</div>

<input type="submit" name="update-comment" class="btn btn-primary" value="Update Comment">

<?php } } ?>
</form>


  <!-- col -->
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