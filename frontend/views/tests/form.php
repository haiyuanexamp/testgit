<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Tests */
/* @var $form ActiveForm */
?>
<div class="tests-form">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'age') ?>
        <?= $form->field($model, 'name') ?>
    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- tests-form -->
