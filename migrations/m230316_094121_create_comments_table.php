<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%comments}}`.
 */
class m230316_094121_create_comments_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%comments}}', [
            'id' => $this->primaryKey(),
            'author' => $this->string(),
            'text' => $this->string(),
            'pub_date' => $this->string(),
            'post_id' => $this->integer()
        ]);

        $this->addForeignKey('fk_posts_id', 'comments', 'post_id', 'posts', 'id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_posts_id', '{{%comments}}');
        $this->dropTable('{{%comments}}');
    }
}
