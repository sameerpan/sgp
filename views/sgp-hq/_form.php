<?php

use yii\helpers\Html;
use kartik\widgets\ActiveForm;
use kartik\builder\Form;
use kartik\datecontrol\DateControl;

/**
 * @var yii\web\View $this
 * @var app\models\SgpHq $model
 * @var yii\widgets\ActiveForm $form
 */
?>

<div class="sgp-hq-form">

    <?php $form = ActiveForm::begin(['type' => ActiveForm::TYPE_HORIZONTAL]); echo Form::widget([

        'model' => $model,

        'form' => $form,        
        'columns' => 1,
        'attributes' => [
                       
            // Sameer - Changed to dropdownlist and  used items   
            'region_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items'=>$region_name ,'options' => ['Select' => 'Select Region...']],

           //'region_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Region ID...']],
           
             // Sameer - Changed to dropdownlist and  used items   
            'state_id' => ['type' => Form::INPUT_DROPDOWN_LIST, 'items'=>$state_names ,'options' => ['Select' => 'Select State...']],
            
            

            //'state_id' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter State ID...']],

            'hq_name' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter HQ Name...', 'maxlength' => 50]],
            
           
            
            //Sameer -We don't need following vaules shown in the insert or update form.
          /*  'is_deleted' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Is Deleted...']],
            

            'crt_dt' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'crt_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Crt By...']],

            'upd_dt' => ['type' => Form::INPUT_WIDGET, 'widgetClass' => DateControl::classname(),'options' => ['type' => DateControl::FORMAT_DATETIME]],

            'upd_by' => ['type' => Form::INPUT_TEXT, 'options' => ['placeholder' => 'Enter Upd By...']],*/

        ],
        
         

    ]);
   //  echo $form->field($patch, 'patch_name');
    ?>
    
    <?php ?>
    
   

    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'),

        ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']
    );
    ActiveForm::end(); ?>

</div>
