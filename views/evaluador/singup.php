<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\Alert;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;
use app\helpers\MyHtml;
?>

<div class="row">
    <div class="col-md-5 col-sm-4 center-block">
        <h3 class="text-center">Registro de Evaluador</h3>

        <?php

            if ($result['error']) {
                echo Alert::widget([
                    'options' => [
                        'class' => 'notification alert-danger',
                    ],
                    'body' => $result['mensaje'],
                ]);
            } else if (Yii::$app->request->isPost && !$result['error']) {
                $this->registerJs('
                    location.href = "'.Url::toRoute(['site/login'], true).'?singup=true";
                ');
            }

            $form = ActiveForm::begin(['id' => 'singupForm']);
            ?>

        	<?= $form->errorSummary($model, ['class' => 'alert alert-danger']) ?>

            <?= $form->field($model, 'nombre', [
                'enableLabel' => false,
                'inputTemplate' => '<span class="block input-icon input-icon-right"> {input} </span>',
                'inputOptions' => ['autofocus placeholder' => $model->getAttributeLabel('nombre')]
            ])->textInput() ?>

            <?= $form->field($model, 'appat', [
                'enableLabel' => false,
                'inputTemplate' => '<span class="block input-icon input-icon-right"> {input} </span>',
                'inputOptions' => ['autofocus placeholder' => $model->getAttributeLabel('appat')]
            ])->textInput() ?>

            <?= $form->field($model, 'apmat', [
                'enableLabel' => false,
                'inputTemplate' => '<span class="block input-icon input-icon-right"> {input} </span>',
                'inputOptions' => ['autofocus placeholder' => $model->getAttributeLabel('apmat')]
            ])->textInput() ?>

            <?= $form->field($model, 'email', [
                'enableLabel' => false,
                'inputTemplate' => '<span class="block input-icon input-icon-right"> {input} </span>',
                'inputOptions' => ['autofocus placeholder' => $model->getAttributeLabel('email')]
            ])->textInput() ?>

            <?= $form->field($model, 'password_repeat', [
                'enableLabel' => false,
                'inputTemplate' => '<span class="block input-icon input-icon-right"> {input} </span>',
                'inputOptions' => ['placeholder' => 'Contraseña']
            ])->passwordInput() ?>

            <?= $form->field($model, 'password', [
                'enableLabel' => false,
                'inputTemplate' => '<span class="block input-icon input-icon-right"> {input} </span>',
                'inputOptions' => ['placeholder' => 'Confirmar Contraseña']
            ])->passwordInput() ?>

            <?= $form->field($model, 'captcha_code')->widget(Captcha::className(), [
                'imageOptions'=> [
                    'title' => 'Si te resulta complicado leer el código, da click sobre la imagen para actualizarla',
                    'data-toggle' => 'tooltip',
                ]
            ]); ?>

            <?= $form->field($model, 'acepto_politicas', [
                'checkboxTemplate' => "<div class=\"checkbox\">\n{input}\nAcepto las <a href=".URl::toRoute(['site/politicas'])." target=\"_blank\">politicas de privacidad</a>.\n{error}\n{hint}\n</div>"
            ])->checkbox() ?>
            <br><br>

            <div class="space"></div>

            <div class="text-right">
                <a class="btn btn-default" href="<?= URl::toRoute(['site/index']) ?>"><i class="fa fa-arrow-left"></i> Regresar</a>
                <button type="submit" id="btnAceptarSingup" class="width-35 btn btn-sm btn-primary">
                    <i class="ace-icon fa fa-check"></i>
                    <span class="bigger-110">Aceptar</span>
                </button>
            </div>

            <div class="space-4"></div>

        <?php ActiveForm::end(); ?>

    </div>
</div>