<?php

    use yii\helpers\Html;
    use yii\bootstrap\Modal;

    $currentStatistic = $model->lastStatistic;
?>


<div class="panel panel-default  panel--styled">
    <div class="panel-body">
        <div class="col-md-12 panelTop">
            <div class="col-md-4">
                <?= Html::img($model->thumbnails, ['class' => "img-responsive"]) ?>
            </div>
            <div class="col-md-8">
                <?= Html::tag('h2', $model->title) ?>
                <div class="meta">
                    <?= Html::tag('a', $model->channel->title, ['class' => "author", "href" => "#"]) ?>
                    •
                    <?= $currentStatistic->views_count ?> views
                    •
                    <?= $currentStatistic->comments_count ?> comments
                </div>
                <p><?= \yii\helpers\StringHelper::truncate(nl2br($model->description), 150, '...'); ?></p>
            </div>
        </div>

        <div class="col-md-12 panelBottom">
            <div class="col-md-8 col-12 col-sm-12 text-left">
                <i class="glyphicon glyphicon-thumbs-up"></i>
                <div class="mark"><?= $currentStatistic->likes ?></div>
                <i class="glyphicon glyphicon-thumbs-down"></i>
                <div class="mark"><?= $currentStatistic->dislikes ?></div>
            </div>
            <div class="col-md-4 col-12 col-sm-12 text-center">
                <?php Modal::begin([
                    'header'       => 'Statictics',
                    'id'           => 'statisticsModal',
                    'toggleButton' => [
                        'tag'   => 'button',
                        'class' => 'btn  btn-info ',
                        'label' => '<span class="glyphicon glyphicon-stats"></span> Statictics',
                    ],
                ]);

                    echo "<div id='modalContent'>";
                    echo \Yii::$app->view->render('@app/views/site/modal', [
                        'model' => $model,
                    ]);

                    echo "</div>";
                    Modal::end(); ?>
            </div>

        </div>
    </div>
</div>

