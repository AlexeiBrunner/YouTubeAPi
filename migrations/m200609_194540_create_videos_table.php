<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%videos_stats}}`.
 */
class m200609_194540_create_videos_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%videos}}', [
            'id' => $this->primaryKey(),
            'youtube_id' => $this->char('15'),
            'title' => $this->string(),
            'description' => $this->text(),
            'thumbnails' => $this->string(),
            'channel_id' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%videos}}');
    }
}
