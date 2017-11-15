<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/**
 * @var yii\web\View $this
 * @var app\models\SgpDoctorDetailsSearch $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sgp-doctor-details-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'first_name') ?>

    <?= $form->field($model, 'last_name') ?>

    <?= $form->field($model, 'contact_id') ?>

    <?= $form->field($model, 'date_of_birth') ?>

    <?= $form->field($model, 'specialty') ?>

     <?= $form->field($model, 'class') ?>

    <?= $form->field($model, 'qualification') ?>

    <?= $form->field($model, 'patch') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

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
