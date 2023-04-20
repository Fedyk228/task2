<?php

/** @var controllers\SiteController $posts */

use yii\bootstrap5\ActiveForm;

$this->title = 'Blog Home Page';
?>

<h1>Posts page</h1>

<hr>

<div class="row">
    <?php
        if(sizeof($posts)) :
    foreach ($posts as $post) : ?>
        <div class="col-sm-6 my-1">
            <div class="card">
                <div class="card-body">
                    <em class="text-primary"><?= $post['pub_date'] ?></em>
                    <h5><?= $post['title'] ?></h5>
                    <p><?= $post['text'] ?></p>
                </div>
                <div class="card-footer">
                    <p><b>Author:</b> <?= $post['username'] ?></p>

                    <div class="row">
                        <div class="col-sm-6">
                            <?php ActiveForm::begin(); ?>
                                <p class="text-primary">Comments <?= $post['comments'] ?></p>
                                <a href="/web/?r=site/post&id=<?= $post['p_id'] ?>" class="btn btn-primary">Read</a>
                                <?php if($post['author_id'] == $user_id) : ?>
                                    <input type="hidden" name="p_id" value="<?= $post['p_id']; ?>">
                                <button class="btn btn-danger">Remove post</button>
                                <?php endif; ?>
                            <?php ActiveForm::end(); ?>
                        </div>
                        <div class="col-sm-6">
                            <?php
                            $tags = explode(',', $post['tags']);

                            foreach ($tags as $tag) :
                                ?>
                                <span class="badge bg-success"><?= $tag ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach;
        else :
    ?>
    <h1 class="text-muted">No posts</h1>
    <?php endif; ?>
</div>