<?php

/** @var controllers\SiteController $model */
/** @var controllers\SiteController $success */
/** @var controllers\SiteController $err */

use yii\bootstrap5\ActiveForm;

?>

<h1>Register page</h1>

<div class="row">
    <div class="col-sm-6 offset-3">
        <?php $form=  ActiveForm::begin(); ?>
        <div class="py-1">
            <?= $form->field($model, 'username')->textInput(); ?>
        </div>
        <div class="py-1">
            <?= $form->field($model, 'email')->textInput(); ?>
        </div>
        <div class="py-1">
            <?= $form->field($model, 'password')->textInput(); ?>
        </div>
        <div class="py-1">
            <label class="form-label" for="users-r-password">Repeat password</label>
            <input type="text" id="users-r-password" class="form-control" name="r_password">
        </div>
        <div class="py-1">
            <button class="btn btn-success">Register</button>
        </div>

        <p class="text-success"><?= $success ?></p>
        <p class="text-danger"><?= $err ?></p>

        <?php ActiveForm::end(); ?>

    </div>
</div>