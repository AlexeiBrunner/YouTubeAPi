<?php
    /* @var $this yii\web\View */

    $this->title = 'YouTube Api ';

    use yii\data\ActiveDataProvider;

    $dataProvider = new ActiveDataProvider([
        'query'      => \app\models\Video::find(),
        'pagination' => [
            'pageSize' => 10,
        ],
    ]);
?>

<div class="row videos">
    <?php echo \yii\widgets\ListView::widget([
        'dataProvider' => $dataProvider,
        'itemView'     => 'card',
        'itemOptions' => ['class' => 'col-md-12 col-sm-6'],
        'summary'=>''
    ]); ?>
</div>
