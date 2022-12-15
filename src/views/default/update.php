<?php

use yii\helpers\Html;
use ZakharovAndrew\settings\Module;

/** @var yii\web\View $this */
/** @var app\models\Settings $model */

$this->title = Module::t('Setting') . ': ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => Module::t('Settings'), 'url' => ['/settings']];
?>
<div class="settings-update">

    <?= $this->render( '_custom_breadcrumbs', [
        'bootstrapVersion' => $bootstrapVersion,
    ]) ?>
    
     <?= $this->render( $bootstrapVersion == 5 ? '_form_bootstrap5' : '_form', [
        'model' => $model,
    ]) ?>

</div>
