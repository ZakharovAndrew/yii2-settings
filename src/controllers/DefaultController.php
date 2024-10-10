<?php

namespace ZakharovAndrew\settings\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\web\Controller;
use ZakharovAndrew\settings\models\Settings;
use ZakharovAndrew\settings\models\SettingsSearch;
use ZakharovAndrew\settings\models\SettingGroups;

/**
 * DefaultController implements the CRUD actions for Settings model.
 * @author Andrew Zakharov https://github.com/ZakharovAndrew
 */
class DefaultController extends Controller
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
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->hasRole('admin');
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Settings models.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index', [
            'groups' => SettingGroups::find()->orderBy('id ASC')->all(),
            'bootstrapVersion' => Yii::$app->getModule('settings')->bootstrapVersion,
            'settings' => Settings::groupByGroup()
        ]);
    }

    /**
     * Displays a single Settings model.
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
     * Creates a new Settings model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate($group_id = null)
    {
        $model = new Settings();
        if($group_id) {
            $model->setting_group_id = $group_id;
        }

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', "Настройки добавлена");
                return $this->redirect(['index']);
            } else {
                Yii::$app->session->setFlash('error', "Ошибка добавления настроек".var_export($model->errors, true));
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
     * Updates an existing Settings model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $id ID
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'bootstrapVersion' => Yii::$app->getModule('settings')->bootstrapVersion,
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Settings model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $id ID
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Settings model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $id ID
     * @return Settings the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Settings::findOne(['id' => $id])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
