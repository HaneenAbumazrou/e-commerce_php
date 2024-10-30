<?php
session_start();


require "./model/User.php";


class AuthController{

    public function login($email, $password) {
        $user = new User();
        $user_rec = $user->where("SELECT * FROM users WHERE email='$email'");

        if($user_rec){
            $user = $user_rec[0];
            if (password_verify($password, $user['password'])) {
                $this->add_to_session($user);
                return true;
            }
        }


        $_SESSION["login_errors"]["email_error"] = "Your email or password is incorrect.";

        return false;
    }

    public function register($data) {
        $user_id =  (new User())->create($data);
        $data["user_id"] = $user_id;
        $this->add_to_session($data);
        return $user_id;
    }

    public function logout() {
        session_start();
        session_unset();
        session_destroy();
        header("Location: /");
        exit;
    }


    public function add_to_session($data){
        $_SESSION["user"]['user_id'] = $data['id'];
        $_SESSION["user"]['first_name'] = $data['first_name'];
        $_SESSION["user"]['last_name'] = $data['last_name'];
        $_SESSION["user"]['username'] = $data['username'];
        $_SESSION["user"]['email'] = $data['email'];
    }
}



