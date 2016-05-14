<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\PartidaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partida-search">
    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'jogo_id') ?>

    <?= $form->field($model, 'jogador_um') ?>

    <?= $form->field($model, 'jogador_dois') ?>

    <?= $form->field($model, 'jogador_vencedor') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
