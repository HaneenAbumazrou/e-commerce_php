<?php
require_once "./function/is_admin_auth.php";

require "./model/Category.php";

class CategoryController
{
    private $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    // Display a list of all categories
    public function index()
    {
        return $this->category->where("SELECT c.*, COUNT(p.id) AS product_count
        FROM categories c
        LEFT JOIN products p ON p.category_id = c.id
        GROUP BY c.id;
        ");
    }

    // Create a new category
    public function create($data)
    {
        $name = $this->clean($data["name"]);
        $imagePath = $data["image_path"];
        $imageName = $data["image"];
        // Prepare data for insertion
        $data = [
            "name" => $name,
            "image_path" => $imagePath,
            "image" => $imageName,
        ];

        return $this->category->create($data);
    }

    // Show details of a specific category
    public function show($id)
    {
        return $this->category->find($id);
    }

    // Clean input data
    private function clean($data)
    {
        return strip_tags(htmlspecialchars(trim($data)));
    }


    public function delete($id)
    {
        return $this->category->delete($id);
    }

    public function update($data, $id)
    {
        return $this->category->update($data, $id);
    }

    public function where($query){
        return $this->category->where($query);

    }
}
