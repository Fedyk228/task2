<?php

/** @var controllers\SiteController $post */

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
                    <div class="col-sm-6">
                        <em class="text-primary"><?= $comment['pub_date'] ?></em>
                    </div>
                    <div class="col-sm-6">
                        <p><b>Author:</b> <?= $comment['author'] ?></p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
<?php else : ?>
    <h1 class="text-muted">No comments</h1>
<?php endif; ?>