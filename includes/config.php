<?php
$servername = "localhost";
$username = 'root';
$password = '';
$db = 'blog';

$conn = mysqli_connect($servername, $username, $password, $db);

// check connection
if(!$conn) {
    die('connection failed'. mysqli_error($conn));
} 

// hide the connnection sucessfully from the front-end
// else {
//     echo 'connected successfully';
// }


?>

<!-- <div class="alert alert-warning alert-dismissible fade show" role="alert">
    Connection failed.
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div> -->