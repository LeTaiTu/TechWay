<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;


?>

<div class="user-form">
	<?php $form = ActiveForm::begin(); ?>

		<?= $form->field($model, 'userid')->dropDownList(ArrayHelper::map(\backend\models\UserModel::find()->all(), 'id', 'username')) ?>

		<?= $form->field($model, 'newpass')->passwordInput() ?>

		<?= $form->field($model, 'renewpass')->passwordInput() ?>

		<div class="form-group">
			<?= Html::submitButton('Update', ['class' => 'btn btn-success']) ?>
		</div>
	<?php ActiveForm::end();?>
</div>