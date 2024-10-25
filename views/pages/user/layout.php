<!DOCTYPE html>
<html lang="en">

  <?php require "./views/partials/user/head.php" ?>
  
  <body class="goto-here">
    
    <?php require "./views/partials/user/navbar.php" ?>
    
    
    
    <main>
      <?php if (isset($content)) echo $content; ?>
    </main>
    
    
    <?php require "./views/partials/user/footer.php" ?>
    
    <?php require "./views/partials/user/scripts.php" ?>


  </body>
</html>