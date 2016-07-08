<?php

use yii\db\Schema;
use yii\db\Migration;

class m141120_154932_create_yii2_start_blogs_category extends Migration
{
    public function safeUp()
    {
        // MySql table options
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_general_ci ENGINE=InnoDB';

        // Blogs table
        $this->createTable('{{%blogs_category}}', [
            'id' => Schema::TYPE_PK,
            'category_name' => Schema::TYPE_STRING . '(128) NOT NULL',
            'category_description' => Schema::TYPE_TEXT . ' NOT NULL',
            'category_image' => Schema::TYPE_STRING . '(64)',
        ], $tableOptions);
        $this->createTable('{{%blogs_to_category}}', [
            'blog_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
            'category_id' => Schema::TYPE_INTEGER . '(11) NOT NULL',
        ], $tableOptions);
        $this->createIndex('blog_id', '{{%blogs_to_category}}', 'blog_id');
        $this->createIndex('category_id', '{{%blogs_to_category}}', 'category_id');
        //$this->addColumn('{{%blogs}}', 'category_id', 'int(11) NOT NULL'); 
    }

    /**
     * @inheritdoc
     */
    public function safeDown()
    {
        $this->dropTable('{{%blogs_category}}');
    }
}
