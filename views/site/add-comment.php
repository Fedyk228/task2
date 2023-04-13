<?php

/** @var controllers\SiteController $model */

use yii\bootstrap5\Html;
use yii\bootstrap5\ActiveForm;

?>

<h1>Add comment</h1>

<div class="row">
    <div class="col-sm-6 offset-3">
        <?php $form=  ActiveForm::begin(); ?>
            <div class="py-1">
                <?= $form->field($model, 'author')->textInput(); ?>
            </div>
            <div class="py-1">
                <?= $form->field($model, 'text')->textarea(); ?>
                <input type="hidden" name="post_id" value="<?= $_GET['id'] ?>">
            </div>
            <div class="py-1">
                <button class="btn btn-success">Add comment</button>
            </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>