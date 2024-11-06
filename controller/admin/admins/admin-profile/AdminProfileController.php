<?php 

require "./model/Admin.php";



class AdminProfileController{

    public function where($query){
        $admin = new Admin();
        $admins = $admin->where($query);
        return $admins;
      }


      public function find($id){
        $admin = new Admin();
        $admin = $admin->find($id);
        return $admin;
      }

      public function update(array $data, $id){
        $admin = new Admin();
        $admin = $admin->update($data, $id);
        return $admin;
      }

    //   public function getAdminByEmail($email) {
    //     $admin = new Admin();
    //     $query = "SELECT * FROM admins WHERE email = '$email'";
    //     $result = $admin->where($query); 
        
    //     return $result ? $result[0] : null;
    // }



}
