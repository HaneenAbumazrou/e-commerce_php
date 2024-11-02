<?php
  $title = 'About Us';
  ob_start();
?>



  <div class="hero-wrap hero-bread" style="background-image: url('./public/user/assets/images/about-bg.png');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>About us</span></p>
          <h1 class="mb-0 bread">About us</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section ftco-no-pb ftco-no-pt bg-light">
    <div class="container">
      <div class="row">
        <div class="col-md-5 p-md-5 img img-2 d-flex justify-content-center align-items-center" style="background-image: url(./public/user/assets/images/about.jp);">
          <img src="/public/user/assets/images/logo.png" alt="">
        </div>
        <div class="col-md-7 py-5 wrap-about pb-md-5 ftco-animate">
          <div class="heading-section-bold mb-4 mt-md-5">
            <div class="ml-md-0">
              <h2 class="mb-4">Welcome to MobixStore an eCommerce website</h2>
            </div>
          </div>
          <div class="pb-md-5">
            <p>Welcome to MobixStore, your trusted destination for the latest in mobile technology and accessories. Our mission is to bring you an unmatched shopping experience by offering a wide selection of high-quality mobile phones and accessories from top brands. Whether you’re seeking a high-performance smartphone, a durable protective case, or the latest in mobile tech, we aim to meet all your mobile needs with products that combine quality, innovation, and style.</p>
            <p>At MobixStore, we’re passionate about technology and committed to helping you stay connected in style. Our catalog features the latest devices from leading brands, as well as an extensive range of accessories designed to enhance and protect your mobile experience. From headphones and power banks to screen protectors and chargers, we carefully select every product to ensure it meets our standards for reliability and quality, so you can shop with confidence.</p>
            <p><a href="/#home-produts" class="btn btn-primary">Shop now</a></p>
          </div>
        </div>
      </div>
    </div>
  </section>





<?php
  $content = ob_get_clean();
  include './views/pages/user/layout.php';
?>