<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use backend\models\Countries;
use yii\helpers\ArrayHelper;
use kartik\file\FileInput;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model backend\models\Number */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="number-form">

    <?php $form = ActiveForm::begin(); ?>
    <?= $form->field($upload, 'imageFiles')->widget(FileInput::classname(), ['options' => ['accept' => 'image/*', 'multiple' => true],]);?>
    <?= $form->field($model, 'num')->textInput(['maxlength' => true]) ?>
    <?= $form->field($model, 'code_country')->dropDownList(ArrayHelper::map(Countries::find()->all(),'code','name'),
        [
          'prompt'=> 'Chọn thành phố',
       ]
   ) ?>
   <div class="form-group">
    <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>

</div>
