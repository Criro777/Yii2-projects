<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Articles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="article-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Cоздать статью', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            'id',
            'title',
            'description:ntext',
            //'content:ntext',
            'date',
            [
                'format' => 'html',
                'label' => 'Image',
                'value' => function($data){
                    return Html::img($data->getImage(), ['width'=>140, 'height' => 130]);
                }
            ],
            // 'viewed',
            // 'category_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
