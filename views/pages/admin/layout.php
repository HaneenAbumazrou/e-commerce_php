<!DOCTYPE html>
<html lang="en" style="overflow-x: hidden;">

  <?php require "./views/partials/admin/head.php" ?>
  
  <body>

    
      <?php
        if(!is_login()){
          require "./views/partials/admin/navbar.php";
          require "./views/partials/admin/sidebar.php";
        }
      ?>

        
        <main id="<?= (!is_login())? "main":"" ?>" class="main">
          <?php if (isset($content)) echo $content; ?>
        </main>



        <?php require "./views/partials/admin/footer.php" ?>
        <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
        <?php require "./views/partials/admin/scripts.php" ?>
  </body>

</html>