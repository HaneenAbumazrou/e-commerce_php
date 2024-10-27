<?php



class Model {

  protected $conn;

  protected $table;
  protected $pk = "id";



  function __construct(){
    $this->open($_ENV["DATABASE_HOST"], $_ENV["DATABASE_USERNAME"], $_ENV["DATABASE_PASSWORD"]);
  }

  function __destruct(){
    $this->conn = null;
  }



  private function open($servername, $username, $password){

    try {
      $this->conn = new PDO("mysql:host=$servername;dbname=".$_ENV["DATABASE_NAME"], $username, $password);
      $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    } catch(PDOException $error) {
      echo "Connection failed: " . $error->getMessage();
    }
  }



  public function create(array $data){
    $query = "INSERT INTO $this->table";
    $columns = "(";
    $values = "VALUES (";

    foreach ($data as $key => $value) {
      $columns .= "$key";
      ($value != end($data))? $columns .= ", ": $columns .= ")";
      
      $values .= "'$value'";
      ($value != end($data))? $values .= ", ": $values .= ")";
    }
    $query .= " $columns $values";

    try {
      $this->conn->exec($query);

    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }


  public function select($pk, $operator,  ...$data){
    $query = "SELECT ";

    foreach ($data as $value) {
      $query .= "$value";
      ($value != end($data))? $query .= ", ": $query .= " ";
    }
    $query .= "FROM $this->table WHERE $this->pk $operator $pk";


    echo $query."<br>";
    try {
      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return $stmt->fetch();
    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }

  public function where($query){

    try {
      $stmt = $this->conn->prepare($query);
      $stmt->execute();

      return $stmt->fetchAll();
    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }

  public function find($pk){
    try {
      $stmt = $this->conn->prepare("SELECT * FROM $this->table WHERE $this->pk=$pk");
      $stmt->execute();

      return $stmt->fetch();
    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }


  public function update(array $data, $pk){
    $query = "UPDATE $this->table SET ";

    foreach ($data as $key => $value) {
      $query .= "$key='$value'";
      ($value != end($data))? $query .= ", ": $query .= " ";
      
    }
    $query .= "WHERE $this->pk=$pk";


    // dd($query);
    try {
      $stmt = $this->conn->prepare($query);
      $stmt->execute();

    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }


  public function delete($pk){
    try {
      $this->conn->exec("DELETE FROM $this->table WHERE $this->pk=$pk");

    }catch(PDOException $error){
      echo $error->getMessage();
    }
  }





  public function set_table_name($table_name){
    $this->table = $table_name;
  }

  public function set_table_pk($pk){
    $this->pk = $pk;
  }

}
