<?php 
$title = 'Wishlist'; 
ob_start(); 

?>

<div class="hero-wrap hero-bread" style="background-image: url('/public/user/assets/images/wishlist.jpg');">
    <div class="container">
        <div class="row no-gutters slider-text align-items-center justify-content-center">
            <div class="col-md-9 ftco-animate text-center">
                <p class="breadcrumbs"><span class="mr-2"><a href="/">Home</a></span> <span>Wishlist</span></p>
                <h1 class="mb-0 bread">My Wishlist</h1>
            </div>
        </div>
    </div>
</div>

<section class="ftco-section ftco-cart">


<div class="container mt-5">
    <table class="table">
        <thead class="table-dark">
            <tr>
                <th>&nbsp;</th>
                <th>Product Name</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Total</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php if (empty($wishlists)) : ?>
                <tr>
                    <td colspan="6" class="text-center">Your wishlist is empty.</td>
                </tr>
            <?php else : ?>
							<?php foreach ($wishlists as $item) : ?>
								<?php //dd($item) ?>
                    <tr>
                        <td><img src="<?= ltrim($item['first_image'], ".") ?>" width="50"></td>
                        <td>
                            <a href="/product?product_id=<?= $item['id'] ?>">
                                <?= htmlspecialchars($item['name']) ?>
                            </a>
                        </td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td>1</td>
                        <td>$<?= number_format($item['price'], 2) ?></td>
                        <td>
                          <form action="/user/wishlist/delete?product=<?= $item['wishlist_id'] ?>" method="POST" id="removeForm<?= $item['wishlist_id'] ?>">
                           <button type="button" class="btn btn-outline-danger btn-sm rounded-pill px-3 py-2 fw-bold shadow-sm" 
                            onclick="confirmRemove(<?= $item['wishlist_id'] ?>)">Remove
                           </button>
                          </form>
                        </td>

<script>
function confirmRemove(wishlistId) {
    // SweetAlert2 Confirmation Dialog
    Swal.fire({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        confirmButtonText: 'Yes, remove it!'
    }).then((result) => {
        if (result.isConfirmed) {
            // Submit the form if confirmed
            document.getElementById('removeForm' + wishlistId).submit();
        }
    });
}
</script>

                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</section>

<section class="ftco-section ftco-no-pt ftco-no-pb py-5 bg-light">
    <div class="container py-4">
        <div class="row d-flex justify-content-center py-5">
            <div class="col-md-6">
                <h2 style="font-size: 22px;" class="mb-0">Subscribe to our Newsletter</h2>
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
