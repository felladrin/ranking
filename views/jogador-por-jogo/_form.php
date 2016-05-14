<?php

use app\models\Jogador;
use app\models\Jogo;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\JogadorPorJogo */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="jogador-por-jogo-form">
    <?php $form = ActiveForm::begin(); ?>

    <?php
    $jogos = ArrayHelper::map(Jogador::find()->select([
        'id',
        'nome'
    ])->orderBy('nome')->all(), 'id', 'nome');
    echo $form->field($model, 'jogador_id')->dropDownList($jogos);
    ?>

    <?php
    $jogos = ArrayHelper::map(Jogo::find()->select([
        'id',
        'nome'
    ])->orderBy('nome')->all(), 'id', 'nome');
    echo $form->field($model, 'jogo_id')->dropDownList($jogos);
    ?>

    <?php
    if ($model->isNewRecord) $model->torneios = 0;
    echo $form->field($model, 'torneios')->textInput();
    ?>

    <?php
    if ($model->isNewRecord) $model->titulos = 0;
    echo $form->field($model, 'titulos')->textInput(['placeholder' => 0]);
    ?>

    <?php
    /*
    echo $form->field($model, 'vitorias')->textInput();
    echo $form->field($model, 'derrotas')->textInput();
    echo $form->field($model, 'pontos')->textInput();
    */
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adicionar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
