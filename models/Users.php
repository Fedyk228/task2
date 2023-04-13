<?php

namespace app\models;

use yii\db\ActiveRecord;



class Users extends ActiveRecord
{

    static public function tableName()
    {
        return 'users';
    }

    public function rules()
    {
        return [
            [['email'], 'required', 'message' => 'Email field required'],
            [['password'], 'required', 'message' => 'Password field required'],
            ['username', 'string']
        ];
    }

}



