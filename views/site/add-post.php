<?php

/** @var controllers\SiteController $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>

<h1>Add post</h1>

<div class="row">
    <div class="col-sm-6 offset-3">
        <?php $form=  ActiveForm::begin(); ?>
            <div class="py-1">
                <?= $form->field($model, 'title')->textInput(); ?>
            </div>
            <div class="py-1">
                <?= $form->field($model, 'text')->textarea(); ?>
            </div>
            <div class="py-1">
                <?= $form->field($model, 'status')->dropDownList([
                    '1' => '1',
                    '2' => '2',
                    '3'=>'3'
                ]); ?>
            </div>
            <div class="py-1">
                <?= $form->field($model, 'tags')->textInput(); ?>
            </div>
            <div class="py-1">
                <button class="btn btn-success">Add post</button>
            </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>