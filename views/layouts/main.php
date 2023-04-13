<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use yii\bootstrap5\Html;
use app\controllers\SiteController;


AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

$existUser = SiteController::checkLogin();

if($_GET['type'] == 'logout')
    SiteController::logout();



?>
<?php $this->beginPage() ?>

<!doctype html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <?php $this->head() ?>
    <title><?= Html::encode($this->title) ?></title>
</head>
<body>
<?php $this->beginBody() ?>
<header>
    <div class="container d-flex justify-content-between align-items-center">
        <a href="/web/?r=site/index" class="logo">Blog Logo </a>

        <nav>
            <a href="/web/?r=site/index" class="me-3">Home</a>
            <a href="/web/?r=site/about">About</a>
            &nbsp;|&nbsp;
            <?php if($existUser) : ?>
            <span>Hello, <?= $existUser['username']; ?>!</span>
            <a href="/web/?r=site&type=logout">Logout</a>
            <?php else : ?>
            <a href="/web/?r=site/register">Register</a>
            <a href="/web/?r=site/login">Login</a>
            <?php endif; ?>
        </nav>
    </div>
</header>

<main>
    <div class="container py-3">
        <?= $content ?>
    </div>
</main>


<?php $this->endBody() ?>
</body>
</html>

<?php $this->endPage() ?>
