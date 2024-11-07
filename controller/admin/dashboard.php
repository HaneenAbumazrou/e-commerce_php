<?php
if(!isset($_SESSION["admin"])) {
    header("Location: /admin/login");
    die;
  }
require "./controller/admin/DashboardController/DashboardController.php";


$dashboardController = new DashboardController();









// Default filters
$salesFilter = $_GET['sales_filter'] ?? 'today';
$revenueFilter = $_GET['revenue_filter'] ?? 'today';
$customersFilter = $_GET['customers_filter'] ?? 'today';
$recentSalesFilter = $_GET['recent_sales_filter'] ?? 'today';
$topSellingFilter = $_GET['top_selling_filter'] ?? 'today';



function calculatePercentageChange($current, $previous) {
    if ($current == 0) {
        return 0;
    }
    if ($previous == 0) {
        return $current > 0 ? 100 : 0;
    }
    return round((($current - $previous) / $previous) * 100, 2);
}

function getData($filter, $dashboardController, $type) {
    $data = ['current' => 0, 'previous' => 0];

    switch ($filter) {
        case 'today':
            if ($type === 'sales') {
                $currentQuery = "SELECT COUNT(*) AS count FROM orders WHERE DATE(created_at) = CURDATE() AND status = 'completed'";
                $previousQuery = "SELECT COUNT(*) AS count FROM orders WHERE DATE(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND status = 'completed'";
            } elseif ($type === 'revenue') {
                $currentQuery = "SELECT SUM(total_amount) AS revenue FROM orders WHERE DATE(created_at) = CURDATE() AND status = 'completed'";
                $previousQuery = "SELECT SUM(total_amount) AS revenue FROM orders WHERE DATE(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY) AND status = 'completed'";
            } elseif ($type === 'customers') {
                $currentQuery = "SELECT COUNT(*) AS count FROM users WHERE DATE(created_at) = CURDATE()";
                $previousQuery = "SELECT COUNT(*) AS count FROM users WHERE DATE(created_at) = DATE_SUB(CURDATE(), INTERVAL 1 DAY)";
            }
            break;

        case 'month':
            if ($type === 'sales') {
                $currentQuery = "SELECT COUNT(*) AS count FROM orders WHERE MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE()) AND status = 'completed'";
                $previousQuery = "SELECT COUNT(*) AS count FROM orders WHERE MONTH(created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH) AND YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH) AND status = 'completed'";
            } elseif ($type === 'revenue') {
                $currentQuery = "SELECT SUM(total_amount) AS revenue FROM orders WHERE MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE()) AND status = 'completed'";
                $previousQuery = "SELECT SUM(total_amount) AS revenue FROM orders WHERE MONTH(created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH) AND YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH) AND status = 'completed'";
            } elseif ($type === 'customers') {
                $currentQuery = "SELECT COUNT(*) AS count FROM users WHERE MONTH(created_at) = MONTH(CURDATE()) AND YEAR(created_at) = YEAR(CURDATE())";
                $previousQuery = "SELECT COUNT(*) AS count FROM users WHERE MONTH(created_at) = MONTH(CURDATE() - INTERVAL 1 MONTH) AND YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 MONTH)";
            }
            break;

        case 'year':
            if ($type === 'sales') {
                $currentQuery = "SELECT COUNT(*) AS count FROM orders WHERE YEAR(created_at) = YEAR(CURDATE()) AND status = 'completed'";
                $previousQuery = "SELECT COUNT(*) AS count FROM orders WHERE YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 YEAR) AND status = 'completed'";
            } elseif ($type === 'revenue') {
                $currentQuery = "SELECT SUM(total_amount) AS revenue FROM orders WHERE YEAR(created_at) = YEAR(CURDATE()) AND status = 'completed'";
                $previousQuery = "SELECT SUM(total_amount) AS revenue FROM orders WHERE YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 YEAR) AND status = 'completed'";
            } elseif ($type === 'customers') {
                $currentQuery = "SELECT COUNT(*) AS count FROM users WHERE YEAR(created_at) = YEAR(CURDATE())";
                $previousQuery = "SELECT COUNT(*) AS count FROM users WHERE YEAR(created_at) = YEAR(CURDATE() - INTERVAL 1 YEAR)";
            }
            break;

        default:
            return $data; 
    }

    $currentResult = $dashboardController->where($currentQuery);
    $previousResult = $dashboardController->where($previousQuery);

    $data['current'] = $currentResult[0][$type === 'sales' || $type === 'customers' ? 'count' : 'revenue'] ?? 0;
    $data['previous'] = $previousResult[0][$type === 'sales' || $type === 'customers' ? 'count' : 'revenue'] ?? 0;

    return $data;
}

