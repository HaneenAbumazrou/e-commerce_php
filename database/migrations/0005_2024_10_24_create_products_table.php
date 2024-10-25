<?php 


class CreateProductsTable
{
    public function up()
    {
        return "CREATE TABLE IF NOT EXISTS products (
            id INT AUTO_INCREMENT PRIMARY KEY,
            category_id INTEGER REFERENCES categories(id),
            FOREIGN KEY (category_id) REFERENCES categories(id) ON DELETE CASCADE,
            name VARCHAR(248) NOT NULL,
            description TEXT,
            price DOUBLE PRECISION NOT NULL,
            stock_quantity INTEGER NOT NULL,
            avg_review DOUBLE PRECISION DEFAULT 0,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    }
    
    public function down()
    {
        return "DROP TABLE products";
    }
}