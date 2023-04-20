<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%posts}}`.
 */
class m230316_093901_create_posts_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%posts}}', [
            'p_id' => $this->primaryKey(),
            'title' => $this->string(),
            'text' => $this->string(),
            'author_id' => $this->string(),
            'status' => $this->integer(),
            'tags' => $this->string(),
            'pub_date' => $this->string()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%posts}}');
    }
}
