<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <p>
        <?= Html::a('Update Password', ['updatepass'], ['class' => 'btn btn-primary']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            // 'auth_key',
            // 'password_hash',
            // 'password_reset_token',
            'email:email',
            [
                'attribute' => 'status',
                'value' => function($data){
                    if ($data->status==10) {
                        return 'Active';
                    }elseif ($data->status==0) {
                        return 'Lock';
                    }elseif ($data->status==9) {
                        return 'InActive';
                    }else{
                        return 'None';
                    }
                }
            ],
            //'created_at',
            //'updated_at',
            [
                'attribute' => 'created_at',
                'content' => function($model){
                    return date("G\hi\p, d-m-Y",$model->created_at);
                }
            ],
            [
                'attribute' => 'updated_at',
                'content' => function($model){
                    return date("G\hi\p, d-m-Y",$model->updated_at);
                }
            ],

            // 'verification_token',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
