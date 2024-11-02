<?php
  $title = 'Contact Us';
  ob_start();
?>



  <div class="hero-wrap hero-bread" style="background-image: url('./public/user/assets/images/Contact-us.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Contact us</span></p>
          <h1 class="mb-0 bread">Contact us</h1>
        </div>
      </div>
    </div>
  </div>

  <section class="ftco-section contact-section bg-light">
    <div class="container">

      <div class="row block-9">
        <div class="col-md-6 order-md-last d-fle">

          <?php if(isset($_SESSION["msgSentSuccessfully"])): ?>
            <div class="alert alert-success alert-dismissible fade show" role="alert">
              <?= $_SESSION["msgSentSuccessfully"] ?>
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
          <?php endif ?>

          <form action="/contact-us" class="bg-white p-5 contact-form" method="POST">
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Name" name="name">
              <span class="text-danger">
                <?= $_SESSION["contact_errors"]["name_error"] ?? null ?>
              </span>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Your Email" name="email">
              <span class="text-danger">
                <?= $_SESSION["contact_errors"]["email_error"] ?? null ?>
              </span>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" placeholder="Subject" name="subject">
              <span class="text-danger">
                <?= $_SESSION["contact_errors"]["subject_error"] ?? null ?>
              </span>
            </div>
            <div class="form-group">
              <textarea name="message" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              <span class="text-danger">
                <?= $_SESSION["contact_errors"]["message_error"] ?? null ?>
              </span>
            </div>
            <div class="form-group">
              <input type="submit" value="Send Message" class="btn btn-primary py-3 px-5">
            </div>
          </form>
        
        </div>

        <div class="col-md-6 d-flex">
          <div id="map" class="bg-white border-bottom border-right border-1 border-dark">
          <iframe style="max-width:100%; height: 100%;"
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3384.665483222874!2d35.9066458753906!3d31.96997067401127!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x151ca12ce1b9c62b%3A0x21b9b701f3f4ee86!2sOrange%20Coding%20Academy!5e0!3m2!1sen!2sjo!4v1729266602039!5m2!1sen!2sjo" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
        </div>
      </div>
    </div>
  </section>




<?php
  $content = ob_get_clean();
  include './views/pages/user/layout.php';
?>