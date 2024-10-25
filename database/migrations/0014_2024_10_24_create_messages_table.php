<?php 


class CreateMessagesTable
{
    public function up()
    {
        return "CREATE TABLE IF NOT EXISTS messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            admin_id INTEGER NOT NULL,
            FOREIGN KEY (admin_id) REFERENCES admins(id) ON DELETE CASCADE,
            status BOOLEAN DEFAULT FALSE,
            name VARCHAR(248),
            email VARCHAR(248),
            message TEXT,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
        )";
    }
    
    public function down()
    {
        return "DROP TABLE messages";
    }
}