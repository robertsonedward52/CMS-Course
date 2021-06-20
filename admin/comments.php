
<!-- include admin header -->
<?php include "admin-header.php" ?>

    <body class="sb-nav-fixed">
        

    <!-- admin navbar includes -->
    <?php include 'includes/admin-navbar.php' ?>


         <!-- admin navbar includes -->
    <?php include 'includes/admin-sidenav.php' ?>


            <!-- sidebar nav -->
            <div id="layoutSidenav_content">
           

           <div class="conatiner-fluid py-3">
           
          <div class="row">
          
          <?php
          if(isset($_GET["source"])) {
             
            $source = $_GET["source"];
          }
          else {
          $source = "";
          }
          switch($source) {
            case "edit-comments":
            include "edit-comments.php";
            break;
             default:
             include "all-comments.php";
          }
          
          
          ?>

          
          </div>

           </div>
                    
                <?php require 'includes/admin-footer.php' ?>
            </div>

        </div>

    </body>
</html>
