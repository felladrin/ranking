<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\JogadorPorJogoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jogadores Por Jogos';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogador-por-jogo-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Adicionar Jogador Por Jogo', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'jogador_id',
                'format' => 'html',
                'value' => function ($model)
                {
                    return Html::a($model->jogador_id . ": " . $model->jogador->nome, [
                        'usuario/view',
                        'id' => $model->jogador_id
                    ]);
                }
            ],
            [
                'attribute' => 'jogo_id',
                'format' => 'html',
                'value' => function ($model)
                {
                    return Html::a($model->jogo_id . ": " . $model->jogo->nome, ['jogo/view', 'id' => $model->jogo_id]);
                }
            ],
            'torneios',
            'titulos',
            'vitorias',
            'derrotas',
            'pontos',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
