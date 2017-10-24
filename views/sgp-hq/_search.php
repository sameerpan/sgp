<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\SgpHqSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sgp-hq-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'region_id') ?>

    <?= $form->field($model, 'state_id') ?>

    <?= $form->field($model, 'hq_name') ?>

    <?= $form->field($model, 'is_deleted') ?>

    <?php // echo $form->field($model, 'crt_dt') ?>

    <?php // echo $form->field($model, 'crt_by') ?>

    <?php // echo $form->field($model, 'upd_dt') ?>

    <?php // echo $form->field($model, 'upd_by') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
