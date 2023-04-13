<?php

/** @var controllers\SiteController $model */
/** @var controllers\SiteController $err */

use yii\bootstrap5\ActiveForm;

?>

<h1>Login page</h1>

<div class="row">
    <div class="col-sm-6 offset-3">
        <?php $form=  ActiveForm::begin(); ?>

        <div class="py-1">
            <?= $form->field($model, 'email')->textInput(); ?>
        </div>
        <div class="py-1">
            <?= $form->field($model, 'password')->textInput(); ?>
        </div>

        <div class="py-1">
            <button class="btn btn-success">Login</button>
        </div>

        <p class="text-danger"><?= $err ?></p>

        <?php ActiveForm::end(); ?>

    </div>
</div>