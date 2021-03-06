<?php
/* @var $this \yii\web\View */
/* @var $content string */
use app\assets\PublicAsset;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

PublicAsset::register($this);
?>
<?php $this->beginPage() ?>
    <!DOCTYPE html>
    <html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
    <?php $this->beginBody() ?>

    <nav class="navbar main-menu navbar-default">
        <div class="container">
            <div class="menu-content">
                <!-- Brand and toggle get grouped for better mobile display -->
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse"
                            data-target="#bs-example-navbar-collapse-1">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a style="margin-top: -5px; margin-left: 15px;" class="navbar-brand" href="/"><img
                            src="/public/images/logo.png" alt=""></a>
                </div>


                <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">

                    <ul class="nav navbar-nav text-uppercase">
                        <li><a href="/">Главная</a>

                        </li>
                    </ul>
                    <div class="i_con">
                        <ul class="nav navbar-nav text-uppercase">
                            <?php if (Yii::$app->user->isGuest): ?>
                                <li><a href="<?= Url::toRoute(['auth/login']) ?>">Вход</a></li>
                                <li><a href="<?= Url::toRoute(['auth/signup']) ?>">Регистрация</a></li>
                            <?php else: ?>
                                <?= Html::beginForm(['/auth/logout'], 'post')
                                . Html::submitButton(
                                    'Выход (' . Yii::$app->user->identity->name . ')',
                                    ['class' => 'btn btn-link logout', 'style' => "padding-top:10px;"]
                                )
                                . Html::endForm() ?>
                            <?php endif; ?>
                        </ul>
                    </div>

                </div>
                <!-- /.navbar-collapse -->
            </div>
        </div>
        <!-- /.container-fluid -->
    </nav>


    <?= $content ?>


    <footer class="footer-widget-section">
        <div class="container>
            <div class="row">
                    <div style="padding: 20px 0 10px 0;" class="text-center">
                        <div  class="about-img"><img src="/public/images/logo2.png" alt="">
                        </div>
                        <div class="address">

                            <p> E-мэйл: awesome@service.com</p>
                            <p> Телефон: +123 456 78900</p>
                        </div>
                    </div>
            </div>
        </div>

        <div class="footer-copy">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="text-center">&copy; 2017 <a href="#">Awesome blog </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>

    <?php $this->endBody() ?>

    </body>
    </html>
<?php $this->endPage() ?>