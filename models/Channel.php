<?php


    namespace app\models;

    use yii\db\ActiveRecord;

    class Channel extends ActiveRecord
    {
        public function rules()
        {
            return [
                [['title','youtube_id', 'subscribers'], 'safe'],
                [['title','youtube_id', 'subscribers'], 'required'],
            ];
        }

        public static function tableName()
        {
            return '{{channels}}';
        }

        public function getVideos()
        {
            return $this->hasMany(Video::className(), ['channel_id'=> 'id']);
        }
    }