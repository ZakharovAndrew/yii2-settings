<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Settings $model */

$this->title = 'Настройка: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Настройки', 'url' => ['/settings']];
?>
<div class="settings-update">

    <h1><?= Html::encode($this->title) ?></h1>
    
     <?= $this->render( $bootstrapVersion == 5 ? '_form_bootstrap5' : '_form', [
        'model' => $model,
    ]) ?>

</div>
