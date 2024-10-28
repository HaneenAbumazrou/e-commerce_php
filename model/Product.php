<?php

require "./model/Model.php";

class Product
{
  private $model;

  public function __construct()
  {
    $this->model = new Model();
    $this->model->set_table_name("products");
  }

  // Create a new product
  public function create($data)
  {
    return $this->model->create($data);
  }

  // Update an existing product
  public function update(array $data, $pk)
  {
    return $this->model->update($data, $pk);
  }

  // Select specific fields based on conditions
  public function select($pk, $operator, ...$data)
  {
    return $this->model->select($pk, $operator, ...$data);
  }

  // Find records using a custom query
  public function where($query)
  {
    return $this->model->where($query);
  }

  // Delete a product by primary key
  public function delete($pk)
  {
    return $this->model->delete($pk);
  }

  // Find a product by primary key
  public function find($pk)
  {
    return $this->model->find($pk);
  }
}
