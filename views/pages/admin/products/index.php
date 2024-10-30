<?php
$title = 'All Products';
$products = 'active';
ob_start();
?>

<div class="pagetitle">
  <h1>Products</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Dashboard</li>
      <li class="breadcrumb-item active">Products</li>
    </ol>
  </nav>
</div>

<?php if (isset($_SESSION["success_message"])) : ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION["success_message"] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="card recent-sales overflow-auto">
  <div class="card-body">
    <div class="row card-title px-2">
      <div class="col col-sm-6 col-lg-10">
        <h5>All Products</h5>
      </div>
      <div class="col col-sm-6 col-lg-2 d-flex flex-row-reverse">
        <div>
          <a href="/admin/products/create" class="btn btn-primary">Add New Product</a>
        </div>
      </div>
    </div>
    <div class="accordion" id="productsAccordion">
      <?php foreach ($all_categories as $category): ?>
        <div class="accordion-item">
          <h2 class="accordion-header">
            <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#category-<?php echo $category["id"]; ?>" aria-expanded="true" aria-controls="category-<?php echo $category["id"]; ?>">
              <?php echo htmlspecialchars($category["name"]); ?>
            </button>
          </h2>
          <div id="category-<?php echo $category["id"]; ?>" class="accordion-collapse collapse show">
            <div class="accordion-body">
              <table class="table table-borderless table-striped">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Product Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Quantity</th>
                    <th scope="col">Price</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (!empty($all_products)): ?>
                    <?php $count = 1; ?>
                    <?php foreach ($all_products as $product): ?>
                      <?php if ($category["id"] == $product["category_id"]): ?>
                        <tr>
                          <th scope="row"><?= $count++ ?></th>
                          <td><?php echo htmlspecialchars($product["name"]); ?></td>
                          <td class="text-truncate pe-3" style="max-width: 260px;"><?php echo htmlspecialchars($product["description"]); ?></td>
                          <td><?php echo $product["stock_quantity"]; ?></td>
                          <td><?php echo $product["price"]; ?>$</td>
                          <td>
                            <span class="badge <?php echo $product["stock_quantity"] > 0 ? 'bg-success' : 'bg-danger'; ?>">
                              <?php echo $product["stock_quantity"] > 0 ? 'In Stock' : 'Out of Stock'; ?>
                            </span>
                          </td>
                          <td>
                            <a href="/admin/products/show?id=<?php echo $product["id"]; ?>" class="btn btn-primary">Show</a>
                            <a href="./update.php?id=<?php echo $product["id"]; ?>" class="btn btn-success">Update</a>
                          </td>
                        </tr>
                      <?php endif; ?>
                    <?php endforeach; ?>
                  <?php else: ?>
                    <tr>
                      <td colspan="7" class="text-center">No products found in this category.</td>
                    </tr>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php
$content = ob_get_clean();
require "./views/pages/admin/layout.php";
?>