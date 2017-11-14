<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpRoute $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sgp-route-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,
        'form' => $form,
        'columns' => 1,
        'attributes' => [

            'route_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Route name...', 'maxlength' => 100]],

          //  'from_patch' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter From Patch...']],
          
           // Sameer - Changed to dropdownlist and  used items   
            'from_patch' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items'=>$items ,'options' => ['Select' => 'Select From Patch...']],
            
            // Sameer - Changed to dropdownlist and  used items   
            'to_patch' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items'=>$items ,'options' => ['Select' => 'Select To Patch...']],

           // 'to_patch' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter To Patch...']],

            'distance' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Distance...']],
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
