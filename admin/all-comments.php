<div class="container">

<div class="card text-white mb-3" >
  <h2 class="card-header shadow-lg  text-dark"> Comments</h2>
  <div class="card-body">

  <table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">ID </th>
      <th scope="col"> Author</th>
      <th scope="col">Content</th>
      <th scope="col">In Respone To </th>
      <th scope="col">Date Of Submission </th>
      <th scope="col">Email </th>
      <th class="col">Status</th>
      <th scope="col">Approveh</th>
      <th scope="col">Unapproved</th>
    </tr>
  </thead>
  <tbody>

  <?php displayComments();  ?>

  </tbody>

<!-- approve -->
  <?php 
   approveComment();
?>

<!-- unapprove -->
<?php 
   unapproveComment();
?>


  <?php 
  deleteComment();
  ?>
</table>
  </div>
</div>
</div>





