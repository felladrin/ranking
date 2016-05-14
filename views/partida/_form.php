<?php

use app\models\Jogador;
use app\models\Jogo;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Partida */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="partida-form">
    <?php $form = ActiveForm::begin(); ?>

    <?php
    $jogos = ArrayHelper::map(Jogo::find()->select([
        'id',
        'nome'
    ])->orderBy('nome')->all(), 'id', 'nome');
    echo $form->field($model, 'jogo_id')->dropDownList($jogos);
    ?>

    <?php
    $jogos = ArrayHelper::map(Jogador::find()->select([
        'id',
        'nome'
    ])->orderBy('nome')->all(), 'id', 'nome');
    echo $form->field($model, 'jogador_um')->dropDownList($jogos);
    ?>

    <?php
    $jogos = ArrayHelper::map(Jogador::find()->select([
        'id',
        'nome'
    ])->orderBy('nome')->all(), 'id', 'nome');
    echo $form->field($model, 'jogador_dois')->dropDownList($jogos);
    ?>

    <?php
    if (!$model->isNewRecord)
    {
        $jogos = ArrayHelper::map(Jogador::find()->select([
            'id',
            'nome'
        ])->where(['id' => [$model->jogador_um, $model->jogador_dois]])->orderBy('nome')->all(), 'id', 'nome');
        echo $form->field($model, 'jogador_vencedor')->dropDownList($jogos, ['prompt' => '-- Não selecione caso a partida ainda não tenha vencedor --']);
    }
    else
    {
        echo Html::tag('p', 'Obs: Para poder selecionar o jogador vencedor, você deve primeiro adicionar a partida, e depois voltar à esta página.');
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Adicionar' : 'Atualizar', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>
</div>
