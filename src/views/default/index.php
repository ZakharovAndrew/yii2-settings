<?php

use ZakharovAndrew\settings\models\Settings;
use ZakharovAndrew\settings\Module;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\settings\models\SettingsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = Module::t('Settings');
$this->params['breadcrumbs'][] = $this->title;
$this->params['button'] = Html::a(Module::t('Create Setting group'), ['/setting-groups/create'], ['class' => 'btn btn-success']);
?>
<div class="settings-index">
    
    <?= $this->render( '_custom_breadcrumbs', [
        'bootstrapVersion' => $bootstrapVersion,
    ]) ?>

    <?php foreach ($groups as $group) {?>
    <div class="setting-group">
        <div class="setting-header"><?= $group->title; ?> 
    
            <?= Html::a('+ настройка', ['/settings/create', 'group_id' => $group->id], ['class' => 'btn btn-success btn-setting-group']) ?>
            <?=
            Html::a(
                '<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg>',            
                ['/setting-groups/delete', 'id' => $group->id],
                [
                    'class' => 'delete-settings-group',
                    'data' => [
                        'confirm' => Module::t('Are you sure you want to delete this item?'),
                        'method' => 'post',
                    ],
                    'title' => Module::t('Delete')
                ]
            ) ?>
            <?=Html::a('<svg aria-hidden="true" style="height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', ['/setting-groups/update', 'id' => $group->id], ['title' => 'Редактировать', 'class'=>'edit-settings-group'])?>
            
            
        </div>
        
        <div class="setting-group-body">
            <div class="row row-settings">
                <?php foreach ($settings[$group->id] ?? [] as $setting) {?>
                    <div class="col-md-5 setting-title">
                        <?= $setting->title ?>
                    </div>
                    <div class="col-md-5">
                        <input type="text" class="form-control" disabled="" value="<?= $setting->value ?>">
                        
                    </div>
                    <div class="col-md-2 setting-edit">
                        <?=Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', ['update', 'id' => $setting->id], ['title' => Module::t('Update'), 'class'=>'edit-settings'])?>
                        <?=Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg>', ['delete', 'id' => $setting->id], ['title' => Module::t('Delete'), 'data-confirm' => 'Удалить настройку?'])?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
    


</div>
