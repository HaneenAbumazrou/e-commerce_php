<?php 


class CreateAddressesTable
{
    public function up()
    {
        return "CREATE TABLE IF NOT EXISTS addresses (
            id INT AUTO_INCREMENT PRIMARY KEY,
            user_id INTEGER REFERENCES users(id),
            FOREIGN KEY (user_id) REFERENCES users(id) ON DELETE CASCADE,
            city VARCHAR(248),
            address VARCHAR(248),
            is_default BOOLEAN,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    }
    
    public function down()
    {
        return "DROP TABLE addresses";
    }
}