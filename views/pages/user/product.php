<?php
$title = 'Prdouct Name';
ob_start();
?>




<!-- <div class="hero-wrap hero-bread" style="background-image: url('./public/user/assets/images/bg_1.jpg');">
    <div class="container">
      <div class="row no-gutters slider-text align-items-center justify-content-center">
        <div class="col-md-9 ftco-animate text-center">
          <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span class="mr-2"><a href="index.html">Product</a></span> <span>Product Single</span></p>
          <h1 class="mb-0 bread">Product Single</h1>
        </div>
      </div>
    </div>
  </div> -->

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
        <div class="rating d-flex">
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
        </div>
        <p class="price"><span><?= $product[0]["price"] ?> JOD</span></p>
        <p><?= $product[0]["description"] ?></p>



        <div class="d-flex">
          <form action="/user/cart/create?product=<?= $product[0]["id"] ?>" method="post" id="cart">

            <div class="row mt-4">
              <div class="w-100"></div>

              <div class="input-group col-md-6 d-flex mb-3">
                <span class="input-group-btn mr-2">
                  <button type="button" class="quantity-left-minus btn" data-type="minus" data-field="">
                    <i class="ion-ios-remove"></i>
                  </button>
                </span>
                <input type="number" id="quantity" name="quantity" class="form-control input-number" value="1" min="1" max="100">
                <span class="input-group-btn ml-2">
                  <button type="button" class="quantity-right-plus btn" data-type="plus" data-field="">
                    <i class="ion-ios-add"></i>
                  </button>
                </span>
              </div>

              <div class="w-100"></div>
            </div>

            <p><a href="#" class="btn btn-black py-3 px-5"
                onclick="document.getElementById('cart').submit();">Add to Cart</a></p>
          </form>


          <form action="/user/wishlist/create?product=<?= $product[0]["id"] ?>" method="POST">
            <button type="submit" class="btn p-0 border-0" style="background: none;">
              <i class="ion-ios-heart-empty heart-icon" style="font-size: 20px; cursor: pointer; color: red;"></i>
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
        <p>Far far away, behind the word mountains, far from the countries Vokalia and Consonantia</p>
      </div>
    </div>
  </div>
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="#" class="img-prod"><img class="img-fluid" src="./public/user/assets/images/product-1.jpg" alt="Colorlib Template">
            <span class="status">30%</span>
            <div class="overlay"></div>
          </a>
          <div class="text py-3 pb-4 px-3 text-center">
            <h3><a href="#">Bell Pepper</a></h3>
            <div class="d-flex">
              <div class="pricing">
                <p class="price"><span class="mr-2 price-dc">$120.00</span><span class="price-sale">$80.00</span></p>
              </div>
            </div>
            <div class="bottom-area d-flex px-3">
              <div class="m-auto d-flex">
                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                  <span><i class="ion-ios-menu"></i></span>
                </a>
                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                  <span><i class="ion-ios-cart"></i></span>
                </a>
                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                  <span><i class="ion-ios-heart"></i></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="#" class="img-prod"><img class="img-fluid" src="./public/user/assets/images/product-2.jpg" alt="Colorlib Template">
            <div class="overlay"></div>
          </a>
          <div class="text py-3 pb-4 px-3 text-center">
            <h3><a href="#">Strawberry</a></h3>
            <div class="d-flex">
              <div class="pricing">
                <p class="price"><span>$120.00</span></p>
              </div>
            </div>
            <div class="bottom-area d-flex px-3">
              <div class="m-auto d-flex">
                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                  <span><i class="ion-ios-menu"></i></span>
                </a>
                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                  <span><i class="ion-ios-cart"></i></span>
                </a>
                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                  <span><i class="ion-ios-heart"></i></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="#" class="img-prod"><img class="img-fluid" src="./public/user/assets/images/product-3.jpg" alt="Colorlib Template">
            <div class="overlay"></div>
          </a>
          <div class="text py-3 pb-4 px-3 text-center">
            <h3><a href="#">Green Beans</a></h3>
            <div class="d-flex">
              <div class="pricing">
                <p class="price"><span>$120.00</span></p>
              </div>
            </div>
            <div class="bottom-area d-flex px-3">
              <div class="m-auto d-flex">
                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                  <span><i class="ion-ios-menu"></i></span>
                </a>
                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                  <span><i class="ion-ios-cart"></i></span>
                </a>
                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                  <span><i class="ion-ios-heart"></i></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 col-lg-3 ftco-animate">
        <div class="product">
          <a href="#" class="img-prod"><img class="img-fluid" src="./public/user/assets/images/product-4.jpg" alt="Colorlib Template">
            <div class="overlay"></div>
          </a>
          <div class="text py-3 pb-4 px-3 text-center">
            <h3><a href="#">Purple Cabbage</a></h3>
            <div class="d-flex">
              <div class="pricing">
                <p class="price"><span>$120.00</span></p>
              </div>
            </div>
            <div class="bottom-area d-flex px-3">
              <div class="m-auto d-flex">
                <a href="#" class="add-to-cart d-flex justify-content-center align-items-center text-center">
                  <span><i class="ion-ios-menu"></i></span>
                </a>
                <a href="#" class="buy-now d-flex justify-content-center align-items-center mx-1">
                  <span><i class="ion-ios-cart"></i></span>
                </a>
                <a href="#" class="heart d-flex justify-content-center align-items-center ">
                  <span><i class="ion-ios-heart"></i></span>
                </a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
  <div class="container py-4">
    <div class="row d-flex justify-content-center py-5">
      <div class="col-md-6">
        <h2 style="font-size: 22px;" class="mb-0">Subcribe to our Newsletter</h2>
        <span>Get e-mail updates about our latest shops and special offers</span>
      </div>
      <div class="col-md-6 d-flex align-items-center">
        <form action="#" class="subscribe-form">
          <div class="form-group d-flex">
            <input type="text" class="form-control" placeholder="Enter email address">
            <input type="submit" value="Subscribe" class="submit px-3">
          </div>
        </form>
      </div>
    </div>
  </div>
</section>






<?php
$content = ob_get_clean();
include './views/pages/user/layout.php';
?>