<?php 


class CreateCategoriesTable
{
    public function up()
    {
        return "CREATE TABLE IF NOT EXISTS categories (
            id INT AUTO_INCREMENT PRIMARY KEY,
            name VARCHAR(248) NOT NULL,
            image VARCHAR(248),
            image_path VARCHAR(248),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    }
    
    public function down()
    {
        return "DROP TABLE categories";
    }
}