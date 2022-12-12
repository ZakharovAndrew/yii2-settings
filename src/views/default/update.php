<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Settings $model */

$this->title = 'Настройка: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['/settings/index']];
?>
<div class="settings-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
