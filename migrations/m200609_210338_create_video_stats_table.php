<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%video_stats}}`.
 */
class m200609_210338_create_video_stats_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%video_stats}}', [
            'id' => $this->primaryKey(),
            'views_count' => $this->integer(),
            'comments_count' => $this->integer(),
            'likes' => $this->integer(),
            'dislikes' => $this->integer(),
            'video_id' => $this->integer(),
            'created_at' => $this->integer(11)
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%video_stats}}');
    }
}
