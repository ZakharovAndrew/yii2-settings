<?php

use yii\helpers\Html;
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
    .edit-settings-group, .delete-settings-group {
        display:none;
        float:right;
    }
    .edit-settings-group, .delete-settings-group {color:#fff;padding-right:15px}
    .setting-header:hover .edit-settings-group, .setting-header:hover .delete-settings-group {
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
    @media (min-width: 768px) {
        .navbar-expand-md .navbar-nav .nav-link {
            padding-right: 1.1rem;
            padding-left: 1.1rem;
        }
        .button-block {
            text-align: right;
            margin-top:13px;
        }
    }
    .breadcrumb {background: none !important; padding:0 !important;}
    .page-header h1 {
        font-size: 2.0rem;line-height:1;
    }
    .btn-success {
        background:#9c27b0;color:#fff;
        border: 1px solid #00000036;
    }
    .btn-success:hover, .btn-success:active {
        background-color: #591664;border: 1px solid #00000063;
    }
    .setting-group, .form {
        margin-bottom: 15px;
        box-shadow: 0 20px 27px 0 rgb(0 0 0 / 5%);
    }
    .form {
        padding:15px;
    }
    .setting-header .btn-success:hover {
        background-color: #0000006e;border: 1px solid #00000063;
    }
    .setting-group-body, .setting-group, .form {
        border-radius:6px;background:#fff;
    }
    .btn-setting-group {
        font-size: 14px;
        background-color: #00000033;
        border: 1px solid #00000036;
        float: right;
        padding: 0px 6px 2px;
    }
    .edit-settings-group {
        padding-right: 10px;
    }
</style>
<div class="row page-header">
    <div class="col-md-6 col-12">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php
        if ($bootstrapVersion == 5) {
            echo yii\bootstrap5\Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]);
        } else {
            echo \yii\widgets\Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]); 
        }
        $this->params['breadcrumbs'] = [];?>
    </div>
    <div class="col-md-6 col-12 button-block">
        <?= isset($this->params['button']) ? $this->params['button'] : '' ?>
    </div>
</div>