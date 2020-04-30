<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Change */
/* @var $form yii\widgets\ActiveForm */

$changeModel = new app\models\Change();
?>

<div class="change-form">

    <?php $newChangeForm = ActiveForm::begin(['id' => 'changeInfoForm']); ?>

    <?= $newChangeForm->field($changeModel, 'changes')->textarea(['rows' => 8]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success', 'id' => 'saveChangeBtn']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>