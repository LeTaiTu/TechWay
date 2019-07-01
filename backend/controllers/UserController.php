<?php

namespace backend\controllers;

use Yii;
use backend\models\UserModel;
use backend\models\UserSearch;
use yii\data\ActiveDataProvider; 
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\models\Signup;
use backend\models\ChangePassword;
use backend\models\UpdatePass;
use \common\models\User;
use common\controllers\CommonController;
use yii\filters\AccessControl;

/**
 * UserController implements the CRUD actions for User model.
 */
class UserController extends CommonController
{
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        // $model = new UserModel();
        $model = new Signup();
        if($model->load(Yii::$app->request->post()) && $model->signup()) {
            return $this->redirect(['index']);
        }
        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $model->updated_at = time();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['index']);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    public function actionChangepassword(){
        $model = new ChangePassword();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $admin = User::findIdentity(Yii::$app->user->identity->id);
            $admin->password_hash = Yii::$app->security->generatePasswordHash($model->newpassword);
            $admin->updated_at = time();
            if ($admin->save()) {
                Yii::$app->getSession()->setFlash('success', 'Đổi mật khẩu thành công');
                return $this->redirect(['index']);
            } else {
                Yii::$app->getSession()->setFlash('warning', 'Đổi mật khẩu thất bại');
            }
            
        }
        return $this->render('changepassword',[
            'model' => $model,
        ]);
    }

    public function actionUpdatepass(){
        $model = new UpdatePass();
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $admin = User::findIdentity($model->userid);
            $admin->password_hash = Yii::$app->security->generatePasswordHash($model->newpass);
            $admin->updated_at = time();
            if ($admin->save()) {
                Yii::$app->getSession()->setFlash('success', 'Đổi mật khẩu thành công');
                return $this->redirect(['index']);
            }
            else{
                Yii::$app->getSession()->setFlash('warning', 'Đổi mật khẩu thất bại');
            }
        }
        return $this->render('updatepass',[
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserModel::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
