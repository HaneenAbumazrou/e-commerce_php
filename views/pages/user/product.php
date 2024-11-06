<?php
$title = $product[0]["name"];
ob_start();
?>





<section class="ftco-section">
  <div class="container">
    <div class="row">
      <div class="col-lg-6 mb-5 ftco-animate">
        <div class="row">
          <?php $count = 0;
          foreach ($product_images as $image): ?>
            <div class="<?= ($count++ == 0) ? "col-12" : "col-4" ?>">
              <a href="<?= $image["path"] ?>" class="image-popup">
                <img src="<?= $image["path"] ?>" class="img-fluid" alt="Colorlib Template">
              </a>
            </div>
          <?php endforeach ?>
        </div>
      </div>

      <div class="col-lg-6 product-details pl-md-5 ftco-animate">
        <h3><?= $product[0]["name"] ?></h3>
        <!-- <div class="rating d-flex">
          <p class="text-left mr-4">
            <a href="#" class="mr-2">5.0</a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
            <a href="#"><span class="ion-ios-star-outline"></span></a>
          </p>
          <p class="text-left mr-4">
            <a href="#" class="mr-2" style="color: #000;">100 <span style="color: #bbb;">Rating</span></a>
          </p>
          <p class="text-left">
            <a href="#" class="mr-2" style="color: #000;">500 <span style="color: #bbb;">Sold</span></a>
          </p>
        </div> -->
        <p class="price"><span><?= $product[0]["price"] ?> JOD</span></p>
        <p><?= $product[0]["description"] ?></p>



        <div class="d-flex">
          <form action="/user/cart/create?product=<?= $product[0]["id"] ?>" method="post" id="cart">

            <div class="row mt-4">
              <div class="w-100"></div>

              <div class="input-group col-md-6 d-flex mb-3">

                <input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">

              </div>

            <div style="display: flex; align-items: center; gap: 10px;">
                <p style="margin: 0;">
                  <a href="#" class="btn btn-black py-3 px-5" onclick="document.getElementById('cart').submit();">Add to Cart</a>
                </p>

             <form action="/user/wishlist/create?product=<?= $product[0]['id'] ?>" method="POST" style="margin: 0;">
               <button type="submit" class="btn p-0">
               <i class="ion-ios-heart-empty heart-icon"></i>
               </button>
             </form>
            </div>



      </div>
    </div>
  </div>
</section>






<section class="ftco-section">
  <div class="container">
    <div class="row justify-content-center mb-3 pb-3">
      <div class="col-md-12 heading-section text-center ftco-animate">
        <span class="subheading">Products</span>
        <h2 class="mb-4">Related Products</h2>
        <!-- <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p> -->
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">

    <?php foreach($relates as $relate): ?>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="/product?product_id=<?= $relate['id'] ?>" class="img-prod"><img class="img-fluid" src="<?= $relate["path"] ?>" alt="Colorlib Template">
            <div class="overlay"></div>
          </a>
          <div class="text py-3 pb-4 px-3 text-center">
            <h3><a href="#"><?= $relate["name"] ?></a></h3>
            <div class="d-flex">
              <div class="pricing">
                <p class="price"><span class="price-sale"><?= $relate["price"] ?> JOD</span></p>
              </div>
            </div>
            <div class="bottom-area d-flex px-3">
              <div class="m-auto d-flex align-items-baseline">
                  <form action="/user/wishlist/create?product=<?= $relate["id"] ?>" method="POST" id="wish"
                    style="margin-top: 30px;">
                    <a onclick="document.getElementById('wish').submit();" type="button"
                    class="buy-now d-flex justify-content-center align-items-center mx-1">
                      <span><i class="ion-ios-heart"></i></span>
                    </a>
                  </form>
                </div>
            </div>
          </div>
        </div>
      </div>

    <?php endforeach ?>

    </div>
  </div>
</section>






<?php
$content = ob_get_clean();
include './views/pages/user/layout.php';
?>