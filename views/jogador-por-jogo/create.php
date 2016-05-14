<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\JogadorPorJogo */

$this->title = 'Adicionar Jogador Por Jogo';
$this->params['breadcrumbs'][] = ['label' => 'Jogador Por Jogos', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogador-por-jogo-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
