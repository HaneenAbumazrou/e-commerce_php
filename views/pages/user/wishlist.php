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
                        <form action="/user/wishlist/delete?product=<?= $item['wishlist_id'] ?>" method="POST">
                            <input type="submit" value="Remove"
                            class="btn btn-outline-danger btn-sm rounded-pill px-3 py-2 fw-bold shadow-sm">
                        </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php endif; ?>
        </tbody>
    </table>
</div>

</section>



<?php
$content = ob_get_clean();
include './views/pages/user/layout.php'; 
?>
