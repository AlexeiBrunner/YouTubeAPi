<?php


    namespace app\models;

    use yii\behaviors\TimestampBehavior;
    use yii\db\ActiveRecord;

    class VideoStat extends ActiveRecord
    {

        public function rules()
        {
            return [
                [['views_count', 'comments_count','likes', 'dislikes'], 'safe'],
            ];
        }
        public static function tableName()
        {
            return '{{video_stats}}';
        }

        public function getVideo()
        {
            return $this->hasOne(Video::className(), ['id' => 'video_id']);
        }

        public function behaviors()
        {
            return [
                [
                    'class' => TimestampBehavior::className(),
                    'attributes' => [
                        ActiveRecord::EVENT_BEFORE_INSERT => ['created_at'],
                    ],
                ],
            ];
        }
    }