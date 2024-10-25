<?php
	$title = 'Add New Products';
	$products = 'active';
	ob_start();
?>


  <div class="pagetitle">
    <h1>Show Product</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item">Products</li>
        <li class="breadcrumb-item active">Show</li>
      </ol>
    </nav>
  </div>


  <div class="row">
    <div class="col col-sm-12 col-lg-6">
      <div class="row">
        <div class="col-12">
          <img src="https://media.wired.com/photos/66df337dfb7d4953b6dc5f31/master/w_2560%2Cc_limit/Screenshot%25202024-09-09%2520at%252010.42.09%25E2%2580%25AFAM.png"
          class="img-fluid" alt="#">
        </div>
        <div class="col-sm-12 col-lg-4">
          <img src="https://www.imagineonline.store/cdn/shop/files/iPhone_15_Pink_PDP_Image_Position-1__en-IN.jpg?v=1694605258"
          class="img-fluid" alt="#">
        </div>
        <div class="col-sm-12 col-lg-4">
          <img src="https://istyle.hu/media/catalog/product/cache/image/700x700/e9c3970ab036de70892d86c6d221abfe/i/p/iphone_13_pink_pdp_image_position-1a__wwen_6.jpg"
          class="img-fluid" alt="#">
        </div>
        <div class="col-sm-12 col-lg-4">
          <img src="https://casefit.ca/cdn/shop/collections/apple-iphone-cases-775224.jpg?v=1726977252"
          class="img-fluid" alt="#">
        </div>
      </div>
    </div>
    <div class="col col-sm-12 col-lg-6 bg-dange p-5">
      <h3>Bell Pepper</h3>
      <div class="rating d-flex">
        <p class="text-left mr-4">
          <a class="mr-2">5.0</a>
          <span><i class="bi bi-star"></i></span>
          <span><i class="bi bi-star"></i></span>
          <span><i class="bi bi-star"></i></span>
          <span><i class="bi bi-star"></i></span>
          <span><i class="bi bi-star"></i></span>
        </p>
        <p class="text-left mr-4">
          <span class="fw-bold">100</span> Rating
        </p>
        <p class="text-left">
          <span class="fw-bold">500</span> Sold
        </p>
      </div>
      
      <p class="price">
        <span class="fw-bold">$120.00</span>
      </p>
      <p>
        A small river named Duden flows by their place and supplies it with the necessary regelialia. It is a paradisematic country, in which roasted parts of sentences fly into your mouth. Text should turn around and return to its own, safe country. But nothing the copy said could convince her and so it didn’t take long until.
      </p>

      <div class="row pt-3">
        <div class="col-lg-4">
          <a href="./update.php" class="btn btn-success">Update</a>
          <a href="#" class="btn btn-danger">Delete</a>
        </div>
      </div>
    </div>
  </div>









<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>