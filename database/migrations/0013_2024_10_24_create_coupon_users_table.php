<?php 


class CreateCouponUsersTable
{
    public function up()
    {
        return "CREATE TABLE IF NOT EXISTS coupon_user (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INTEGER REFERENCES users(id),
            coupon_id INTEGER REFERENCES coupons(id),
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            FOREIGN KEY (coupon_id) REFERENCES coupons(id) ON DELETE CASCADE,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    }
    
    public function down()
    {
        return "DROP TABLE coupon_user";
    }
}