<?php

use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel app\models\PartidaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Partidas';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="partida-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Adicionar Partida', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            // ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'jogo_id',
                'format' => 'html',
                'value' => function ($model)
                {
                    return Html::a($model->jogo_id . ": " . $model->jogo->nome, ['jogo/view', 'id' => $model->jogo_id]);
                }
            ],
            [
                'attribute' => 'jogador_um',
                'format' => 'html',
                'value' => function ($model)
                {
                    return Html::a($model->jogador_um . ": " . $model->jogadorUm->nome, [
                        'usuario/view',
                        'id' => $model->jogador_um
                    ]);
                }
            ],
            [
                'attribute' => 'jogador_dois',
                'format' => 'html',
                'value' => function ($model)
                {
                    return Html::a($model->jogador_dois . ": " . $model->jogadorDois->nome, [
                        'usuario/view',
                        'id' => $model->jogador_dois
                    ]);
                }
            ],
            [
                'attribute' => 'jogador_vencedor',
                'format' => 'html',
                'value' => function ($model)
                {
                    if (empty($model->jogador_vencedor)) return 'Ainda não definido';

                    return Html::a($model->jogador_vencedor . ": " . $model->jogadorVencedor->nome, [
                        'usuario/view',
                        'id' => $model->jogador_vencedor
                    ]);
                }
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
