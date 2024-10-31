<?php
$title = 'Show Product';
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
<?php //dd($images)
?>
<div class="row">
  <div class="col col-sm-12 col-lg-5">
    <div class="row">
      <?php  //dd($image)
      $counter = 0;
      ?>
      <?php foreach ($images as $image): ?>
        <?php if ($product['id'] == $image['products_id']): ?>
          <div class="<?= $counter === 0 ? 'col-12' : 'col-sm-12 col-lg-4' ?>">
            <?php $counter++; ?>
            <img src="<?php echo ltrim($image['path'], '.') ?>" class="img-fluid h-100 w-100 ">
          </div>
        <?php
        endif; ?>
      <?php endforeach; ?>

      <!-- Display empty placeholders if there are fewer than 4 images -->
      <?php for ($i = count($images); $i < 4; $i++): ?>
        <div class="<?= $i === 0 ? 'col-12' : 'col-sm-12 col-lg-4' ?>">
          <img src="/public/admin/assets/images/default/download.png" class="img-fluid w-100">
        </div>
      <?php endfor; ?>
    </div>
  </div>

  <div class="col col-sm-12 col-lg-6 p-5">
    <h2><?= htmlspecialchars($product["name"]) ?></h2>
    <!-- <div class="rating d-flex">
      <p class="text-left mr-4">
        <span class="fw-bold"></span> Ratings
      </p>
    </div> -->
    <p class="text-left">
      <span class="fw-bold"></span><b>Qty :</b> <?= $product["stock_quantity"] ?>
    </p>
    <!-- <p class="text-left">
      <span class="fw-bold"></span> <b>Sold</b>
    </p> -->

    <p class="price">
      <span class="fw-bold">$<?= htmlspecialchars(number_format($product["price"], 2)) ?></span>
    </p>
    <p>
      <?= htmlspecialchars($product["description"]) ?>
    </p>

    <div class="row pt-3">
      <div class="col-lg-4">
        <a href="/admin/products/update?id=<?php echo $product["id"]; ?>" class="btn btn-success">Update</a>
        <a href="/admin/products/delete?id=<?php echo $product["id"]; ?>" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this product?')">Delete</a>
      </div>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require "./views/pages/admin/layout.php";
?>