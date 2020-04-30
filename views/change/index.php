<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Page;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Changes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="change-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'time',
            [
                'attribute' => 'page_title',
                'value' => 'page.title',
                'label' => 'Страница'
            ],
            'changes:ntext',
            [
                'attribute' => 'user_name',
                'value' => 'user.username',
                'label' => 'Пользователь'
            ]
        ],
    ]); ?>


</div>
