<?php

/** @var controllers\SiteController $posts */

$this->title = 'Blog Home Page';
?>

<h1>Posts page</h1>

<hr>

<div class="row">
    <?php foreach ($posts as $post) : ?>
        <div class="col-sm-6 my-1">
            <div class="card">
                <div class="card-body">
                    <em class="text-primary"><?= $post['pub_date'] ?></em>
                    <h5><?= $post['title'] ?></h5>
                    <p><?= $post['text'] ?></p>
                </div>
                <div class="card-footer">
                    <p><b>Author:</b> <?= $post['author'] ?></p>

                    <div class="row">
                        <div class="col-sm-6">
                            <p class="text-primary">Comments <?= $post['comments'] ?></p>
                            <a href="/web/?r=site/post&id=<?= $post['id'] ?>" class="btn btn-primary">Read</a>
                        </div>
                        <div class="col-sm-6">
                            <?php
                            $tags = json_decode($post['tags'], true);

                            foreach ($tags as $tag) :
                                ?>
                                <span class="badge bg-success"><?= $tag ?></span>
                            <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>