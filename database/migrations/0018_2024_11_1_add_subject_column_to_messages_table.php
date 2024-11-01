<?php 


class AddSubjectColumnToMessagesTable
{
    public function up()
    {
        return "ALTER TABLE messages
        ADD COLUMN subject TEXT AFTER name";
    }
    
    public function down()
    {
        return "DROP TABLE messages";
    }
}