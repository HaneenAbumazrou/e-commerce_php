<?php 


class RenameIsValidColumnNameFromCouponsTable
{
    public function up()
    {
        return "ALTER TABLE coupons
        RENAME COLUMN is_valid to status;";
    }
    
    public function down()
    {
        return "DROP TABLE coupons";
    }
}