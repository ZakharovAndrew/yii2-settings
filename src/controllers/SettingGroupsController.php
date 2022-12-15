<?php

namespace ZakharovAndrew\settings\controllers;

use Yii;
use ZakharovAndrew\settings\models\Settings;
use ZakharovAndrew\settings\models\SettingsSearch;
use ZakharovAndrew\settings\models\SettingGroups;
use ZakharovAndrew\settings\models\SettingGroupsSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\AccessControl;

/**
 * SettingGroupsController implements the CRUD actions for SettingGroups model.
 */
class SettingGroupsController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                       'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all SettingGroups models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new SettingGroupsSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single SettingGroups model.
     * @param int $id ID
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new SettingGroups model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new SettingGroups();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['/settings']);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'bootstrapVersion' => Yii::$app->getModule('settings')->bootstrapVersion,
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing SettingGroups model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['/settings']);
        }

        return $this->render('update', [
            'bootstrapVersion' => Yii::$app->getModule('settings')->bootstrapVersion,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing SettingGroups model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['/settings']);
    }

    /**
     * Finds the SettingGroups model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return SettingGroups the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = SettingGroups::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
