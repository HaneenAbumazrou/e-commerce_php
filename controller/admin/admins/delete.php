<?php
require "./controller/admin/admins/AdminController.php";
$adminModel = new AdminController();

if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];
    $admin = $adminModel->find($admin_id);

    $status = $admin['status'];

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        if ($status == "active") {
          $adminModel->update(['status' => 'not active'], $admin_id);
          var_dump($admin_id);

          header("Location: /admin/admins/show?id=". $admin_id);
            exit;   
          
        
        }
        else {
          $adminModel->update(['status' => 'active'], $admin_id);
          var_dump($admin_id);

          header("Location: /admin/admins/show?id=". $admin_id);
            exit;
        }
        
          
    }else {
        require "./views/pages/admin/404.php";
    }

} else {
    echo "No admin ID provided.";
    exit;

}

// require "./views/pages/admin/admins/show.php";
