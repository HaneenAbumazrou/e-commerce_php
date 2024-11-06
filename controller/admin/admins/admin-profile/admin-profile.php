<?php
// session_start();

require "./controller/admin/admins/admin-profile/AdminProfileController.php";

$admin = new AdminProfileController();
$errors = []; // Array to store error messages
$passwordPattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/";


$_SESSION['admin'] = $admin->find($_SESSION['admin']['id']);
$imagePath = $_SESSION['admin']['path'].$_SESSION['admin']['image'];

if($_SERVER["REQUEST_METHOD"] == "POST") {

    $_SESSION['old_values'] = $_POST;
    $_SESSION['errors'] = [];


    if(isset($_POST['update_profile'])){
    

    $data = [

        "first_name" => htmlspecialchars(trim($_POST['first_name'])),
        "last_name" => htmlspecialchars(trim($_POST['last_name'])),
        "username" => htmlspecialchars(trim($_POST['username'])),
        "email" => htmlspecialchars(trim($_POST['email'])),
    ];


    // Image upload handling
    if (isset($_FILES['profile_image']) && $_FILES['profile_image']['error'] === UPLOAD_ERR_OK) {
        // dd($_FILES);
        $fileTmpPath = $_FILES['profile_image']['tmp_name'];
        
        $fileName = uniqid('', true) .$_FILES['profile_image']['name'];
        $fileSize = $_FILES['profile_image']['size'];
        $fileType = $_FILES['profile_image']['type'];
        $fileNameCmps = explode(".", $fileName);
        $fileExtension = strtolower(end($fileNameCmps));

        // Allowed file extensions
        $allowedfileExtensions = ['jpg', 'jpeg', 'png', 'gif'];

        // Validate file type
        if (in_array($fileExtension, $allowedfileExtensions) && $fileSize < 5000000) { // Limit file size to 5MB
            // Upload directory
            $uploadFileDir = './public/admin/assets/images/profiles/';
            $dest_path = $uploadFileDir . $fileName;

            // Move the uploaded file
            if (move_uploaded_file($fileTmpPath, $dest_path)) {
                // If successful, update the profile with the new image path and name
                $data['image'] = $fileName; // Store the image name
                $data['path'] = $uploadFileDir; // Store the path where images are saved
                $admin->update(['image' => $fileName, 'path' => $uploadFileDir], $_SESSION['admin']['id']);

                header("refresh: 0.1");
            } else {
                $_SESSION['errors']['profile_image'] = "There was an error moving the uploaded file.";
            }
        } else {
            $_SESSION['errors']['profile_image'] = "Upload failed. Allowed file types: jpg, jpeg, png, gif. Max size: 5MB.";
        }
    }


     // Validation for each field
     foreach ($data as $key => $value) {
        if (empty($value)) {
            $_SESSION['errors'][$key] = ucfirst(str_replace('_', ' ', $key)) . " is required.";
        } elseif (strlen($value) < 5 && $key !== 'email') {
            $_SESSION['errors'][$key] = ucfirst(str_replace('_', ' ', $key)) . " must be at least 5 characters.";
        }}


        if (!empty($data['email']) && !filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $_SESSION['errors']['email'] = "Please enter a valid email address.";
        }


        if (empty($_SESSION['errors'])) {
            $admin->update($data, $_SESSION['admin']['id']);
            $_SESSION['admin'] = $admin->find($_SESSION['admin']['id']); // Refresh session data
            $_SESSION['success_message'] = "Profile updated successfully!";
            unset($_SESSION['old_values']); // Clear old values on success

        }
    



    
}


    if(isset($_POST['update_password'])){

        $currentPassword = $_POST['current_password'];
        $newPassword = $_POST['new_password'];
        $renewPassword = $_POST['renew_password'];

  


        $adminData = $admin->find($_SESSION['admin']['id']);

        if (empty($currentPassword) || empty($newPassword) || empty($renewPassword)) {
            if (empty($currentPassword)) {
                $errors['current_password'] = "This field is required.";
                unset($errors['empty_field']);
                
            }

            if (empty($newPassword)) {
                $errors['empty_field'] = "This field is required.";
            }

            if (empty($renewPassword)) {
                $errors['renew_password'] = "This field is required.";
            }
        }

        if (!empty($currentPassword)) {
        if (!password_verify($currentPassword, $adminData['password'])) {
            $errors['current_password'] = "The current password is incorrect.";
            unset($errors['empty_field']);
        }  
    
        elseif (!empty($newPassword) && !empty($renewPassword)) {
            if ($newPassword !== $renewPassword) {
                $errors['renew_password'] = "The new passwords do not match.";
            }
            // Validate new password strength
            elseif (!preg_match($passwordPattern, $newPassword)) {
                $errors['new_password'] = "Password must be 8+ characters, include uppercase, lowercase, a number, and a special character.";
            }
        }
        else{
            unset($errors['current_password']);
            $errors['empty_field'] = "This field is required.";
        }
    }
    else {
        $errors['current_password'] = "This field is required.";
    }
    
    
    
        // Check if new passwords match only if both fields are filled
    



        if (empty($errors) && !empty($currentPassword) && !empty($newPassword) && !empty($renewPassword)) {
            // Hash the new password
            $hashedPassword = password_hash($newPassword, PASSWORD_BCRYPT);
            
            // Update the password in the database
            $admin->update(['password' => $hashedPassword], $_SESSION['admin']['id']);
            
            // Redirect or display success message
            $_SESSION['success_message'] = "Your password has been changed successfully.";

        }
        
      
        // else {
        //     $_SESSION['errors'] = $errors;

        // }

    
    }
}







require "./views/pages/admin/admins/admin-profile.php";