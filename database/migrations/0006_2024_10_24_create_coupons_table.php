<?php 


class CreateCouponsTable
{
    public function up()
    {
        return "CREATE TABLE IF NOT EXISTS coupons (
            id INT AUTO_INCREMENT PRIMARY KEY,
            admin_id INTEGER NOT NULL,
            FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE CASCADE,
            code VARCHAR(248) UNIQUE NOT NULL,
            is_valid BOOLEAN DEFAULT TRUE,
            discount_percentage DECIMAL(4, 2),
            valid_from TIMESTAMP,
            valid_until TIMESTAMP,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
        )";
    }
    
    public function down()
    {
        return "DROP TABLE coupons";
    }
}