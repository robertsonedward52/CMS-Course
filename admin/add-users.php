<div class="container-fluid">

<div class="row">

<div class="col-xl-6">
           
    <div class="card">
        <div class="card-body">

    <!-- insert into post -->
        <?php createUsers() ?>
            
        <form action="" method="POST" enctype="multipart/form-data">
        <div class="form-group">
        <label for="fname"> First Name</label>
        <input type="text" name="fname" class="form-control" id="image">
        </div>

        <div class="form-group">
        <label for="fname"> Last Name</label>
        <input type="text" name="lname" class="form-control" id="image">
        </div>

        <div class="form-group">
        <label for="user_name"> Username</label>
        <input type="text" name="user_name" class="form-control" >
        </div>

        <div class="form-group">
        <label for="user_role"> User Role</label> <br>
        <select name="user_role" id="" class="form-control">
        <option>--Please choose an option--</option>
        <option name="user_role">Admin</option>
        <option name="user_role">Subscriber</option>
        </select>
        </div>

        <div class="form-group">
        <label for="user_image">User Image</label>
        <input type="file" name="user_image" class="form-control">
        </div>

        <div class="form-group">
        <label for="user_email">Email</label>
        <input type="email" name="user_email" class="form-control">
        </div>

        <div class="form-group">
        <label for="user_password">Password</label>
        <input type="text" name="user_password" class="form-control">
        </div>

        <div class="form-group">
        <label for="website">Website</label>
        <input type="text" name="website" class="form-control">
        </div>

        <div class="form-group">
        <label for="user_description">User Description</label>
        <textarea type="text" name="user_description" class="form-control" cols="30" rows="6"></textarea>
        </div>

        <input type="submit" name="create-users" class="btn btn-primary" value="Add New Users">
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