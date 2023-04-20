<?php

namespace app\models;

use yii\db\ActiveRecord;



class Posts extends ActiveRecord
{
    static public function tableName()
    {
        return 'posts';
    }

    public function rules()
    {
        return [
            [['title'], 'required', 'message' => 'Title field required'],
            ['text', 'string'],
            ['status', 'in', 'range'=>[1,2,3]],
            ['tags', 'string']
        ];
    }

}



