<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use ZakharovAndrew\settings\Module;

/** @var yii\web\View $this */
/** @var app\models\SettingGroups $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="setting-groups-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form">
    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'key')->textInput(['maxlength' => true]) ?>
        
    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>
    </div>
    
    <div class="form-group">
        <?= Html::submitButton(Module::t('Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
