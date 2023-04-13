<?php

namespace app\controllers;

use Yii;
use yii\web\Controller;
use app\models\Posts;
use app\models\Comments;
use app\models\Users;



class SiteController extends Controller
{

    static public function checkLogin()
    {
        if($_COOKIE['auth'])
        {
            $existUser = Users::find()->where(['authKey' => $_COOKIE['auth']])->asArray()->one();
        }

        return $existUser;
    }

    static public function logout()
    {
        setcookie('auth', null, time());

        return Yii::$app->controller->goHome();
    }

    public function actionIndex()
    {
        $posts = Posts::find()->asArray()->all();
        $comments = Comments::find()->asArray()->all();

        $result = [];

        foreach ($posts as $i => $post)
        {
            $count = 0;
            foreach ($comments as $comment)
            {
                if($post['id'] == $comment['post_id'])
                    $count++;
            }

            $result[] = $post;

            $result[$i]['comments'] = $count;
        }

        return $this->render('index', ['posts' => $result]);
    }

    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionPost()
    {
        $post = Posts::find()->asArray()->where(['id' => $_GET['id']])->one();
        $comments = Comments::find()->asArray()->where(['post_id' => $_GET['id']])->all();

        return $this->render('post', ['post' => $post, 'comments' => $comments]);
    }

    public function actionAddComment()
    {
        $model = new Comments();

        if($model->load(Yii::$app->request->post()))
        {
            $model->pub_date = Date('d.m.Y - H:i');
            $model->post_id = Yii::$app->request->post()['post_id'];

            if($model->save())
                return $this->goBack();

        }



        return $this->render('add-comment', ['model' => $model]);
    }

    public function actionRegister()
    {
        $model = new Users();


        if($model->load(Yii::$app->request->post()))
        {
            $existUser = Users::find()->where(['email' => Yii::$app->request->post()['Users']['email']])->one();

            if(Yii::$app->request->post()['Users']['password'] != Yii::$app->request->post()['r_password'])
                $err = 'Repeat password incorrect';
            else if(!$existUser)
            {
                $model->reg_date = Date('d.m.Y - H:i');
                $model->authKey = md5(Yii::$app->request->post()['Users']['email'] . time());

                if($model->save())
                    $success = 'Register success';
            }
            else
                $err = 'This email is already';
        }


        return $this->render('register', ['model' => $model, 'success' => $success, 'err' => $err]);
    }

    public function actionLogin()
    {
        $model = new Users();

        if($model->load(Yii::$app->request->post()))
        {
            $existUser = Users::find()->where(['email' => Yii::$app->request->post()['Users']['email'], 'password' => Yii::$app->request->post()['Users']['password']])->asArray()->one();

            if($existUser)
            {
                setcookie('auth', $existUser['authKey'], time() + 3600);
                return $this->goBack();
            }

            $err = 'Incorrect login or password';
        }


        return $this->render('login', ['model' => $model, 'err' => $err]);
    }


}


