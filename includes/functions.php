
<!-- create categories -->
<?php
function createCategories() {
    global $conn;
    if(isset($_POST["create-category"])) {
            
$cat_name = mysqli_real_escape_string($conn,  $_POST["cat_name"]);
$cat_slug = mysqli_real_escape_string($conn, $_POST["cat_slug"]);
$cat_description = mysqli_real_escape_string($conn, $_POST["cat_description"]);


 $check_duplicate_categories   = "SELECT cat_name FROM categories WHERE cat_name = '{$cat_name}' ";

 $result = mysqli_query($conn, $check_duplicate_categories);

 $count_records = mysqli_num_rows($result);
 if($count_records > 0) {
     echo "<div class='alert alert-danger border border-info'>
     <span>This category has already been created</span>
     </div>";
     return false;
 }   
        if($cat_name == "" || empty($cat_name) && $cat_slug == "" || empty($cat_slug)) {
           echo "<b class='alert alert-warning' role='alert'> Sorry this field cannot be empty.</b>";
       } else {
           $sql = "INSERT INTO categories(cat_name, cat_slug, cat_description)";
           $sql .= "VALUES ('{$cat_name}','{$cat_slug}','{$cat_description}' )";
           $create_category_query = mysqli_query($conn, $sql);

           if(!$create_category_query) {
               die("<div class='border border-dark '> Query failed </div>" . mysqli_error($conn));
           } 
           else {
             echo  "<div class='alert alert-success alert-dismissible fade show' role='alert'>
<strong>Thanks!..</strong>you have successfully create one category.
<button type='button' class='close' data-dismiss='alert' aria-label='Close'>
<span aria-hidden='true'>&times;</span>
</button>
</div>";
           }
       }
      }

    }


// edit categories
  function editCategories() {
    $the_cat_id = $_GET["edit"];
    $sql = "SELECT * FROM categories WHERE cat_id = $the_cat_id";
    $select_all_categories = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($select_all_categories)) {
        $cat_name = $row["cat_name"];
        $cat_slug = $row["cat_slug"];
        $cat_description = $row["cat_description"];

    }
  }

   // show categories result
function displayCategories() {
    global $conn;
    $sql = "SELECT * FROM categories ";
    $select_categories = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($select_categories)) {
        $cat_id = $row['cat_id'];
        $cat_name = $row['cat_name'];
        $cat_slug = $row['cat_slug'];
        $cat_description = substr($row['cat_description'],0, 150);
        echo "<tr>";
        echo "<td> <div class='form-check pr-5'>
    <input type='checkbox' class='form-check-input pr-5'></div>;
   $cat_name <br>
    <a href='categories.php?edit=$cat_id'>
    <small class='text-primary mr-2'> Edit </small>
    </a>
    <a href='categories.php?delete=$cat_id'>
    <small class='text-danger'>Delete</small> <br>
    </a>
    <a href='../post.php'>
    <small class='text-primary'>View </small>
    </a>
    </td> ";
    echo "<td> $cat_slug </td> ";
    echo "<td> $cat_description  </td>";
    echo "</tr>";

  } 

}


// delete Categories
function deleteCategories() {
    global $conn;
    if(isset($_GET["delete"])) {
    $delete_id = $_GET["delete"];
    $sql = "DELETE FROM categories WHERE cat_id = $delete_id";
    $select_categories = mysqli_query($conn, $sql);
        
    // redirect the header to the categoires page
    header("Location: categories.php");
    
        }
}



function updateCategories() {

    global $conn;
    //  GET URL for the edit href link
if(isset($_POST["update-category"])) {
    $update_cat_id = $_GET["edit"];
    $cat_name = mysqli_real_escape_string($conn, $_POST["cat_name"]);
    $cat_slug = mysqli_real_escape_string($conn, $_POST["cat_slug"]);
    $cat_description = mysqli_real_escape_string($conn, $_POST["cat_description"]);
    
    $sql = "UPDATE categories SET cat_name='{$cat_name}', cat_slug = '{$cat_slug}',
    cat_description = '{$cat_description}' WHERE cat_id = {$update_cat_id} ";
    $update_categories = mysqli_query($conn, $sql);
    
    // test if the connection to the db fail
    if(!$update_categories) {
        die("<div class='border border-dark '> Query failed </div>" . mysqli_error($conn));
    }
    else {
        echo  "<div class='alert alert-success alert-dismissible fade show' role='alert'>
    <strong>Thanks!..</strong>you have successfully updated one category.
    <button type='button' class='close' data-dismiss='alert' aria-label='Close'>
    <span aria-hidden='true'>&times;</span>
    </button>
    </div>";
      }
    }
}



// insert into post
function insertIntoPost() {
    global $conn;
    if(isset($_POST["create-post"])) {
        $post_category_id = $_POST["post_category"];
        $post_title = mysqli_real_escape_string($conn, $_POST["post_title"]);
        $post_content = mysqli_real_escape_string($conn, $_POST["post_content"]);
        $post_image = $_FILES["post_image"]["name"];
        $post_image_temp = $_FILES["post_image"]["tmp_name"];
        $post_status = mysqli_real_escape_string($conn, $_POST["post_status"]);
        $post_slug = mysqli_real_escape_string($conn, $_POST["post_slug"]);
        $post_tags = mysqli_real_escape_string($conn, $_POST["post_tags"]);
        $post_cdate = date("m,d,y");
        $seo_title = mysqli_real_escape_string($conn, $_POST["seo_title"]);
        $meta_description = mysqli_real_escape_string($conn, $_POST["meta_description"]);

        move_uploaded_file($post_image_temp, "../assets/imgs/$post_image");

        $insert_post = "INSERT INTO posts(post_category_id, post_title, post_content, post_image,
         post_status, post_slug, post_tags, post_cdate, seo_title, 	meta_description) ";

        $insert_post .= "VALUES($post_category_id, '{$post_title}', '{$post_content}', '{$post_image}',
        '{$post_status}', '{$post_slug}', '{$post_tags}', now(), '{$seo_title}', '{$meta_description}' )";
        
        $result = mysqli_query($conn, $insert_post);
        if(!$result) {
          die("<h1> Query failed... </h1>" . mysqli_error($conn));
        }
      }  
}




