<?php

use yii\grid;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\grid\GridView;

?>

<a href="/index.php?r=users/form" class="btn btn-default">createUser</a>

<?php for ($i = 0; $i < 1 ; $i++): ?>
<div>
    <?= GridView::widget([
        'dataProvider' => $provider,
        'columns' => [
            'id',
            'address',
            'email',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'button',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{update}{delete}',
                'buttons' => [
                'update' => function ($url,$model) {
                    $url = Url::to(['controller/update', 'id' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('app', 'lead-update'),
                    ]);
                },
                'delete' => function ($url, $model) {
                    $url = Url::to(['controller/delete', 'id' => $model->id]);
                    return Html::a('<span class="glyphicon glyphicon-trash"></span>', $url, [
                                'title' => Yii::t('app', 'lead-delete'),
                    ]);
                }
                ],
            ],
        ],
    ]);
    ?>
</div>
<?php endfor; ?>

<?php for ($i = 0; $i < count($provider->allModels) ; $i++): ?>
    <p><?=$i ?></p>
<?php endfor; ?>


<?php foreach($provider as $key=>$value): ?>
<?php endforeach; ?>

