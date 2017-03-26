<div class="admin-default-index">
    <h1>Админка</h1>
    <h3>
        Здесь Вы можете добавлять, редактировать и удалять контент на сайте.
    </h3><br>
    <p class="lead">
        Выберите раздел, который необходимо изменить:
    </p><br>
    <ul class="lead">
        <li><a><a href="<?= \yii\helpers\Url::toRoute(['/admin/article/index'])?>">Статьи</a></li>
        <li><a><a href="<?= \yii\helpers\Url::toRoute(['/admin/category/index'])?>">Категории</a></li>
        <li><a><a href="<?= \yii\helpers\Url::toRoute(['/admin/comment/index'])?>">Комментарии</a></li>
    </ul>
</div>
