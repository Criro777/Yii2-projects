<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>

    <div class="leave-comment mr0"><!--leave comment-->
        <div class="row">
            <div class="col-md-7 col-md-offset-2">
                <div class="site-login">
                    <h1><?= Html::encode($this->title) ?></h1>

                    <p>Заполните следующие поля для входа на сайт:</p>

                    <?php $form = ActiveForm::begin([
                        'id' => 'login-form',
                        'layout' => 'horizontal',
                        'fieldConfig' => [
                            'template' => "{label}\n<div class=\"col-lg-4\">\n{input}</div>\n<div class=\"col-lg-2\">{error}</div>",
                            'labelOptions' => ['class' => 'col-lg-1 control-label'],
                        ],
                    ]); ?>

                    <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                    <?= $form->field($model, 'password')->passwordInput() ?>

                    <?= $form->field($model, 'rememberMe')->checkbox([
                        'template' => "<div class=\"col-lg-offset-1 col-lg-4\">{input} {label}</div>\n<div class=\"col-lg-2\">{error}</div>",
                    ]) ?>

                    <div class="form-group">
                        <div class="col-lg-offset-1 col-lg-11">
                            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                        </div>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
            <div class="col-md-2" style="margin-left: -3%;margin-top: 3%;">
                <!-- Put this script tag to the <head> of your page -->
                <script type="text/javascript" src="//vk.com/js/api/openapi.js?142"></script>

                <script type="text/javascript">
                    VK.init({apiId: 5945814});
                </script>

                <!-- Put this div tag to the place, where Auth block will be -->
                <div  id="vk_auth"></div>
                <script type="text/javascript">
                    VK.Widgets.Auth("vk_auth", {authUrl: '/auth/login-vk'});
                </script>
            </div>

        </div>
    </div>



