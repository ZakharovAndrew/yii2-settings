<?php

use yii\bootstrap5\ActiveForm;
use yii\bootstrap5\Html;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\settings\models\Settings $model */
/** @var yii\widgets\ActiveForm $form */
?>
<style>
    .setting-group-body, .setting-group, .form {
        border-radius:6px;background:#fff;
    }
    body {
        background-color: #f8f9fa;
    }
    .setting-group, .form {
        margin-bottom: 15px;
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }
    .form {
        padding:15px;
    }
</style>

<div class="settings-form">
    <?php $form = ActiveForm::begin(); ?>

    <div class="form">
        <?= $form->field($model, 'setting_group_id')->hiddenInput()->label(false) ?>

        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>

        <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
