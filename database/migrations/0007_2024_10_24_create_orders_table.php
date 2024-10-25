<?php 


class CreateOrdersTable
{
    public function up()
    {
        return "CREATE TABLE IF NOT EXISTS orders (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INTEGER,
            coupon_id INTEGER,
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (coupon_id) REFERENCES coupons(id) ON DELETE SET NULL,
            status VARCHAR(248) NOT NULL,
            original_price DECIMAL(10, 2),
            total_amount DECIMAL(10, 2),
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    }
    
    public function down()
    {
        return "DROP TABLE orders";
    }
}