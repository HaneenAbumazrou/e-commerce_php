<!DOCTYPE html>
<html lang="en" style="overflow: hidden;">

  <?php require "./views/partials/admin/head.php" ?>
  
<body>

  <div class="container">

    <section class="section error-404 max-vh-75 d-flex flex-column align-items-center justify-content-center">
      <h1>404</h1>
      <h2>The page you are looking for doesn't exist.</h2>
      <a class="btn" href="/admin/dashboard">Back to home</a>
      <img src="/public/admin/assets/img/not-found.svg" class="img-fluid py-5" alt="Page Not Found">
    </section>

  </div>




      <?php require "./views/partials/admin/footer.php" ?>
      <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>
      <?php require "./views/partials/admin/scripts.php" ?>
</body>

</html>