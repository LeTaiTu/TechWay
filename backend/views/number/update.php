<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Number */

$this->title = 'Update Number: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="number-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
    ]) ?>

</div>
