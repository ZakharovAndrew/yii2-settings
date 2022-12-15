<?php

use yii\helpers\Html;
use ZakharovAndrew\settings\Module;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\settings\models\Settings $model */

$this->title = Module::t('Create setting');
$this->params['breadcrumbs'][] = ['label' => Module::t('Setting'), 'url' => ['/settings']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="settings-create">

    <?= $this->render( '_custom_breadcrumbs', [
        'bootstrapVersion' => $bootstrapVersion,
    ]) ?>
    
    <?= $this->render( $bootstrapVersion == 5 ? '_form_bootstrap5' : '_form', [
        'model' => $model,
    ]) ?>
    
</div>
