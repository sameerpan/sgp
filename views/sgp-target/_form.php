<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpTarget $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sgp-target-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

           // 'territory_type' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Terrirtory Type (HQ/Region)...']],
                        
            // Sameer - Changed to dropdownlist and  used items   
            'territory_type' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items'=>$items ,'options' => ['Select' => 'Select Terrirtory Type...']],
            // Sameer - Changed to dropdownlist and  used items 
           // 'territory_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Territory ID...']],
            'territory_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items'=>$territory_type ,'options' => ['Select' => 'Select Terrirtory Name...']],

            'target' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Target...']],

            'financial_year' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Financial Year...', 'maxlength' => 10]],
            
            //Sameer -We don't need following vaules shown in the insert or update form.
          /*  'is_deleted' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Is Deleted...']],

            'crt_dt' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Crt Dt...']],

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
