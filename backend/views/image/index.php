<?php

use yii\helpers\Html;
use yii\grid\GridView;
use aki\imageslider\ImageSlider;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\ImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Images';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="image-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Image', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',

            // [
            //     'attribute' => 'image',
            //     'format' => 'raw',
            //     'value' => function ($data) {
            //         if ($data->image) {
            //             $par = [
            //                 'thumbnail' => [
            //                     'width' => 90,
            //                     'height' => 90,
            //                 ],
            //                 'quality' => 100,
            //                 'compress' => true
            //             ];
            //             $opt = [
            //                 'alt'=>'test'
            //             ];
            //             return Yii::$app->thumbnail->img('/storages/images/number/' . $data->image[0]->name, $par, $opt);
            //         }
            //     },
            //     'headerOptions'=>[
            //         'style'=>'width=15px;text-align:center'

            //     ],
            //     'contentOptions'=>[
            //         'style'=>'width=15px;text-align:center'
            //     ],
            // ],
            'type',
            'ext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
