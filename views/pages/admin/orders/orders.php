<?php
	$title = 'Orders';
	// $orders = 'pinding';
	ob_start();
?>


  <div class="pagetitle">
    <h1>All Orders</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item">Dashboard</li>
        <li class="breadcrumb-item active">Orders</li>
      </ol>
    </nav>
  </div>





  <div class="card">
    <div class="card-body">
        <div class="row card-title px-2">
          <div class="col col-sm-6 col-lg-10">
            <h5>Orders</h5>
          </div>
          <!-- <div class="col col-sm-6 col-lg-2 d-flex flex-row-reverse">
            <div>
              <a href="/admin/admins/create" class="btn btn-primary">Add New Admin</a>
            </div>
          </div> -->
        </div>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Order ID</th>
              <th scope="col">Status</th>
              <th scope="col">total Amount</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
          <?php foreach ($all_orders as $index => $order): ?>

            <tr>
            <th scope="row"><?= $index + 1 ?></th>
                    <td><?= $order['id']?></td>
                    <td>

                    <?php if ($order['status'] === 'completed'): ?>
    <span class="badge text-bg-success"><?= $order['status'] ?></span>
<?php elseif ($order['status'] === 'rejected'): ?>
    <span class="badge text-bg-danger"><?= $order['status'] ?></span>
<?php elseif ($order['status'] === 'pending'): ?>
    <span class="badge text-bg-warning"><?= $order['status'] ?></span>
<?php else: ?>
    <span class="badge text-bg-secondary"><?= $order['status'] ?></span>
<?php endif; ?>
 

             </td>


                    <td><?= $order['total_amount'] ?></td>
                    <td><a href="./orders/show?id=<?= $order['id'] ?>" class="btn btn-primary">Show</a></td>
                    </tr>
            <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>








<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>