<!-- output bluffering-->
<?php ob_start() ?>
<?php session_start(); ?>

<?php include "../includes/config.php" ?>
<?php include "../includes/functions.php" ?>

<?php 
if(!isset($_SESSION["user_role"])) {
    // if($user_role !== "admin") {
        header("Location: subcriber.php");
    // }
}

?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Dashboard - ED Blog</title>
        <link href="css/styles.css" rel="stylesheet" />
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css">
        <link href="https://cdn.datatables.net/1.10.20/css/dataTables.bootstrap4.min.css" rel="stylesheet" crossorigin="anonymous" />
        <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/js/all.min.js" crossorigin="anonymous"></script>
        <!-- https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css -->
   
        <script src="https://cdn.ckeditor.com/ckeditor5/27.1.0/classic/ckeditor.js"></script>
   </head>