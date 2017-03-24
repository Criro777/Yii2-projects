<?php

use app\models\Category;
use app\models\Tag;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <label class="control-label" for="category">Категория</label>
        <?= Html::dropDownList('category', $model->category, ArrayHelper::map(Category::find()->all(), 'id', 'title'), ['class' => 'form-control select_cat']) ?>
    </div>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'content')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <label class="control-label" for="tags">Теги</label>

        <?= Html::dropDownList('tags', ArrayHelper::getColumn($model->getTags()->select('id')->asArray()->all(), 'id'), ArrayHelper::map(Tag::find()->all(), 'id', 'title'), ['class' => 'form-control select2', 'multiple'=>true]) ?>
    </div>

    <?= $form->field($model, 'image')->fileInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Создать' : 'Обновить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
