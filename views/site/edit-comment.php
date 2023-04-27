<?php

/** @var controllers\SiteController $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>

<h1>Edit comment</h1>

<div class="row">
    <div class="col-sm-6 offset-3">
        <?php $form=  ActiveForm::begin(); ?>
            <div class="py-1">
                <?= $form->field($model, 'author')->textInput(); ?>
            </div>
            <div class="py-1">
                <?= $form->field($model, 'text')->textarea(); ?>
            </div>
            <div class="py-1">
                <button class="btn btn-success">Save comment</button>
            </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>