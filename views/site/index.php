<?php
/* @var $this yii\web\View */
use app\models\JogadorPorJogo;
use app\models\Jogo;
use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;

$this->title = Yii::$app->name;
/** @var Jogo[] $jogos */
$jogos = Jogo::find()->all();
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <?php foreach ($jogos as $jogo): ?>
            <div class="col-lg-6">
                <h3><?= $jogo->nome ?></h3>
                <?= GridView::widget([
                    'dataProvider' =>  new ActiveDataProvider([
                        'query' => JogadorPorJogo::find()->where(['jogo_id' => $jogo->id])->orderBy('pontos DESC'),
                        'sort' => false
                    ]),
                    'summary' => '',
                    'columns' => [
                        ['class' => 'yii\grid\SerialColumn'],
                        'pontos',
                        [
                            'attribute' => 'jogador_id',
                            'format' => 'html',
                            'header' => 'Jogador',
                            'value' => function ($model)
                            {
                                /** @var JogadorPorJogo $model*/
                                return Html::a(Html::img($model->jogador->pegarGravatarUrl(32)) . ' ' . $model->jogador->nome, $model->jogador->link);
                            }
                        ],
                        [
                            'header' => 'Cartel',
                            'format' => 'html',
                            'value' => function ($model)
                            {
                                return Html::a($model->vitorias . '-' . $model->derrotas, ['site/partidas', 'jogo_id' => $model->jogo_id, 'jogador_id' => $model->jogador_id]);
                            }
                        ],
                        'torneios',
                        'titulos',
                    ],
                ]); ?>
            </div>
            <?php endforeach; ?>
        </div>
    </div>
</div>
