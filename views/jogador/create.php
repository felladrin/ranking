<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Jogador */

$this->title = 'Adicionar Jogador';
$this->params['breadcrumbs'][] = ['label' => 'Jogadors', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jogador-create">
    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>
</div>
