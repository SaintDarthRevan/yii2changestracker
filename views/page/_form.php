<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\web\UploadedFile;
use yii\bootstrap\Modal;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $model app\models\Page */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="page-form">

    <?php $form = ActiveForm::begin(['id' => 'pageInfoForm', 'options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'preview')->fileInput() ?>


    <?php
        if (isset($model->id)) {
            echo $form->field($model, 'id')->hiddenInput(['value'=> $mode->id])->label(false);
        }
    ?>

    <?php
        if ($model->preview != null) {
            echo Html::img('/uploads/images/preview/'.$model->preview) . '<br /><br />';
        }
    ?>

    <?= $form->field($model, 'html')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<?php
    Modal::begin([
        'header' => '<h2>Регистрация изменений</h2>',
        'id' => 'changeInfoWindow'
    ]);

    echo $this->render('../change/_form', [
        'model' => $model,
    ]);

    Modal::end();

    $js = <<<JS
    $('#pageInfoForm').on('beforeSubmit', function() {
        
        $('#changeInfoWindow').modal('show');
        
        return false;
    });

    $('#changeInfoForm').on('beforeSubmit', function() {
        
        $('#changeInfoWindow').modal('hide');
        var data = $('#pageInfoForm').serialize();
        data = data + '&changeDescr=' + $('[name="Change[changes]"]').val();
        
        $.ajax({
            url: 'web/index.php?r=page/save',
            type: 'POST',
            data: data
        });
        
        return false;
    });
JS;

$this->registerJs($js);
?>
