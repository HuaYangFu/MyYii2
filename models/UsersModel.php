<?php

namespace app\models;

use app\models\Users;

class UsersModel extends Users{
    
    public function MyCreate($post){
        $users = new UsersModel();
        $filterpost = array_filter($post); 
        unset($filterpost['_csrf']);
        foreach($filterpost as $key => $value){
            $users->$key = $value;
        }
        return $users->save();
    }

    public function MySearch($post){
        $sql = "select * from users where 1 = 1";
        $params = [];

        if(!empty($post['username'])){
            $sql = $sql." and  username = :username ";
            $params[':username'] = $post['username'];
        }

        return self::getDb()->createCommand($sql,$params)->queryAll();
    }

    public function MyUpdate($post){
        $id = $post['id'];
        $user = null;
        if(!empty($id)){
            $user = UsersModel::findOne(['id' => $id]);
        }

        $filterpost = array_filter($post); 
        unset($filterpost['_csrf']);
        foreach($filterpost as $key => $value){
            $user->$key = $value;
        }
        return $user->update();
    }

}
