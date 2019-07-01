<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\User */
/* @var $form yii\widgets\ActiveForm */

// $this->$title = 'Change Pasword';
// $this->params['breadcrumbs'][] = ['label' => 'Users', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'oldpassword')->passwordInput() ?>

    <?= $form->field($model, 'newpassword')->passwordInput() ?>

    <?= $form->field($model, 'renewpassword')->passwordInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
