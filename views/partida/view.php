<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Partida */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Partidas', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partida-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Atualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Excluir', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            [
                'attribute' => 'jogo_id',
                'format' => 'html',
                'value' => Html::a($model->jogo_id . ": " . $model->jogo->nome, ['jogo/view', 'id' => $model->jogo_id])
            ],
            [
                'attribute' => 'jogador_um',
                'format' => 'html',
                'value' => Html::a($model->jogador_um . ": " . $model->jogadorUm->nome, [
                    'jogador/view',
                    'id' => $model->jogador_um
                ])
            ],
            [
                'attribute' => 'jogador_dois',
                'format' => 'html',
                'value' => Html::a($model->jogador_dois . ": " . $model->jogadorDois->nome, [
                    'jogador/view',
                    'id' => $model->jogador_dois
                ])
            ],
            [
                'attribute' => 'jogador_vencedor',
                'format' => 'html',
                'value' => (empty($model->jogador_vencedor)) ? 'Ainda não definido' : Html::a($model->jogador_vencedor . ": " . $model->jogadorVencedor->nome, [
                    'jogador/view',
                    'id' => $model->jogador_vencedor
                ])
            ],
        ],
    ]) ?>
</div>
