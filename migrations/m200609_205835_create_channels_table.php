<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%channels}}`.
 */
class m200609_205835_create_channels_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%channels}}', [
            'id' => $this->primaryKey(),
            'youtube_id' => $this->string(50),
            'title' => $this->string(),
            'subscribers' => $this->integer()
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%channels}}');
    }
}
