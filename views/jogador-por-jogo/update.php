<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\JogadorPorJogo */

$this->title = 'Atualizar Jogador Por Jogo: ' . ' ' . $model->jogador_id;
$this->params['breadcrumbs'][] = ['label' => 'Jogador Por Jogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = [
    'label' => $model->jogador_id,
    'url' => ['view', 'jogador_id' => $model->jogador_id, 'jogo_id' => $model->jogo_id]
];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jogador-por-jogo-update">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
