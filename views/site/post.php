<?php

/** @var controllers\SiteController $post */

use yii\bootstrap5\ActiveForm;



?>

    <a href="/web/" class="btn btn-primary">Go back</a>
    <hr>
    <em class="text-primary"><?= $post['pub_date'] ?></em>
    <h1><?= $post['title'] ?></h1>
    <p><?= $post['text'] ?></p>
    <p><b>Author:</b> <?= $post['username'] ?></p>

<?php
$tags = explode(',', $post['tags']);

foreach ($tags as $tag) :
    ?>
    <span class="badge bg-success"><?= $tag ?></span>
<?php endforeach; ?>

    <hr>

    <h4>Comments <a href="/web/?r=site/add-comment&id=<?= $post['p_id'] ?>" class="btn btn-secondary">Add comment</a> </h4>

<?php if(sizeof($comments)) : ?>
    <div class="list-group">
        <?php foreach ($comments as $comment) : ?>
            <div class="list-group-item">
                <p><?= $comment['text'] ?></p>
                <div class="row">
                    <div class="col-sm-4">
                        <em class="text-primary"><?= $comment['pub_date'] ?></em>
                    </div>
                    <div class="col-sm-4">
                        <p><b>Author:</b> <?= $comment['author'] ?></p>
                    </div>
                    <div class="col-sm-4 text-end">
                        <?php ActiveForm::begin(); ?>
                            <?php if($post['author_id'] == $user_id) : ?>
                                <input type="hidden" name="comment_id" value="<?= $comment['id']; ?>">
                                <a class="btn btn-secondary" href="/web/?r=site/edit-comment&id=<?= $comment['id'] ?>">Edit comment</a>
                                <button class="btn btn-danger">Remove comment</button>
                            <?php endif; ?>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <h1 class="text-muted">No comments</h1>
<?php endif; ?>