<?php

use yii\db\Migration;

/**
* Class m180522_201042_one
*/
class m180522_201042_one extends Migration
{
/**
* {@inheritdoc}
*/
public function safeUp()
{
$this->execute('
CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `content` text,
  `name` text NOT NULL,
  `description` text NOT NULL COMMENT 'заголовок',
  `url` text NOT NULL,
  `news_image` text NOT NULL,
  `created_at` int(11) NOT NULL,
  `updated_at` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;
');

}

/**
* {@inheritdoc}
*/
public function safeDown()
{
echo "m180522_201042_one cannot be reverted.\n";

return false;
}

/*
// Use up()/down() to run migration code without a transaction.
public function up()
{

}

public function down()
{
echo "m180522_201042_one cannot be reverted.\n";

return false;
}
*/
}
