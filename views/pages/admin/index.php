<?php
$title = 'Dashboard';
$dashboard = 'active';
ob_start();
?>


<div class="pagetitle">
    <h1>Dashboard</h1>
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active">Dashboard</li>
        </ol>
    </nav>
</div>

<section class="section dashboard">
    <div class="row">

        <!-- Left side columns -->
        <!-- Sales Card -->
        <div class="col-md-12 col-lg-8">
            <div class="row">

                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card sales-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="?sales_filter=today">Today</a></li>
                                <li><a class="dropdown-item" href="?sales_filter=month">This Month</a></li>
                                <li><a class="dropdown-item" href="?sales_filter=year">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Sales <span>| <?php echo ucfirst($salesFilter); ?></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-cart"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo $salesData['current']; ?></h6>

                                    <span class="<?php echo $salesPercentageChange < 0 ? 'text-danger' : 'text-success'; ?> small pt-1 fw-bold">
                                        <?php echo abs($salesPercentageChange); ?>%
                                    </span>
                                    <span class="text-muted small pt-2 ps-1"><?php echo $salesPercentageChange < 0 ? 'decrease' : 'increase'; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Sales Card -->

                <!-- Revenue Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card revenue-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="?revenue_filter=today">Today</a></li>
                                <li><a class="dropdown-item" href="?revenue_filter=month">This Month</a></li>
                                <li><a class="dropdown-item" href="?revenue_filter=year">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Revenue <span>| <?php echo ucfirst($revenueFilter); ?></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-currency-dollar"></i>
                                </div>
                                <div class="ps-3">
                                    <h6>$<?php echo number_format($revenueData['current'], 2); ?></h6>
                                    <span class="<?php echo $revenuePercentageChange < 0 ? 'text-danger' : 'text-success'; ?> small pt-1 fw-bold">
                                        <?php echo abs($revenuePercentageChange); ?>%
                                    </span>
                                    <span class="text-muted small pt-2 ps-1"><?php echo $revenuePercentageChange < 0 ? 'decrease' : 'increase'; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Revenue Card -->

                <!-- Customers Card -->
                <div class="col-xxl-4 col-md-6">
                    <div class="card info-card customers-card">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="?customers_filter=today">Today</a></li>
                                <li><a class="dropdown-item" href="?customers_filter=month">This Month</a></li>
                                <li><a class="dropdown-item" href="?customers_filter=year">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Customers <span>| <?php echo ucfirst($customersFilter); ?></span></h5>
                            <div class="d-flex align-items-center">
                                <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                                    <i class="bi bi-people"></i>
                                </div>
                                <div class="ps-3">
                                    <h6><?php echo $customersData['current']; ?></h6>
                                    <span class="<?php echo $customersPercentageChange < 0 ? 'text-danger' : 'text-success'; ?> small pt-1 fw-bold">
                                        <?php echo abs($customersPercentageChange); ?>%
                                    </span>
                                    <span class="text-muted small pt-2 ps-1"><?php echo $customersPercentageChange < 0 ? 'decrease' : 'increase'; ?></span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div><!-- End Customers Card -->
                <!-- Recent Sales -->
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="?recent_sales_filter=today">Today</a></li>
                                <li><a class="dropdown-item" href="?recent_sales_filter=month">This Month</a></li>
                                <li><a class="dropdown-item" href="?recent_sales_filter=year">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body">
                            <h5 class="card-title">Recent Sales <span>| <?php echo ucfirst($recentSalesFilter); ?></span></h5>
                            <table class="table table-borderless datatable">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Customer</th>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($recentSalesData as $sale): ?>
                                        <tr>
                                            <th scope="row"><a href="#">#<?php echo $sale['order_id']; ?></a></th>
                                            <td><?php echo htmlspecialchars($sale['customer']); ?></td>
                                            <td><a href="#" class="text-primary"><?php echo htmlspecialchars($sale['product']); ?></a></td>
                                            <td>$<?php echo number_format($sale['price'], 2); ?></td>
                                            <td>
                                                <span class="badge 
                                    <?php echo $sale['status'] === 'completed' ? 'bg-success' : ($sale['status'] === 'Pending' ? 'bg-warning' : 'bg-danger'); ?>">
                                                    <?php echo ucfirst($sale['status']); ?>
                                                </span>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- End Recent Sales -->


                <!-- Top Selling -->
                <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="filter">
                            <a class="icon" href="#" data-bs-toggle="dropdown"><i class="bi bi-three-dots"></i></a>
                            <ul class="dropdown-menu dropdown-menu-end dropdown-menu-arrow">
                                <li class="dropdown-header text-start">
                                    <h6>Filter</h6>
                                </li>
                                <li><a class="dropdown-item" href="?top_selling_filter=today">Today</a></li>
                                <li><a class="dropdown-item" href="?top_selling_filter=month">This Month</a></li>
                                <li><a class="dropdown-item" href="?top_selling_filter=year">This Year</a></li>
                            </ul>
                        </div>

                        <div class="card-body pb-0">
                            <h5 class="card-title">Top Selling <span>| <?php echo ucfirst($topSellingFilter); ?></span></h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">Product</th>
                                        <th scope="col">Price</th>
                                        <th scope="col">Sold</th>
                                        <th scope="col">Revenue</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (!empty($topSellingData) && is_array($topSellingData)): ?>
                                        <?php foreach ($topSellingData as $item): ?>
                                            <tr>
                                                <td><a href="#" class="text-primary fw-bold"><?php echo htmlspecialchars($item['name']); ?></a></td>
                                                <td>$<?php echo number_format($item['price'], 2); ?></td>
                                                <td class="fw-bold"><?php echo $item['sold_quantity']; ?></td>
                                                <td>$<?php echo number_format($item['revenue'], 2); ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else: ?>
                                        <tr>
                                            <td colspan="4">No top-selling products found for the selected period.</td>
                                        </tr>
                                    <?php endif; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- End Top Selling -->


            </div>
        </div><!-- End Left side columns -->


        <div class="col-md-12 col-lg-4">
        <div class="col-12">
                    <div class="card top-selling overflow-auto">

                        <div class="card-body pb-0">
                            <h5 class="card-title">Most Used Coupons</h5>

                            <table class="table table-borderless">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Coupon</th>
                                        <th scope="col">No. of usage</th>
                                        <th scope="col">updated by</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $count = 0; ?>
                                    <?php foreach($top_coupons as $coupon) :?>
                                        <tr>
                                            <?php //dd($coupon) ?>
                                            <td><a href="/admin/coupons/update?coupon_id=<?=  $coupon['coupon_id'] ?>">#<?= ++$count ?></a></td>
                                            <td><?= $coupon['coupon_code'] ?></td>
                                            <td><?= $coupon['usage_count'] ?></td>
                                            <td><?= $coupon['admin_username'] ?></td>
                                        </tr>
                                    <?php endforeach ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>




<?php
$content = ob_get_clean();
require './views/pages/admin/layout.php';
?>