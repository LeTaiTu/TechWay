<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Number */

$this->title = 'Create Number';
$this->params['breadcrumbs'][] = ['label' => 'Numbers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="number-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'upload' => $upload,
    ]) ?>

</div>
