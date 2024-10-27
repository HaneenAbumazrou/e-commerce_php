<?php
require "./controller/admin/admins/AdminController.php";

$adminModel = new AdminController();

if (isset($_GET['id'])) {
    $admin_id = $_GET['id'];
  
    // var_dump($admin_id);
    // Fetch the admin details by ID
    $admin = $adminModel->find($admin_id);
    // var_dump($admin);
    // dd($admin);
  
  
    if ($admin) {
      $full_name = $admin['first_name'] . ' ' . $admin['last_name'];
      $username = $admin['username'];
      $email = $admin['email'];
      $role = $admin['role'];
      $status = $admin['status'];
      $created_at = date("d-m-Y", strtotime($admin['created_at']));
    } else {
      echo "Admin not found.";
      exit;
    }
} else {
  echo "No admin ID provided.";
  exit;
}

  
  
// if ($_SERVER['REQUEST_METHOD'] == 'POST') {
// if ($status == "active") {
//   $adminModel->update(['status' => 'not active'], $admin_id);

// }
// else {
//   $adminModel->update(['status' => 'active'], $admin_id);
// }

  
// }







require "./views/pages/admin/admins/show.php";