<?php


    namespace app\commands;

    use app\controllers\YouTubeController;
    use yii\console\Controller;
    use yii\db\Exception;


    class DaemonController extends Controller
    {

        public function actionIndex()
        {
            echo "Cron service is running.";
        }


        public function actionHourly()
        {
            try {
                $cron = new YouTubeController();
                $cron->uploadData();
            } catch ( Exception $e) {
                echo $e->getMessage();
            }
        }
    }