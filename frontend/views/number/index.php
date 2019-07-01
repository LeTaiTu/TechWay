<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\NumberSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Numbers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="number-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Number', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'num',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
