<?php

namespace app\controllers;

use Yii;
use app\models\Users;
use yii\web\Controller;
use app\models\UsersForm;
use yii\data\ArrayDataProvider;

class UsersController extends Controller
{
    public function beforeAction($action) 
    { 
        $this->enableCsrfValidation = false; 
        return parent::beforeAction($action); 
    }

    public function actionForm(){
        return $this->render('create');
    }

    public function actionCreate(){
        $post = Yii::$app->request->post();
        echo "<p>";
        print_r($post['id']);
        echo '<br/>';
        print_r($post['name']);
        echo '<br/>';
        print_r($post['address']);
        echo '<br/>';
        print_r($post['email']);
        echo "</p>";
    }

    public function actionIndex(){

        $users = Users::find()->all();
        
        $provider = new ArrayDataProvider([
            'allModels' => $users,
            'pagination' => [
                'pageSize' => 10,
            ],
            'sort' => [
                'attributes' => ['id', 'address','email','name'],
            ],
        ]);

        return $this->render('index',[
            'provider' => $provider,
        ]);
    }

}