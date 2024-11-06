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
        <?= $counter = 1 ?>
        <?php foreach ($all_categories as $Category): ?>
          <tr>
            <th scope="row"><?php echo $counter;
                            $counter++ ?></th>
            <td><img src="<?php echo ltrim($Category["image_path"], ".") . $Category["image"] ?>" width="130px" height="100px"></td>
            <td><?php echo $Category["name"] ?></td>
            <td><?php echo $Category["product_count"] ?></td>
            <form action="/admin/categories/delete?id=<?= $Category["id"] ?>" method="POST">
              <td>

                <div class="mx-2">
                  <a href="/admin/categories/update?id=<?php echo $Category["id"]; ?>" class="btn btn-success">Update</a>
                  <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#exampleModal<?php echo $Category["id"] ?>">
                    Delete
                  </button>
                  <div class="modal fade" id="exampleModal<?php echo $Category["id"] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h1 class="modal-title fs-5" id="exampleModalLabel">Confirm delete</h1>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                          Are you sure you Want to delete this Category : <b><?= $Category["name"] ?></b>
                        </div>
                        <div class="modal-footer">
                          <form action="/admin/categories/delete?id=<?= $Category["id"] ?>" method="POST">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-danger">Delete</button>
                          </form>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
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
unset($_SESSION["success_message"]);
require "./views/pages/admin/layout.php";
?>