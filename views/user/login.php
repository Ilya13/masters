<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Пожалуйста, заполните следующие поля для авторизации:</p>

    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-md-3\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-md-1 control-label'],
        ],
    ]); ?>

    <?= $form->field($model, 'username') ?>

    <?= $form->field($model, 'password')->passwordInput() ?>

    <?= $form->field($model, 'rememberMe', [
        'template' => "<div class=\"col-md-offset-1 col-md-3\">{input}</div>\n<div class=\"col-md-8\">{error}</div>",
    ])->checkbox() ?>

    <div class="form-group">
        <div class="col-md-offset-1 col-md-11">
            <?= Html::submitButton('Войти', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
        </div>
    </div>

    <?php ActiveForm::end(); ?>

    <div class="col-md-offset-1" style="color:#999;">
        Вы можите зайти как <strong>ilya/gfhjkm</strong>.
    </div>
</div>
