
<!--main content start-->
<div class="main-content">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <?php foreach($articles as $article):?>
                    <article class="post">
                        <div class="post-thumb">
                            <a href="<?= \yii\helpers\Url::toRoute(['site/view', 'id'=>$article->id]);?>"><img src="<?= $article->getImage();?>" alt=""></a>

                            <a href="<?= \yii\helpers\Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="post-thumb-overlay text-center">
                                <div class="text-uppercase text-center">посмотреть</div>
                            </a>
                        </div>
                        <div class="post-content">
                            <header class="entry-header text-center text-uppercase">
                                <h6><a href="<?= \yii\helpers\Url::toRoute(['site/category','id'=>$article->category->id])?>"> <?= $article->category->title; ?></a></h6>

                                <h1 class="entry-title"><a href="<?= \yii\helpers\Url::toRoute(['site/view', 'id'=>$article->id]);?>"><?= $article->title?></a></h1>


                            </header>
                            <div class="entry-content">
                                <p><?= $article->description?>
                                </p>

                                <div class="btn-continue-reading text-center text-uppercase">
                                    <a href="<?= \yii\helpers\Url::toRoute(['site/view', 'id'=>$article->id]);?>" class="more-link">Читать далее</a>
                                </div>
                            </div>
                            <div class="social-share">
                                <span class="social-share-title pull-left text-capitalize"><b><?= $article->author->name ?></b> ,  <?= $article->getDate();?></span>
                                <ul class="text-center pull-right">
                                    <li><a class="s-facebook" href="#"><i class="fa fa-eye"></i></a></li><?= (int) $article->viewed?>
                                </ul>
                            </div>
                        </div>
                    </article>
                <?php endforeach; ?>
                <?php
                echo \yii\widgets\LinkPager::widget([
                    'pagination' => $pagination,
                ]);
                ?>
            </div>
            <div class="col-md-4" data-sticky_column>
                <div class="primary-sidebar">

                    <aside class="widget">
                        <h3 class="widget-title text-uppercase text-center">Популярные записи</h3>
                        <?php foreach($popular as $article):?>
                        <div class="popular-post">


                            <a href="<?=\yii\helpers\Url::toRoute(['site/view','id'=>$article->id]);?>" class="popular-img"><img src="<?= $article->getImage();?>" alt="">

                                <div class="p-overlay"></div>
                            </a>

                            <div class="p-content">
                                <a href="<?= \yii\helpers\Url::toRoute(['site/view','id'=>$article->id])?>" class="text-uppercase"><?= $article->title;?></a>
                                <span class="p-date"><?= $article->date;?></span>

                            </div>
                        </div>
                        <?php endforeach; ?>
                    </aside>
                    <aside class="widget pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Последние записи</h3>

                        <?php foreach($recent as $article):?>
                        <div class="thumb-latest-posts">


                            <div class="media">
                                <div class="media-left">
                                    <a href="<?= \yii\helpers\Url::toRoute(['site/view','id'=>$article->id])?>" class="popular-img"><img src="<?= $article->getImage();?>" alt="">
                                        <div class="p-overlay"></div>
                                    </a>
                                </div>
                                <div class="p-content">
                                    <a href="<?= \yii\helpers\Url::toRoute(['site/view','id'=>$article->id])?>" class="text-uppercase"><?= $article->title;?></a>
                                    <span class="p-date"><?= $article->getDate();?></span>
                                </div>
                            </div>
                        </div>

                        <?php endforeach; ?>
                    </aside>
                    <aside class="widget border pos-padding">
                        <h3 class="widget-title text-uppercase text-center">Категории</h3>
                        <ul>
                            <?php foreach($categories as $category):?>
                            <li>
                                <a href="<?= \yii\helpers\Url::toRoute(['site/category','id'=>$category->id])?>"><?= $category->title?></a>
                                <span class="post-count pull-right"> (<?= $category->getArticles()->count();?>)</span>
                                <?php endforeach; ?>
                            </li>
                        </ul>
                    </aside>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end main content-->
<!--footer start-->
