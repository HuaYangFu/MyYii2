<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use yii\web\Controller;
use yii\data\Pagination;
use app\models\UsersForm;
use yii\widgets\ListView;
use app\models\UsersModel;
use yii\data\ArrayDataProvider;

class UsersController extends Controller
{
    public function beforeAction($action) 
    { 
        return parent::beforeAction($action); 
    }

    public function actionIndex(){
        
        $users = Users::find()->all();
        $pageSummary = "testsum";

        $provider = new ArrayDataProvider([
            'allModels' => $users,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        return $this->render('index',[
            'provider' => $provider,
            'pageSummary' => $pageSummary,
            'users' => $users
        ]);
    }

    public function actionSearch(){
        
        $post = Yii::$app->request->post();
        $users = null;
        $pageSummary = "testsum";
        if(!empty($post)){
            $users = UsersModel::MySearch($post);
        }
        else{
            $users = Users::find()->all();
        }


        $provider = new ArrayDataProvider([
            'allModels' => $users,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);
        
        return $this->render('index',[
            'provider' => $provider,
            'pageSummary' => $pageSummary,
        ]);
    }

    public function actionCreate(){
        $post = Yii::$app->request->post();
        if(!empty($post)){
            
            $createResult = UsersModel::MyCreate($post);

            if ($createResult !== false) {
                return $this->redirect(['index']);
            } 
            else {
                $errorMessage = "createError";
                return $this->redirect(['index']);
            }
            
        }
        else{
            $user = new Users; 
            
            return $this->render('create',[
                'user' => $user,
            ]);
        }
    }

    public function actionUpdate(){
        $get = Yii::$app->request->get();
        $post = Yii::$app->request->post();
        if(!empty($post)){
            
            $updateResult = UsersModel::MyUpdate($post);

            if ($updateResult !== false) {
                return $this->redirect(['index']);
            } 
            else {
                $errorMessage = "updateError";
                return $this->redirect(['index']);
            }

        }
        else{
            $user = Users::findOne(['id' => $get['id']]);
            
            return $this->render('update',[
                'user' => $user,
            ]);
        }

    }

    public function actionDelete(){
        $get = Yii::$app->request->get();
        $id = $get['id'];
        if(!empty($id)){
            $user = Users::findOne(['id' => $id]);
            if ($user->delete() !== false) {
                return $this->redirect(['index']);
            } 
            else {
                $errorMessage = "deleteError";
                return $this->redirect(['index']);
            }
        }
        else{
            $errorMessage = "deleteError";
            return $this->redirect(['index']);
        }
    }

    public function actionTest(){
        $post = Yii::$app->request->post();
        $get = Yii::$app->request->get();
        $users = Users::find()->all();
        return $this->render('test',[
            'users' => $users,
        ]);
    }
    

}