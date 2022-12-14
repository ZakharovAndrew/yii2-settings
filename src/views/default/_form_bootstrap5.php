<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;
use ZakharovAndrew\settings\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\settings\models\Settings $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="settings-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="form">
        <?= $form->field($model, 'setting_group_id')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
        
        <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
