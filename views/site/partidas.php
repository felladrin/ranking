<?php
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $jogador \app\models\Jogador */
/* @var $jogo \app\models\Jogo */
use app\models\JogadorPorJogo;
use app\models\Jogo;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = Yii::$app->name;
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-lg-12">
                <h3>Partidas de <?= $jogador->nome ?> em <?= $jogo->nome ?></h3>
                <?= GridView::widget([
                    'dataProvider' =>  $dataProvider,
                    'summary' => '',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        [
                            'attribute' => 'jogadorUm.nome',
                            'format' => 'text',
                            'header' => 'Jogador'
                        ],
                        [
                            'attribute' => 'jogadorDois.nome',
                            'format' => 'text',
                            'header' => 'Adversário'
                        ],
                        [
                            'attribute' => 'jogador_vencedor',
                            'format' => 'text',
                            'header' => 'Vencedor',
                            'value' => function ($model)
                            {
                                if (empty($model->jogador_vencedor)) return 'Ainda não definido';

                                return $model->jogadorVencedor->nome;
                            }
                        ],
                    ],
                ]); ?>
            </div>
        </div>
    </div>
</div>
