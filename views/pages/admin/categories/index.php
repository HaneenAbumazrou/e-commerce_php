<?php
$title = 'All Categories';
$categories = 'active';
ob_start();
?>




<div class="pagetitle">
  <h1>Categories</h1>
  <nav>
    <ol class="breadcrumb">
      <li class="breadcrumb-item">Dashboard</li>
      <li class="breadcrumb-item active">Categories</li>
    </ol>
  </nav>
</div>

<?php if (isset($_SESSION["success_message"])) : ?>
  <div class="alert alert-success alert-dismissible fade show" role="alert">
    <?= $_SESSION["success_message"] ?>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
<?php endif; ?>

<div class="card">
  <div class="card-body pt-4">
    <form action="/admin/categories" method="POST" enctype="multipart/form-data">
      <div class="row g-3 align-items-center">
        <div class="col-auto">
          <label class="col-form-label">Name</label>
        </div>
        <div class="col-auto">
          <input type="text" class="form-control" name="name" value="<?php echo $_POST["name"] ?? null ?>">
        </div>

        <div class="col-auto">
          <label class="col-form-label">Image</label>
        </div>
        <div class="col-auto">
          <input type="file" class="form-control" name="image">
        </div>
    </form>
    <div class="col-auto">
      <input type="submit" class="btn btn-primary">
    </div>
  </div>




  <h5 class="card-title">All Categories</h5>

  <div class="table-responsive">
    <table class="table table-striped">
      <thead>
        <tr>
          <th scope="col">#</th>
          <th scope="col"></th>
          <th scope="col">Name</th>
          <th scope="col">no. products</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($all_categories as $Category): ?>
          <tr>
            <th scope="row"><?php echo $Category["id"] ?></th>
            <td><img src="<?php echo ltrim($Category["image_path"], ".") . $Category["image"] ?>" width="130px" height="100px"></td>
            <td><?php echo $Category["name"] ?></td>
            <td><?php echo $Category["image"] ?></td>
            <form action="/admin/categories/delete?id=<?= $Category["id"] ?>" method="POST">
              <td>
                <a href="/admin/categories/update?id=<?php echo $Category["id"]; ?>" class="btn btn-success">Update</a>
                <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?')">Delete</button>
              </td>
            </form>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>
  <!-- End Table with stripped rows -->

</div>
</div>





<?php
$content = ob_get_clean();
require "./views/pages/admin/layout.php";
?>