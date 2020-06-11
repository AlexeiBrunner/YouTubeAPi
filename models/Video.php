<?php


    namespace app\models;

    use yii\db\ActiveRecord;

    class Video extends ActiveRecord
    {
        public function rules()
        {
            return [
                [['title', 'description', 'youtube_id', 'thumbnails'], 'safe'],
                [['title', 'youtube_id', 'thumbnails'], 'required'],
            ];
        }

        public static function tableName()
        {
            return '{{videos}}';
        }

        public function getChannel()
        {
            return $this->hasOne(Channel::className(), ['id' => 'channel_id']);
        }

        public function getStats()
        {
            return $this->hasMany(VideoStat::className(), ['video_id' => 'id']);
        }

        public function getLastStatistic()
        {
            return $this->hasMany(VideoStat::className(), ['video_id' => 'id'])
                ->orderBy([
                    'id' => SORT_DESC,
                ])->one();
        }

        public function getStatisticOnData($start = null, $end = null)
        {
            $start = empty($start) ? time() : $start;
            $end = empty($end) ? time() - (24 * 60 * 60) : $start;
            $models = $this->hasMany(VideoStat::className(), ['video_id' => 'id'])
                ->where("created_at BETWEEN  $end  AND $start")
                ->orderBy([
                    'id' => SORT_ASC,
                ])
                ->all();

            $data = ['views', 'comments', 'likes', 'dislikes', 'labels'];
            array_walk($models, function ($el) use (&$data, &$labels) {
                $data['views'][] = $el->views_count;
                $data['comments'][] = $el->comments_count;
                $data['likes'][] = $el->likes;
                $data['dislikes'][] = $el->dislikes;
                $data['labels'][] = date('m-d H:i', $el->created_at);
            });

            return $data;
        }
    }