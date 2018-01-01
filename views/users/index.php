<?php

use yii\grid;
use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\Pjax;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\widgets\LinkPager;

?>
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script>
$(document).ready(function(e){
    $('.search-panel .dropdown-menu').find('a').click(function(e) {
		e.preventDefault();
		var param = $(this).attr("href").replace("#","");
		var concept = $(this).text();
		$('.search-panel span#search_concept').text(concept);
		$('.input-group #search_param').val(param);
	});
});
</script>
<form method="post" action="/index.php?r=users/search">
    <div class="container">
        <div class="col-lg-6">
            <div class="input-group my-group"> 
                <select id="lunch" name="username" class="selectpicker form-control" data-live-search="true" title="Please select a lunch ...">
                    <option>asc</option>
                    <option>test2</option>
                </select> 
                <span class="input-group-btn">
                    <button class="btn btn-default my-group-button" type="submit">GO!</button>
                </span>
                <input type="hidden" name="<?= Yii::$app->request->csrfParam; ?>" value="<?= Yii::$app->request->csrfToken; ?>" />
            </div>
        </div>
    <div>
</form>

<div class="container"> 
    <a href="/index.php?r=users/create" class="btn btn-default">createUser</a>

    <?= GridView::widget([
        'dataProvider' => $provider,
        'caption'=>"<h5>$pageSummary</h5>",
        'captionOptions' => [
            'class' => 'bg-primary text-white',
        ],
        'summary' => "",
        'columns' => [
            'id',
            'username',
            'address',
            'email',
            [
                'class' => 'yii\grid\ActionColumn',
                'header' => 'button',
                'headerOptions' => ['style' => 'color:#337ab7'],
                'template' => '{update}{delete}',
                'buttons' => [
                'update' => function ($url,$model) {
                    $url = Url::to(['users/update', 'id' => $model['id']]);
                    return Html::a('<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                'title' => Yii::t('app', 'lead-update'),
                    ]);
                },
                'delete' => function ($url, $model) {
                    $url = Url::to(['users/delete', 'id' => $model['id']]);
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