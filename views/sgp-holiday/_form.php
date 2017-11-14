<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpHoliday $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sgp-holiday-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'year' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Year...', 'maxlength' => 10]],

            'name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Name of the holiday...', 'maxlength' => 100]],

            'date' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATE,'displayFormat' => 'php:d-M-Y']],
            //Sameer -We don't need following vaules shown in the insert or update form.
         /*   'is_deleted' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Is Deleted...']],

            'crt_dt' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'crt_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Crt By...']],

            'upd_dt' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'upd_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Upd By...']],*/

        ]

    ]);

    echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),
        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
