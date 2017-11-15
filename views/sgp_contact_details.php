<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SgpContactDetails */
/* @var $form ActiveForm */
?>
<div class="sgp_contact_details">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'email') ?>
        <?= $form->field($model, 'phone') ?>
        <?= $form->field($model, 'address1') ?>
        <?= $form->field($model, 'address2') ?>
        <?= $form->field($model, 'city') ?>
        <?= $form->field($model, 'is_deleted') ?>
        <?= $form->field($model, 'crt_dt') ?>
        <?= $form->field($model, 'crt_by') ?>
        <?= $form->field($model, 'upd_dt') ?>
        <?= $form->field($model, 'upd_by') ?>
    
        <div class="form-group">
            <?= Html::submitButton(Yii::t('app', 'Submit'), ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- sgp_contact_details -->
