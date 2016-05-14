<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\JogadorPorJogo */

$this->title = $model->jogador->nome . ' em ' . $model->jogo->nome;
$this->params['breadcrumbs'][] = ['label' => 'Jogador Por Jogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogador-por-jogo-view">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'jogador_id' => $model->jogador_id, 'jogo_id' => $model->jogo_id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'jogador_id' => $model->jogador_id, 'jogo_id' => $model->jogo_id], [
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
            [
                'attribute' => 'jogador_id',
                'format' => 'html',
                'value' => Html::a($model->jogador_id . ": " . $model->jogador->nome, [
                    'jogador/view',
                    'id' => $model->jogador_id
                ])
            ],
            [
                'attribute' => 'jogo_id',
                'format' => 'html',
                'value' => Html::a($model->jogo_id . ": " . $model->jogo->nome, ['jogo/view', 'id' => $model->jogo_id])
            ],
            'torneios',
            'titulos',
            'vitorias',
            'derrotas',
            'pontos',
        ],
    ]) ?>
</div>
