<?php
require_once "./model/Product.php";
require_once "./model/ProductImage.php";

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

    // Create a new product image
    public function createImage($data)
    {
        $productImages = new ProductImage();
        $productImages->create($data);
    }

    // Show product image
    public function showImage($id)
    {
        $productImages = new ProductImage();
        return $productImages->where("SELECT * FROM product_images WHERE products_id = $id");
    }

    // Show details of a specific product
    public function show($id)
    {
        return $this->product->find($id);
    }

    public function where($query){
        return $this->product->where($query);
    }

    // Update an existing product
    public function update($data, $id)
    {
        return $this->product->update($data, $id);
    }

    // Delete a product
    public function delete($id)
    {
        return $this->product->delete($id);
    }
}
