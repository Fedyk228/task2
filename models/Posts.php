<?php

namespace app\models;

use yii\db\ActiveRecord;



class Posts extends ActiveRecord
{
    static public function tableName()
    {
        return 'posts';
    }

}