// Fetch data for Sales, Revenue, and Customers
$salesData = getData($salesFilter, $dashboardController, 'sales');
$revenueData = getData($revenueFilter, $dashboardController, 'revenue');
$customersData = getData($customersFilter, $dashboardController, 'customers');

// Calculate percentage changes
$salesPercentageChange = calculatePercentageChange($salesData['current'], $salesData['previous']);
$revenuePercentageChange = calculatePercentageChange($revenueData['current'], $revenueData['previous']);
$customersPercentageChange = calculatePercentageChange($customersData['current'], $customersData['previous']);



// Function to get recent sales data
function getRecentSales($filter, $dashboardController) {
    switch ($filter) {
        case 'today':
            $dateCondition = "DATE(o.created_at) = CURDATE()";
            break;
        case 'month':
            $dateCondition = "MONTH(o.created_at) = MONTH(CURDATE()) AND YEAR(o.created_at) = YEAR(CURDATE())";
            break;
        case 'year':
            $dateCondition = "YEAR(o.created_at) = YEAR(CURDATE())";
            break;
        default:
            return [];
    }

    $query = "SELECT o.id AS order_id, u.username AS customer, p.name AS product, oi.price AS price, o.status 
              FROM orders o
              JOIN order_items oi ON o.id = oi.order_id
              JOIN products p ON oi.product_id = p.id
              JOIN users u ON o.user_id = u.id
              WHERE $dateCondition";

    return $dashboardController->where($query);
}

function getTopSellingData($filter, $dashboardController) {
    switch ($filter) {
        case 'today':
            $query = "
            SELECT products.name AS name, products.price AS price, 
                   SUM(order_items.quantity) AS sold_quantity, 
                   SUM(order_items.price * order_items.quantity) AS revenue
            FROM orders
            JOIN order_items ON orders.id = order_items.order_id
            JOIN products ON order_items.product_id = products.id
            WHERE DATE(orders.created_at) = CURDATE()
            AND orders.status = 'completed'
            GROUP BY products.name, products.price
            ORDER BY revenue DESC
            LIMIT 5";
            break;
        case 'month':
            $query = "
                SELECT products.name AS name, products.price AS price, 
                       SUM(order_items.quantity) AS sold_quantity, 
                       SUM(order_items.price * order_items.quantity) AS revenue
                FROM orders
                JOIN order_items ON orders.id = order_items.order_id
                JOIN products ON order_items.product_id = products.id
                WHERE MONTH(orders.created_at) = MONTH(CURDATE())
                AND YEAR(orders.created_at) = YEAR(CURDATE())
                AND orders.status = 'completed'
                GROUP BY products.name, products.price
                ORDER BY revenue DESC
                LIMIT 5";
            break;
        case 'year':
            $query = "
                SELECT products.name AS name, products.price AS price, 
                       SUM(order_items.quantity) AS sold_quantity, 
                       SUM(order_items.price * order_items.quantity) AS revenue
                FROM orders
                JOIN order_items ON orders.id = order_items.order_id
                JOIN products ON order_items.product_id = products.id
                WHERE YEAR(orders.created_at) = YEAR(CURDATE())
                AND orders.status = 'completed'
                GROUP BY products.name, products.price
                ORDER BY revenue DESC
                LIMIT 5";
            break;
        default:
            return []; // Return empty if no valid filter is provided
    }

    // Execute query
    $result = $dashboardController->where($query);

    // if ($result === false) {
    //     echo "Error executing query: " . $dashboardController->error();
    //     return [];
    // } else if (empty($result)) {
    //     echo "Query executed successfully, but no results were found.";
    // }

    return is_array($result) ? $result : [];

}




// Fetch recent sales data
$recentSalesData = getRecentSales($recentSalesFilter, $dashboardController);
$topSellingData = getTopSellingData($topSellingFilter, $dashboardController);



$top_coupons = (new Order())->where("SELECT 
    c.id AS coupon_id,
    c.code AS coupon_code,
    a.username AS admin_username,
    COUNT(o.id) AS usage_count
FROM 
    coupons c
JOIN 
    orders o ON o.coupon_id = c.id
JOIN 
    admins a ON c.admin_id = a.id
GROUP BY 
    c.code, a.username
ORDER BY 
    usage_count DESC
LIMIT 5;
");

// dd($top_coupons);


require "./views/pages/admin/index.php";