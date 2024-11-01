<?php 


class AddStatusColumnToAdminsTable
{
    public function up()
    {
        return "ALTER TABLE admins
        ADD COLUMN status ENUM('active', 'not active')";
    }
    
    public function down()
    {
        return "DROP TABLE admins";
    }
}