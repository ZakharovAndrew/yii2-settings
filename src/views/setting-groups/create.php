<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\SettingGroups $model */

$this->title = 'Добавить группу настроек';
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['/settings']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="setting-groups-create">

    <?= $this->render( '/default/_custom_breadcrumbs', [
        'bootstrapVersion' => $bootstrapVersion,
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
