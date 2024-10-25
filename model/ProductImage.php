<?php




require "./model/Model.php";

class ProductImage {

  private $model;

  function __construct(){
    $this->model = new Model();
    $this->model->set_table_name("product_images");
  }


  public function create($data){
    return $this->model->create($data);
  }

  public function update(array $data, $pk){
    return $this->model->update($data, $pk);
  }

  public function select($pk, $operator,  ...$data){
    return $this->model->select($pk, $operator,  ...$data);
  }

  public function where($query){
    return $this->model->where($query);
  }

  public function delete($pk){
    return $this->model->delete($pk);
  }

  public function find($pk){
    return $this->model->find($pk);
  }


}