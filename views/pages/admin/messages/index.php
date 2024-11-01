<?php
	$title = 'Messages';
	$messages = 'active';
	ob_start();
?>

  <div class="pagetitle">
    <h1>Contact Messages</h1>
    <nav>
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="/admin/dashboard">Dashboard</a></li>
        <li class="breadcrumb-item active">Messages</li>
      </ol>
    </nav>
  </div>


  <div class="card">
    <div class="card-body">
        <div class="row card-title px-2">
          <div class="col col-sm-6 col-lg-10">
            <h5>All Messages</h5>
          </div>
        </div>

      <div class="table-responsive">
        <table class="table table-striped">
          <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Subject</th>
              <th scope="col">Message</th>
              <th scope="col">Name</th>
              <th scope="col">Email</th>
              <th scope="col">Status</th>
              <th scope="col">Sent at</th>
              <th scope="col">Action</th>
            </tr>
          </thead>
          <tbody>
            <?php $count = 0; ?>
            <?php foreach ($all_messages as $message): ?>

              <tr>
                <th scope="row"><?= ++$count ?></th>
                <td><?= $message['subject'] ?></td>
                <td class="text-truncate"><?= $message['message'] ?></td>
                <td><?= $message['name'] ?></td>
                <td><?= $message['email'] ?></td>
                <td>
                  <?php if($message['status']): ?>
                    <span class="text-primary fs-4"><i class="bi bi-check-all"></i></span> Seen
                  <?php else: ?>
                      <span class="text-secondary fs-4"><i class="bi bi-check"></i></span> Unseen
                  <?php endif ?>
                </td>
                <td><?= date("d-m-Y", strtotime($message['created_at'])) ?></td>
                <td><a href="/admin/messages/show?message_id=<?= $message['id'] ?>" class="btn btn-primary">Show</a></td>
              </tr>
              <?php endforeach; ?>
          </tbody>
        </table>
      </div>

    </div>
  </div>


  <!-- <section class="section">
    <div class="card">
      <div class="card-header">Header</div>
      <div class="card-body">
        <h5 class="card-title">Card with header and footer</h5>
        Ut in ea error laudantium quas omnis officia. Sit sed praesentium voluptas. Corrupti inventore consequatur nisi necessitatibus modi consequuntur soluta id. Enim autem est esse natus assumenda. Non sunt dignissimos officiis expedita. Consequatur sint repellendus voluptas.
        Quidem sit est nulla ullam. Suscipit debitis ullam iusto dolorem animi dolorem numquam. Enim fuga ipsum dolor nulla quia ut.
        Rerum dolor voluptatem et deleniti libero totam numquam nobis distinctio. Sit sint aut. Consequatur rerum in.
      </div>
      <div class="card-footer">
        Footer
      </div>
    </div>
  </section> -->




<?php
	$content = ob_get_clean();
	require './views/pages/admin/layout.php';
?>