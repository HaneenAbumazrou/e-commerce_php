<?php 


class CreateProductImagesTable
{
    public function up()
    {
        return "CREATE TABLE IF NOT EXISTS product_images (
            id INT AUTO_INCREMENT PRIMARY KEY,
            products_id INTEGER REFERENCES products(id),
            FOREIGN KEY (products_id) REFERENCES products(id) ON DELETE CASCADE,
            name VARCHAR(248),
            path TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    }
    
    public function down()
    {
        return "DROP TABLE product_images";
    }
}