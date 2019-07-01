<?php

use yii\helpers\Html;
use yii\grid\GridView;
// use yii\base\Theme;
use aki\imageslider\ImageSlider;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\NumberSearch */
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
            ['class' => 'yii\grid\SerialColumn',
                'header'=>'STT',  //Tên tiêu đề
                'headerOptions'=>[  //Tiêu đề
                'style'=>'width=15px;text-align:center'
            ],
                'contentOptions'=>[  //Nội dung
                'style'=>'width=15px;text-align:center'
            ],
        ],
        'id',
        'num',
        'code_country',
        // 'image',
        [
            'attribute' => '',
            'format' => 'raw',
            'label' => 'Ảnh',
            'value' => function($data){
                $listImage = array();
                foreach ($data->image as $key => $value) {
                    if ($key==0) {
                        $listImage[$key]['active']=true;
                    }
                    $listImage[$key]['src'] = 'storages/images/number/'.$value->name;
                }
                return ImageSlider::widget([
                'nextPerv' => true, //Nút chuyển
                'indicators' => false, //Chấm trang
                'height' => '110px',
                'width' => '90px',
                'classes' => 'img-rounded', //Cuộn tròn, tự lặp lại ảnh
                'id' => 'mycarousel' . $data->id, //Băng truyền, Gán link trong vendor
                'images' => $listImage, //Mảng ảnh
            ]);
            },
            'headerOptions'=>[
                'style'=>'width=15px;text-align:center'
            ],
            'contentOptions'=>[
                'style'=>'width=15px;text-align:center'
            ],
        ],
    // [
    //     'attribute' => '',
    //     'format' => 'raw',
    //     'label' => 'Image',
    //     'value' => function ($data) {
    //         if ($data->image) {

    //             return Html::img('/storages/images/number/' . $data->image[0]->name, ['height'=>'110px','width'=>'90px']);
    //         }
    //     },
    //     'headerOptions'=>[
    //         'style'=>'width=15px;text-align:center'
    //     ],
    //     'contentOptions'=>[
    //         'style'=>'width=15px;text-align:center'
    //     ],
    // ],

        ['class' => 'yii\grid\ActionColumn'],
    ],
]); ?>


</div>
