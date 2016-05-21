<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\Job */

$this->title = 'Update Job: ' . ' ' . $model->j_id;
$this->params['breadcrumbs'][] = ['label' => 'Jobs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->j_id, 'url' => ['view', 'id' => $model->j_id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="job-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
