<?php
	$title = 'All Categories';
	$category = 'active';
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



  <div class="card">
    <div class="card-body">
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
            <tr>
              <th scope="row">1</th>
              <td><img src="https://i.ytimg.com/vi/GDlkCkcIqTs/hq720.jpg?sqp=-oaymwEhCK4FEIIDSFryq4qpAxMIARUAAAAAGAElAADIQj0AgKJD&rs=AOn4CLAFpFHzEKCTxBA2MNIb3OCcht5L7A" alt="#" width="100px"></td>
              <td>IPhone</td>
              <td>67</td>
              <td>
                <a href="./show.php" class="btn btn-primary">Show</a>
                <a href="./update.php" class="btn btn-success">update</a>
              </td>
            </tr>
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