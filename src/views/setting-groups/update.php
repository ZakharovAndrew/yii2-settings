<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SettingGroups $model */

$this->title = 'Группа настроек: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['/settings']];
?>
<div class="setting-groups-update">

    <?= $this->render( '/default/_custom_breadcrumbs', [
        'bootstrapVersion' => $bootstrapVersion,
    ]) ?>
    
    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
