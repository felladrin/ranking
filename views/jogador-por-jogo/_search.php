<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JogadorPorJogoSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogador-por-jogo-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'jogador_id') ?>

    <?= $form->field($model, 'jogo_id') ?>

    <?= $form->field($model, 'torneios') ?>

    <?= $form->field($model, 'titulos') ?>

    <?= $form->field($model, 'vitorias') ?>

    <?php // echo $form->field($model, 'derrotas') ?>

    <?php // echo $form->field($model, 'pontos') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
