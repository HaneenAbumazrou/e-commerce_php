<?php


require "./model/User.php";


class AuthController{

    public function login($email, $password) {
        session_start();
        $userModel = new User();
        $users = $userModel->where("SELECT * FROM users WHERE email='$email'");
        $user=$users[0];

        if (password_verify($password, $user['password'])) {
            $_SESSION['user_id'] = $user['id'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['email'] = $user['email'];
            return true;
            
        }
        return false;
    }

    public function register($userData) {
        $userModel = new User();
        $userData['password'] = password_hash($userData['password'], PASSWORD_DEFAULT);

        return $userModel->create($userData);
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /");
        exit;
    }
      
        

}
