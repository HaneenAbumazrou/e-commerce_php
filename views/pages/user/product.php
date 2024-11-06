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

      <div class="col-lg-6 product-details pl-md-5 ftco-animate justify-content-center">
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



        <div style="margin-left: -375px;">
    <div class="d-flex flex-column align-items-center">
        <!-- Quantity Input -->
        <form action="/user/cart/create?product=<?= $product[0]["id"] ?>" method="post" id="cart">
            <div class="d-flex mb-3" style="max-width: 120px;">
                <!-- Minus button -->
                <button type="button" onclick="decrementQuantity()">-</button>

                <!-- Quantity input -->
                <input type="number" id="quantity" name="quantity" value="1" min="1" max="100" style="width: 60px; text-align: center;" />

                <!-- Plus button -->
                <button type="button" onclick="incrementQuantity()">+</button>
            </div>
        </form>
    </div>
</div>


        
        <!-- Button Group -->
        <div class="d-flex">
            <p class="mb-0 mr-3">
                <a href="#" class="btn btn-black py-3 px-5" onclick="document.getElementById('cart').submit();">Add to Cart</a>
            </p>
            
            <form action="/user/wishlist/create?product=<?= $product[0]["id"] ?>" method="POST" id="wish">
                <p class="mb-0">
                <a href="#" class="btn custom-wishlist-btn text-black py-3 px-4" onclick="document.getElementById('wish').submit();">
    Add to Wishlist <i class="ion-ios-heart-empty heart-icon" style="font-size: 1.0em; color: red;"></i>
</a>

<style>
/* Custom styles for the wishlist button */
.custom-wishlist-btn {
    background-color: white !important; /* Force white background */
    color: black !important; /* Force black text color */
    border: 1px solid #ccc; /* Optional: Add a border */
}

.custom-wishlist-btn:hover,
.custom-wishlist-btn:focus {
    background-color: #f0f0f0 !important; /* Keep white background on hover */
    color: black !important; /* Keep black text on hover */
    text-decoration: none; /* Remove underline */
    border-color: #ccc; /* Keep border color consistent */
}
</style>
                </p>
            </form>
        </div>
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


<script>
    function incrementQuantity() {
        var quantityInput = document.getElementById("quantity");
        var currentValue = parseInt(quantityInput.value);
        if (currentValue < quantityInput.max) {
            quantityInput.value = currentValue + 1;
        }
    }

    function decrementQuantity() {
        var quantityInput = document.getElementById("quantity");
        var currentValue = parseInt(quantityInput.value);
        if (currentValue > quantityInput.min) {
            quantityInput.value = currentValue - 1;
        }
    }
</script>




<?php
$content = ob_get_clean();
include './views/pages/user/layout.php';
?>