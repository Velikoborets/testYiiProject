<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var \Role $model */

$this->title = 'Update Role: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Roles', 'url' => ['roles']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['views', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>