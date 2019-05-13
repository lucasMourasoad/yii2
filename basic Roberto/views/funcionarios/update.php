<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Funcionarios */

$this->title = 'Update Funcionarios: ' . $model->cpf;
$this->params['breadcrumbs'][] = ['label' => 'Funcionarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cpf, 'url' => ['view', 'id' => $model->cpf]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="funcionarios-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
