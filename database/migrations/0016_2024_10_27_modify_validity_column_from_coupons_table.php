<?php 


class ModifyValidityColumnFromCouponsTable
{
    public function up()
    {
        return "ALTER TABLE coupons
        MODIFY COLUMN status ENUM('active', 'inactive', 'expired');
        ";
    }
    
    public function down()
    {
        return "DROP TABLE coupons";
    }
}