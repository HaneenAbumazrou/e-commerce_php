<?php
	$title = 'All Products';
	$products = 'active';
	ob_start();
?>


  <div class="row">
    <div class="col-12 p-1 my-1">

      <div class="col-12">
        <div class="row g-3">
          <div class="col-sm-3">
            <form action="" method="post">
              <div class="input-group mb-3 border border-1 border-secondary rounded">
                <button type="submit" class="btn input-group-text"
                style="background-color: #CFE2FF;">
                  Search <i class="bi bi-search ps-2"></i>
                </button>
                <input type="text" class="form-control">
              </div>
            </form>

          </div>
        </div>
      </div>

      <div class="card recent-sales overflow-auto">
        <div class="card-body">
          <div class="row card-title px-2">
            <div class="col col-sm-6 col-lg-10">
              <h5>All Products</h5>
            </div>
            <div class="col col-sm-6 col-lg-2 d-flex flex-row-reverse">
              <div>
                <a href="./create.php" class="btn btn-primary">Add New Product</a>
              </div>
            </div>
          </div>

          <div class="accordion" id="products">
            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#category-1" aria-expanded="true" aria-controls="category-1">
                  First Category
                </button>
              </h2>
              <div id="category-1" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  <table class="table table-borderless table-striped datatabl">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Qtn</th>
                        <th scope="col">Price</th>
                        <th scope="col">status</th>
                        <th scope="col" colspan="2">Action</th>
                      </tr>
                    </thead>
        
                    <tbody>
                      <tr>
                        <th scope="row"><a href="/admin/products/show">#0001</a></th>
                        <td>IPhone 77 Pro Max</td>
                        <td class="text-truncate pe-3" style="max-width: 260px;">
                          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis, ab voluptatem nemo atque sapiente placeat. Quas optio nihil adipisci deserunt atque vitae non. Magni ipsam deserunt odit corporis blanditiis dolorem dolores distinctio possimus unde! Voluptas soluta accusantium veritatis unde commodi distinctio, suscipit consectetur exercitationem. Illum libero recusandae quo cumque facilis iste commodi excepturi, tenetur inventore ab quisquam nulla distinctio. Dolore esse dignissimos libero reprehenderit delectus voluptatum explicabo ratione officia, quibusdam atque molestias nam consectetur natus reiciendis neque fugit cumque excepturi inventore itaque. Nihil eum commodi sed fugiat aspernatur sit ut aut eligendi quod inventore numquam, corrupti, deleniti exercitationem amet ratione.
                        </td>
                        <td>$64</td>
                        <td>99$</td>
                        <td><span class="badge bg-success">in the stock</span></td>
                        <td>
                          <a href="/admin/products/show" class="btn btn-primary">Show</a>
                          <a href="/admin/products/edit" class="btn btn-success">Update</a>
                        </td>
                      </tr>
                      <tr>
                        <th scope="row"><a href="/admin/products/show">#0002</a></th>
                        <td>IPhone 79 Pro Max</td>
                        <td class="text-truncate pe-3" style="max-width: 260px;">
                          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis, ab voluptatem nemo atque sapiente placeat. Quas optio nihil adipisci deserunt atque vitae non. Magni ipsam deserunt odit corporis blanditiis dolorem dolores distinctio possimus unde! Voluptas soluta accusantium veritatis unde commodi distinctio, suscipit consectetur exercitationem. Illum libero recusandae quo cumque facilis iste commodi excepturi, tenetur inventore ab quisquam nulla distinctio. Dolore esse dignissimos libero reprehenderit delectus voluptatum explicabo ratione officia, quibusdam atque molestias nam consectetur natus reiciendis neque fugit cumque excepturi inventore itaque. Nihil eum commodi sed fugiat aspernatur sit ut aut eligendi quod inventore numquam, corrupti, deleniti exercitationem amet ratione.
                        </td>
                        <td>$64</td>
                        <td>99$</td>
                        <td><span class="badge bg-danger">out of the stock</span></td>
                        <td>
                          <a href="/admin/products/show" class="btn btn-primary">Show</a>
                          <a href="/admin/products/edit" class="btn btn-success">Update</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

            <div class="accordion-item">
              <h2 class="accordion-header">
                <button class="accordion-button fw-bold" type="button" data-bs-toggle="collapse" data-bs-target="#category-2" aria-expanded="true" aria-controls="category-2">
                  Second Category
                </button>
              </h2>
              <div id="category-2" class="accordion-collapse collapse show">
                <div class="accordion-body">
                  <table class="table table-borderless table-striped datatabl">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">Product Name</th>
                        <th scope="col">Description</th>
                        <th scope="col">Qtn</th>
                        <th scope="col">Price</th>
                        <th scope="col">status</th>
                        <th scope="col" colspan="2">Action</th>
                      </tr>
                    </thead>
        
                    <tbody>
                      <tr>
                        <th scope="row"><a href="/admin/products/show">#0001</a></th>
                        <td>IPhone 77 Pro Max</td>
                        <td class="text-truncate pe-3" style="max-width: 260px;">
                          Lorem ipsum dolor sit amet consectetur, adipisicing elit. Reiciendis, ab voluptatem nemo atque sapiente placeat. Quas optio nihil adipisci deserunt atque vitae non. Magni ipsam deserunt odit corporis blanditiis dolorem dolores distinctio possimus unde! Voluptas soluta accusantium veritatis unde commodi distinctio, suscipit consectetur exercitationem. Illum libero recusandae quo cumque facilis iste commodi excepturi, tenetur inventore ab quisquam nulla distinctio. Dolore esse dignissimos libero reprehenderit delectus voluptatum explicabo ratione officia, quibusdam atque molestias nam consectetur natus reiciendis neque fugit cumque excepturi inventore itaque. Nihil eum commodi sed fugiat aspernatur sit ut aut eligendi quod inventore numquam, corrupti, deleniti exercitationem amet ratione.
                        </td>
                        <td>$64</td>
                        <td>99$</td>
                        <td><span class="badge bg-success">in the stock</span></td>
                        <td>
                          <a href="/admin/products/show" class="btn btn-primary">Show</a>
                          <a href="/admin/products/edit" class="btn btn-success">Update</a>
                        </td>
                      </tr>
                    </tbody>
                  </table>
                </div>
              </div>
            </div>

          </div>

        </div>


      </div>

    </div>
  </div>


<?php
  $content = ob_get_clean();
  require "./views/pages/admin/layout.php";
?>