// delete post
function deletePost() {
    global $conn;
    if(isset($_GET["delete"])) {
        $delete_post_id = $_GET["delete"];
        $sql = "DELETE FROM posts WHERE post_id = {$delete_post_id}";
        $result = mysqli_query($conn, $sql);
         header("Location: posts.php");

      }
}




// create comments
function displayComments() {
  global $conn;
  $sql = "SELECT * FROM comments";
  $result = mysqli_query($conn, $sql);

  while($row = mysqli_fetch_assoc($result)) {
    $comment_id = $row['comment_id'];
    $post_comment_id = $row['post_comment_id'];
    $comment_author = $row['comment_author'];
    $comment_content = $row['comment_content'];
    $comment_date = $row['comment_date'];
    $comment_status = $row['comment_status'];
    $comment_email = $row['comment_email'];

    echo "<tr>";
    echo "<td> $comment_id </td>";
    echo "<td> 

    <div class='form-check pr-5'>
    $comment_author <br>

    <a href='comments.php?source=edit-comments&c_id=$comment_id'>
    <small class='text-primary mr-2'> Edit </small>
    </a>

    <a href='comments.php?delete=$comment_id'>
    <small class='text-primary mr-2'> Delete </small>
    </a>
    </td> ";

    echo "<td> $comment_content </td>";

    $sql = "SELECT * FROM posts WHERE post_id = $post_comment_id";
    $select_post_id = mysqli_query($conn, $sql);

    while($row = mysqli_fetch_assoc($select_post_id)) {
      $post_id = $row["post_id"];
      $post_title = $row["post_title"];
    echo "<td> <a href='../post.php?p_id=$post_id'> $post_title </a> </td>";
    }
    echo "<td> $comment_date </td>";
    echo "<td> $comment_email </td>";
    echo "<td> $comment_status </td>";
  
    echo "<td> <a href='comments.php?approve=$comment_id'> Approve</a>  </td>";
    echo "<td> <a href='comments.php?unapprove=$comment_id'> Unapprove </a>  </td>";
    echo "</tr>";
  }
}




// delete comment
function deleteComment() {
    global $conn;
    if(isset($_GET["delete"])) {
        $the_comment_id = $_GET["delete"];
        $query = "DELETE  FROM comments WHERE comment_id = {$the_comment_id}";
        $delete_comment_query = mysqli_query($conn, $query);
        header("Location: comments.php");
      }
}

// approve comment
function approveComment() {
    global $conn;
    if(isset($_GET["approve"])) {
        $approve_comment_id = $_GET["approve"];
        $query = "UPDATE comments SET comment_status = 'approved' WHERE comment_id = $approve_comment_id";
        $approve_comment_query = mysqli_query($conn, $query);
        header("Location: comments.php");
      }
}

// unapprove comment
function unapproveComment() {
    global $conn;
    if(isset($_GET["unapprove"])) {
        $unapprove_comment_id = $_GET["unapprove"];
        $query = "UPDATE comments SET comment_status = 'unaproved' WHERE comment_id = $unapprove_comment_id";
        $unapprove_comment_query = mysqli_query($conn, $query);
        header("Location: comments.php");
      }
}


// create users query
 function createUsers() {

    global $conn;
    if(isset($_POST["create-users"])) {
        $fname = mysqli_real_escape_string($conn, $_POST["fname"]);
        $lname = mysqli_real_escape_string($conn, $_POST["lname"]);
        $user_name = mysqli_real_escape_string($conn, $_POST["user_name"]);
        $user_password = mysqli_real_escape_string($conn, $_POST["user_password"]);
        $user_image = $_FILES["user_image"]["name"];
        $user_image_temp = $_FILES["user_image"]["tmp_name"];
        $user_role = mysqli_real_escape_string($conn, $_POST["user_role"]);
        $user_date = date("m-d-y");
        $website = mysqli_real_escape_string($conn, $_POST["website"]);
        $user_email = mysqli_real_escape_string($conn, $_POST["user_email"]);
        $user_description = mysqli_real_escape_string($conn, $_POST["user_description"]);

        move_uploaded_file($user_image_temp, "../assets/imgs/$user_image");

        $query = "INSERT INTO users (fname, lname, user_name, user_password,
         user_role, user_image, website, user_email, user_date, user_description) ";

        $query .= "VALUES ('{$fname}', '{$lname}', '{$user_name}', '{$user_password}',
        '{$user_role}', '{$user_image}', '{$website}', '{$user_email}', now(), '{$user_description}' )";

         $create_user_query = mysqli_query($conn, $query);
        if(!$create_user_query) {
            die("<div class='alert alert-warning' role='alert'>
            <span class='text-muted'> Creating user failed...</span>
            </div>"
             . mysqli_error($conn));
        } else {
            echo "<div class='alert alert-success' role='alert'>
            <span class='text-muted'> You have successfully created one user.</span>
            </div>";
        }
    }
    
 }


 function deleteUsers() {
     global $conn;
    if(isset($_GET["delete"])) {
        $delete_user_id = $_GET["delete"];
  
        $sql = "DELETE FROM users WHERE user_id = {$delete_user_id} ";
        $delete_user = mysqli_query($conn, $sql);
        header("Location: users.php");
      }
 }



?>