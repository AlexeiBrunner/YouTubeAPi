<?php


    namespace app\controllers;

    use app\models\Channel;
    use app\models\Video;
    use app\models\VideoStat;
    use yii\helpers\VarDumper;

    class YouTubeController
    {
        const VIDEOS = ['RhMYBfF7-hE', '8o7YOiYcNbU'];

        private $youtube;

        public function __construct()
        {
            $this->youtube = \Yii::$app->googleApi->serviceYoutube->getGoogleService();
        }

        public function uploadData()
        {
            $videos = $this->videosByIds();
            $this->saveData($videos);
        }


        public function videosByIds()
        {
            return $this->youtube->videos->listVideos('snippet, statistics, contentDetails', [
                'id' => implode(self::VIDEOS, ','),
            ])->getItems();
        }

        public function saveData($videos)
        {
            array_walk($videos, function ($value) {
                $video = Video::findOne(['youtube_id' => $value->id]);
                if (!$video) {
                    $video = new Video();
                    $video->attributes = [
                        'youtube_id'  => $value->id,
                        'description' => $value->snippet['description'],
                        'title'       => $value->snippet['title'],
                        'thumbnails'  => $value->snippet['thumbnails']['high']['url'],
                    ];
                    $video->save();
                }

                $channel = Channel::findOne(['youtube_id' => $value->snippet['channelId']]);
                if (!$channel) {
                    $channel = new Channel();
                    $channel->attributes = [
                        'youtube_id'  => $value->snippet['channelId'],
                        'title'       => $value->snippet['channelTitle'],
                        'subscribers' => $this->getChannelInfo($value->snippet['channelId']),
                    ];
                    $channel->save();
                }

                $stat = new VideoStat();

                $stat->attributes = [
                    'comments_count' => $value->statistics['commentCount'],
                    'likes'          => $value->statistics['likeCount'],
                    'dislikes'       => $value->statistics['dislikeCount'],
                    'views_count'    => $value->statistics['viewCount'] ? $value->statistics['viewCount'] : '-',
                ];
                $stat->save();

                $stat->link('video', $video);
                $video->link('channel', $channel);
            });

        }

        public function getChannelInfo($channel_id)
        {
            return $this->youtube->channels->listChannels('statistics', [
                'id' => $channel_id,
            ])[0]->statistics['subscriberCount'];
        }
    }