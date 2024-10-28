<?php

require_once "./model/Product.php";

class ProductController
{
    private $product;

    public function __construct()
    {
        $this->product = new Product();
    }

    // Display a list of all products
    public function index()
    {
        return $this->product->where("SELECT * FROM products");
    }

    // Create a new product
    public function create($data)
    {
        return $this->product->create($data);
    }

    // Show details of a specific product
    public function show($id)
    {
        return $this->product->find($id);
    }

    // Update an existing product
    public function update($id, $data)
    {
        return $this->product->update($data, $id);
    }

    // Delete a product
    public function delete($id)
    {
        return $this->product->delete($id);
    }
}
