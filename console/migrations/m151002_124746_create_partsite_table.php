<?php

use yii\db\Schema;
use yii\db\Migration;

class m151002_124746_create_partsite_table extends Migration
{
    public function up()
    {
        $this->createTable('news', [
            'id' => Schema::TYPE_PK,
            'title' => Schema::TYPE_STRING . ' NOT NULL',
            'content' => Schema::TYPE_TEXT,
        ]);

        CREATE TABLE IF NOT EXISTS `partner_site` (
  `id` int(10) NOT NULL COMMENT 'уникальный номер записи',
  `icon_site` varchar(255) NOT NULL COMMENT 'иконка сайта',
  `name_site` varchar(255) NOT NULL COMMENT 'имя сайта',
  `url_site` varchar(255) NOT NULL COMMENT 'ссылка на сайт',
  `sort` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8 COMMENT='сайты партнеров';

ALTER TABLE `partner_site`
  ADD PRIMARY KEY (`id`);

ALTER TABLE `partner_site`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'уникальный номер записи',AUTO_INCREMENT=0;
  
    }

    public function down()
    {
        $this->dropTable('news');
        echo "m151002_124746_create_partsite_table deleted.\n";
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}

