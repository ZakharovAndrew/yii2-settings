<?php

use ZakharovAndrew\settings\models\Settings;
use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var ZakharovAndrew\settings\models\SettingsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Настройки';
$this->params['breadcrumbs'][] = $this->title;
$this->params['button'] = Html::a('Добавить группу', ['/setting-groups/create'], ['class' => 'btn btn-success']);
?>
<style>
    body {
        background-color: #f8f9fa;
    }
    .setting-header {
        background:#9c27b0;color:#fff;
        font-size:16px;
        padding:8px 19px;
        font-weight: bold;
        border-radius:6px 6px 0 0;
    }
    .edit-settings-group {
        display:none;
        float:right;
    }
    .edit-settings-group {color:#fff;padding-right:15px}
    .setting-header:hover .edit-settings-group {
        display:inline-block;;
        color: #fffffff5;
    }
    .btn-setting-group {
        font-size: 14px;
        background-color: #00000033;
        border: 1px solid #00000036;
        float: right;
        padding: 0px 6px 2px;
    }
    .btn-setting-group:hover {
        background-color: #0000006e;border: 1px solid #00000063;
    }
    .setting-group-body, .setting-group, .form {
        border-radius:6px;background:#fff;
    }
    .setting-group-body::after {
        clear: both;
        content: '';
    }
    .setting-group, .form {
        margin-bottom: 15px;
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }
    .setting-header .edit-settings-group:hover {
        color: #fff;
    }
    .row-settings {
        padding:15px;
    }

    .setting-code {
        color:#ebebeb;
    }
    .row-settings .form-control {
        margin-bottom: 10px;
    }
    .setting-title {
        text-align: right;
        margin-top: 4px;
    }
    .col-md-2 {padding-top:6px}
    .col-md-2 a {color:#919191;padding-right:4px}
    .col-md-2 a:hover {color:#9c27b0;}
    .edit-settings {
        top:10px
    }
    
</style>
<div class="settings-index">
    
    <h1><?= Html::encode($this->title) ?></h1>

    <?php foreach ($groups as $group) {?>
    <div class="setting-group">
        <div class="setting-header"><?= $group->title; ?> 
    
            <?= Html::a('+ настройка', ['create', 'group_id' => $group->id], ['class' => 'btn btn-success btn-setting-group']) ?>
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
                        <?=Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:1em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512"><path fill="currentColor" d="M498 142l-46 46c-5 5-13 5-17 0L324 77c-5-5-5-12 0-17l46-46c19-19 49-19 68 0l60 60c19 19 19 49 0 68zm-214-42L22 362 0 484c-3 16 12 30 28 28l122-22 262-262c5-5 5-13 0-17L301 100c-4-5-12-5-17 0zM124 340c-5-6-5-14 0-20l154-154c6-5 14-5 20 0s5 14 0 20L144 340c-6 5-14 5-20 0zm-36 84h48v36l-64 12-32-31 12-65h36v48z"></path></svg>', ['update', 'id' => $setting->id], ['title' => 'Редактировать', 'class'=>'edit-settings'])?>
                        <?=Html::a('<svg aria-hidden="true" style="display:inline-block;font-size:inherit;height:1em;overflow:visible;vertical-align:-.125em;width:.875em" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512"><path fill="currentColor" d="M32 464a48 48 0 0048 48h288a48 48 0 0048-48V128H32zm272-256a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zm-96 0a16 16 0 0132 0v224a16 16 0 01-32 0zM432 32H312l-9-19a24 24 0 00-22-13H167a24 24 0 00-22 13l-9 19H16A16 16 0 000 48v32a16 16 0 0016 16h416a16 16 0 0016-16V48a16 16 0 00-16-16z"></path></svg>', ['delete', 'id' => $setting->id], ['title' => 'Удалить', 'data-confirm' => 'Удалить настройку?'])?>
                    </div>
                <?php } ?>
            </div>
        </div>
    </div>
    <?php } ?>
    


</div>
