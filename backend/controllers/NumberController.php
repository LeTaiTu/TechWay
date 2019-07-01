<?php

namespace backend\controllers;

use Yii;
use backend\models\Number;
use backend\models\NumberSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use common\models\UploadForm;
use common\controllers\CommonController;
use yii\filters\AccessControl;

/**
 * NumberController implements the CRUD actions for Number model.
 */
class NumberController extends CommonController
{
    /**
     * {@inheritdoc}
     */
     public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['login', 'error'],
                        'allow' => true,
                    ],
                    [
                        'allow' => true,
                        // 'actions' => ['index'],
                        'roles' => ['@'],
                        // 'matchCallback' => function($rule, $action){
                        //     $control = Yii::$app->controller->id;
                        //     $action = Yii::$app->controller->action->id;
                        //     $role = '/'.$control.'/'.$action;
                        //     if (Yii::$app->user->can($role)) {
                        //         return true;
                        //     }
                        // },
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }
    /**
     * Lists all Number models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new NumberSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Number model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Number model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Number();
        $upload = new UploadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
             //image
            $upload->imageFiles = UploadedFile::getInstances($upload, 'imageFiles');
            if ($upload->imageFiles) {
                $upload->upload($model->id, 'number');
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }else{
            return $this->render('create', [
                'model' => $model,
                'upload' => $upload
            ]);
        }
        
    }

    /**
     * Updates an existing Number model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $upload = new upLoadForm();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $upload->imageFiles = UploadedFile::getInstances($upload, 'imageFiles');
            if ($upload->imageFiles) {
                $upload->upload($model->id, 'number');
            }
            return $this->redirect(['view', 'id' => $model->id]);
        }
        else{
            return $this->render('update', [
                'model' => $model,
                'upload' => $upload,
            ]);
        }
    }

    /**
     * Deletes an existing Number model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Number model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Number the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Number::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
