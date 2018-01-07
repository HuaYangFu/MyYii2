<?php

namespace app\models\users;

use Yii;

/**
 * This is the model class for table "users".
 *
 * @property string $id
 * @property string $address
 * @property string $email
 * @property string $username
 */
class UsersRepository extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'users';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['address', 'email', 'username'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'address' => 'Address',
            'email' => 'Email',
            'username' => 'Username',
        ];
    }
}
